<?php

//ini_set("display_failures", 1);
//ini_set("failure_reporting", -1);

interface PasOrderInterface
{

    public function initialize($ctx = "web");

    public function add($key, $value);

    public function validate($key, $value);

    public function remove($key);

    public function get();

    public function set(array $order);

    public function clean();

    public function getCost();

    public function getDeliveryCost(PasOrderInterface $order, msDelivery $delivery, $cost = 0.0);

    public function getPaymentCost(PasOrderInterface $order, msPayment $payment, $cost = 0.0);

    public function submit();

    public function getDeliveries($filter = null, $sort = null);

    public function getPayments($filter = null, $sort = null);

}


class PasOrderHandler implements PasOrderInterface
{
    /** @var modX $modx */
    public $modx;
    /** @var PayAndSee $PayAndSee */
    public $PayAndSee;
    /** @var miniShop2 $ms2 */
    public $ms2;
    /** @var array $config */
    public $config;
    /** @var array $order */
    protected $order;
    /** @var array $msg */
    protected $msg;

    /** @var msDiscount $msDiscount */
    public $msDiscount;

    /** @var msPromoCode $msPromoCode */
    public $msPromoCode;

    /**
     * @param miniShop2 $ms2
     * @param array $config
     */
    function __construct(PayAndSee & $PayAndSee, array $config = array())
    {
        $this->PayAndSee = &$PayAndSee;
        $this->modx = &$PayAndSee->modx;
        $this->ms2 = &$PayAndSee->miniShop2;

        $this->config = array_merge(array(
            "order" => & $_SESSION["payandsee"]["order"],
        ), $config);

        $this->order = &$this->config["order"];
        $this->modx->lexicon->load("payandsee:order");

        if (empty($this->order) OR !is_array($this->order)) {
            $this->order = array();
        }

        $freshen = $this->getFreshenFields();
        foreach ($freshen as $key) {
            $this->add($key, 0);
        }

        if ($this->PayAndSee->isExistService('msDiscount')) {
            $this->msDiscount = $this->modx->getService('msDiscount');
        }

        if ($this->PayAndSee->isExistService('msPromoCode')) {
            if ($this->modx->getOption('mspromocode_active', null, false)) {
                $this->msPromoCode = $this->modx->getService('mspromocode');
            }
        }

    }

    public function initialize($ctx = "web")
    {
        return true;
    }

    public function add($key, $value)
    {
        $response = $this->PayAndSee->invokeEvent("PasOnBeforeAddToOrder", array(
            "key"   => $key,
            "value" => $value,
            "order" => $this,
        ));
        if (!$response["success"]) {
            return $this->failure($response["message"]);
        }
        $value = $response["data"]["value"];
        if (empty($value)) {
            $this->order[$key] = $validated = "";
        } else {
            $validated = $this->validate($key, $value);
            if ($validated !== false) {
                $this->order[$key] = $validated;
                $response = $this->PayAndSee->invokeEvent("PasOnAddToOrder", array(
                    "key"   => $key,
                    "value" => $validated,
                    "order" => $this,
                ));
                if (!$response["success"]) {
                    return $this->failure($response["message"]);
                }
                $validated = $response["data"]["value"];
            } else {
                $this->order[$key] = "";
            }
        }

        return ($validated === false)
            ? $this->failure($this->getMsg($key), array($key => $value))
            : $this->success("", array($key => $validated));
    }

    public function validate($key, $value)
    {
       /* if ($key != "comment") {
            $value = preg_replace("/\s+/", " ", trim($value));
        }*/
        $response = $this->PayAndSee->invokeEvent("PasOnBeforeValidateOrderValue", array(
            "key"   => $key,
            "value" => $value,
        ));
        $value = $response["data"]["value"];
        $old_value = isset($this->order[$key]) ? $this->order[$key] : "";
        switch ($key) {
            case "email":
                $value = preg_match("/^[^@а-яА-Я]+@[^@а-яА-Я]+(?<!\.)\.[^\.а-яА-Я]{2,}$/mu", $value)
                    ? $value
                    : false;
                break;
            case "receiver":
                // Transforms string from "nikolaj -  coster--Waldau jr." to "Nikolaj Coster-Waldau Jr."
                $tmp = preg_replace(
                    array("/[^-a-zа-яёЁ\s\.]/iu", "/\s+/", "/\-+/", "/\.+/"),
                    array("", " ", "-", "."),
                    $value
                );
                $tmp = preg_split("/\s/", $tmp, -1, PREG_SPLIT_NO_EMPTY);
                $tmp = array_map(array($this, "ucfirst"), $tmp);
                $value = preg_replace("/\s+/", " ", implode(" ", $tmp));
                if (empty($value)) {
                    $value = false;
                }
                break;
            case "phone":
                $value = substr(preg_replace("/[^-+0-9]/iu", "", $value), 0, 15);
                break;
            case "delivery":
                $value = (int)$value;
                /** @var msDelivery $delivery */
                if (!$delivery = $this->modx->getObject("msDelivery", array("id" => $value))) {
                    $value = $old_value;
                }
                break;
            case "payment":
                $value = (int)$value;
                /** @var msPayment $payment */
                if (!$payment = $this->modx->getObject("msPayment", array("id" => $value, "active" => 1))) {
                    $value = $old_value;
                }
                break;
            case "content":
                $value = (int)$value;
                /** @var PasContent $content */
                if (!$content = $this->modx->getObject("PasContent", array("id" => $value))) {
                    $value = $old_value;
                }
                break;
            case "rate":
                $value = (int)$value;
                /** @var PasContent $content */
                if ($content = $this->modx->getObject("PasContent", (int)$this->order["content"])) {
                    if (!$rate = $content->getRate($this->order)) {
                        $value = $old_value;
                    }
                }
                break;
            case "agree":
                $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                break;
            case "index":
                $value = substr(preg_replace("/[^-0-9a-z]/iu", "", $value), 0, 10);
                break;

            // "msDiscount"
            case "coupon_code":
                $value = (string)$value;

                if (!empty($value) AND $this->msDiscount) {
                    $check = $this->msDiscount->checkCoupon($value);
                    if ($check !== true) {
                        $this->setMsg($key, $check);
                        $value = false;
                    }
                }
            // "msPromoCode"
            case "mspromo_code":
                $value = (string)$value;

                if (!empty($value) AND $this->msPromoCode AND $this->msPromoCode->coupon) {
                    $coupon = $this->msPromoCode->coupon->getCouponByCode($value, false);
                    if (!$coupon OR empty($coupon['allcart'])) {
                        $this->setMsg($key, $this->modx->lexicon('mspromocode_err_code_invalid'));
                        $value = false;
                    }
                }
                break;
        }
        $response = $this->PayAndSee->invokeEvent("PasOnValidateOrderValue", array(
            "key"   => $key,
            "value" => $value,
        ));
        $value = $response["data"]["value"];

        return $value;
    }

    public function remove($key)
    {
        if ($exists = array_key_exists($key, $this->order)) {
            $response = $this->PayAndSee->invokeEvent("PasOnBeforeRemoveFromOrder", array(
                "key"   => $key,
                "order" => $this,
            ));
            if (!$response["success"]) {
                return $this->failure($response["message"]);
            }

            unset($this->order[$key]);
            $response = $this->PayAndSee->invokeEvent("PasOnRemoveFromOrder", array(
                "key"   => $key,
                "order" => $this,
            ));
            if (!$response["success"]) {
                return $this->failure($response["message"]);
            }
        }

        return $exists;
    }

    public function get()
    {
        return $this->order;
    }

    public function set(array $order)
    {
        foreach ($order as $key => $value) {
            $this->add($key, $value);
        }

        return $this->order;
    }

    public function clean()
    {
        $response = $this->PayAndSee->invokeEvent('PasOnBeforeEmptyOrder', array('order' => $this));
        if (!$response['success']) {
            return $this->failure($response['message']);
        }
        $this->order = array();
        $response = $this->PayAndSee->invokeEvent('PasOnEmptyOrder', array('order' => $this));
        if (!$response['success']) {
            return $this->failure($response['message']);
        }

        return $this->success('', array());
    }

    public function getCost($with_cart = true, $only_cost = false)
    {
        $cost = 0;
        $response = $this->PayAndSee->invokeEvent("PasOnBeforeGetOrderCost", array(
            "order"     => $this,
            "with_cart" => $with_cart,
            "only_cost" => $only_cost,
            "cost"      => $cost,
        ));
        if (!$response["success"]) {
            return $this->failure($response["message"]);
        }
        $cost = $response["data"]["cost"];

        /** @var PasContent $content */
        /** @var PasRate $rate */
        if ($content = $this->modx->getObject("PasContent", (int)$this->order["content"])) {
            if (!$rate = $content->getRate($this->order)) {
                return $this->failure("order_err_requires", array("rate"));
            }

            $cost = $rate->getCost();
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR,
                'Could not get PasContent id: "' . $this->order["content"] . '"');
        }

        $cost = $with_cart ? $cost : 0;

        $order_cost = $cost;

        /** @var msDelivery|PasDeliveryHandler $delivery */
        if ($delivery = $this->modx->getObject("msDelivery", (int)$this->order["delivery"])) {
            $cost = $this->getDeliveryCost($this, $delivery, $cost);
        }

        /** @var msPayment $payment */
        if ($payment = $this->modx->getObject("msPayment", (int)$this->order["payment"])) {
            $cost = $this->getPaymentCost($this, $payment, $cost);
        }

        // "msDiscount"
        if (!empty($with_cart) AND !empty($cost)) {

            if ($this->msDiscount) {
                $coupon_code = isset($this->order["coupon_code"]) ? $this->order["coupon_code"] : "";
                if (!empty($coupon_code) AND $this->msDiscount->checkCoupon($coupon_code) === true) {

                    if (!$this->modx->getOption('msd_coupon_only_products', null, true)) {
                        $order_cost = $cost;
                    }
                    if ($discount = $this->msDiscount->getCouponDiscount($coupon_code, $order_cost)) {
                        $order_cost -= $discount;
                    }
                    if ($order_cost >= 0) {
                        $cost = $order_cost;
                    }
                }
            }
        }

        // "msPromoCode"
        if (!empty($with_cart) AND !empty($cost)) {
            if ($this->msPromoCode AND $this->msPromoCode->coupon) {
                $mspromo_code = isset($this->order["mspromo_code"]) ? $this->order["mspromo_code"] : "";
                if (!empty($mspromo_code) AND $coupon = $this->msPromoCode->coupon->getCouponByCode($mspromo_code, false)) {
                    if (!empty($coupon['allcart'])) {
                        if ($discount = $coupon['discount']) {
                            if (preg_match('/%$/', $coupon['discount'])) {
                                $discount = str_replace('%', '', $coupon['discount']);
                                $discount = $order_cost / 100 * $discount;
                            }
                            $order_cost -= (float)$discount;
                            if ($order_cost >= 0) {
                                $cost = $order_cost;
                            }
                        }
                    }
                }
            }
        }

        $cost = $this->PayAndSee->formatPrice($cost, true);

        $response = $this->PayAndSee->invokeEvent("PasOnGetOrderCost", array(
            "order"     => $this,
            "with_cart" => $with_cart,
            "only_cost" => $only_cost,
            "cost"      => $cost,
        ));
        if (!$response["success"]) {
            return $this->failure($response["message"]);
        }
        $cost = $response["data"]["cost"];

        if ($only_cost) {
            return $cost;
        }

        $data = array(
            "cost"    => $cost,
            "order"   => $this->order,
            "content" => $content->toArray(),
            "rate"    => $rate->toArray(),
        );
        $data["blocks"] = $this->getBlocks($data);

        return $this->success("", $data);
    }

    public function getDeliveryCost(PasOrderInterface $order, msDelivery $delivery, $cost = 0.0)
    {
        $add_price = $delivery->get("price");
        if (preg_match("/%$/", $add_price)) {
            $add_price = str_replace("%", "", $add_price);
            $add_price = $cost / 100 * $add_price;
        }
        $cost += $add_price;

        return $cost;
    }

    public function getPaymentCost(PasOrderInterface $order, msPayment $payment, $cost = 0.0)
    {
        $add_price = $payment->get("price");
        if (preg_match("/%$/", $add_price)) {
            $add_price = str_replace("%", "", $add_price);
            $add_price = $cost / 100 * $add_price;
        }
        $cost += $add_price;

        return $cost;
    }

    public function submit($data = array())
    {
        $response = $this->PayAndSee->invokeEvent("PasOnSubmitOrder", array(
            "data"  => $data,
            "order" => $this,
        ));
        if (!$response["success"]) {
            return $this->failure($response["message"]);
        }
        if (!empty($response["data"]["data"])) {
            $this->set($response["data"]["data"]);
        }

        $response = $this->getDeliveryRequiresFields();
        if ($this->PayAndSee->config["jsonResponse"]) {
            $response = json_decode($response, true);
        }

        if (!$response["success"]) {
            return $this->failure($response["message"]);
        }
        $requires = $response["data"]["requires"];

        $failures = array();
        foreach ($requires as $v) {
            if (!empty($v) AND empty($this->order[$v])) {
                $failures[] = $v;
            }
        }
        if (!empty($failures)) {
            return $this->failure("order_err_requires", $failures);
        }

        $user_id = $this->PayAndSee->getUserId(@$this->order["email"], $this->order);
        if (empty($user_id)) {
            return $this->failure("order_err_requires", array("email"));
        }

        $createdon = date("Y-m-d H:i:s");
        $delivery_cost = $this->getCost(false, true);
        $cart_cost = $this->getCost(true, true) - $delivery_cost;

        /** @var msOrder $order */
        $order = $this->modx->newObject("msOrder");
        $order->fromArray(array(
            "user_id"       => $user_id,
            "createdon"     => $createdon,
            "num"           => $this->getNum(),
            "delivery"      => $this->order["delivery"],
            "payment"       => $this->order["payment"],
            "cart_cost"     => $cart_cost,
            "weight"        => 0,
            "delivery_cost" => $delivery_cost,
            "cost"          => $cart_cost + $delivery_cost,
            "status"        => 0,
            "context"       => "pas",
        ));

        // Adding address
        /** @var msOrderAddress $address */
        $address = $this->modx->newObject("msOrderAddress");
        $address->fromArray(array_merge($this->order, array(
            "user_id"   => $user_id,
            "createdon" => $createdon,
        )));
        $order->addOne($address);

        /** @var PasContent $content */
        /** @var PasRate $rate */
        /** @var modResource $resource */
        if (!$content = $this->modx->getObject("PasContent", (int)$this->order["content"]) OR
            !$resource = $content->getOne("Resource")
        ) {
            return $this->failure("order_err_requires", array("content"));
        }

        if (!$rate = $content->getRate($this->order)) {
            return $this->failure("order_err_requires", array("rate"));
        }

        // name
        $name = $content->get("name");
        if (empty($name)) {
            $name = $resource->get("pagetitle");
        }
        // cost
        $cost = $rate->getCost();
        // options
        $options = isset($this->order["options"]) ? $this->order["options"] : array();
        if (!is_array($options)) {
            $options = array();
        }

        $content = $rate->get("content");
        $term = $rate->get("term_value") . $rate->get("term_unit");
        $options = array_merge($options, array(
            "content" => $content,
            "term"    => $term,
            "ctx"     => $this->PayAndSee->config["ctx"],
        ));

        /** @var msOrderProduct $product */
        $product = $this->modx->newObject("msOrderProduct");
        $product->fromArray(array(
            "product_id" => 0,
            "content_id" => $content,
            "name"       => $name,
            "cost"       => $cost,
            "price"      => $cost,
            "count"      => 1,
            "weight"     => 0,
            "options"    => $options,
        ));
        $order->addMany($product);

        $response = $this->PayAndSee->invokeEvent("PasOnBeforeCreateOrder", array(
            "msOrder" => $order,
            "order"   => $this,
        ));
        if (!$response["success"]) {
            return $this->failure($response["message"]);
        }

        if ($order->save()) {
            $response = $this->PayAndSee->invokeEvent("PasOnCreateOrder", array(
                "msOrder" => $order,
                "order"   => $this,
            ));
            if (!$response["success"]) {
                return $this->failure($response["message"]);
            }

            // calc "discount"
            $discount = $cost - $cart_cost;
            if ($discount < 0) {
                $discount = 0;
            }

            // "msDiscount"
            if ($this->msDiscount) {
                $coupon_code = isset($this->order["coupon_code"]) ? $this->order["coupon_code"] : "";
                if (!empty($coupon_code) AND $coupon = $this->modx->getObject("msdCoupon", array('code' => $coupon_code))) {
                    /**@var msOrder $msOrder */
                    $coupon->fromArray(array(
                        "active"      => false,
                        "activatedon" => date("Y-m-d H:i:s"),
                        "order_id"    => $order->get("id"),
                    ));
                    $coupon->save();
                    $properties = $order->get("properties");
                    if (!is_array($properties)) {
                        $properties = array();
                    }
                    $properties["coupon_code"] = $coupon->get("code");
                    if ($group = $coupon->getOne("Group")) {
                        $properties["coupon_discount"] = $group->get("discount");
                    }
                    $order->set("properties", $properties);
                    $order->save();
                }
            }

            // "msPromoCode"
            if ($this->msPromoCode AND $this->msPromoCode->coupon) {
                $mspromo_code = isset($this->order["mspromo_code"]) ? $this->order["mspromo_code"] : "";
                if (!empty($discount) AND !empty($mspromo_code) AND $coupon = $this->msPromoCode->coupon->getCouponByCode($mspromo_code, false)) {
                    if (!empty($coupon['allcart']) AND $mspcCoupon = $this->modx->getObject("mspcCoupon", array('code' => $mspromo_code))) {
                        /** @var mspcOrder $mspcOrder */
                        $mspcOrder = $this->modx->newObject('mspcOrder');
                        $mspcOrder->fromArray(array(
                            'code'            => $mspromo_code,
                            'coupon_id'       => $mspcCoupon->get('id'),
                            'createdon'       => date('Y-m-d H:i:s'),
                            'discount_amount' => $discount,
                        ));
                        $mspcOrder->addOne($order);

                        if ($mspcOrder->save()) {
                            $this->msPromoCode->invokeEvent('mspcOnBindCouponToOrder', array(
                                'mspc'            => $this->msPromoCode,
                                'msOrder'         => $order,
                                'mspcOrder'       => $mspcOrder,
                                'mspcCoupon'      => $mspcCoupon,
                                'coupon'          => $coupon,
                                'discount_amount' => $discount,
                            ));
                            // Получаем акцию, если она есть
                            $isref = false;
                            if ($mspcAction = $mspcCoupon->Action) {
                                // Проверяем, реферальная ли акция
                                $isref = $mspcAction->get('ref');
                            }
                            if ($coupon['count']) {
                                if (empty($isref)) {
                                    $count = $coupon['count'] - 1;
                                    if (!$count) {
                                        // выключим активность, если купон закончился
                                        $mspcCoupon->set('active', false);
                                        // заморозим, если купон для акции и он активирован
                                        if ($coupon['action_id']) {
                                            $mspcCoupon->set('freeze', true);
                                        }
                                    }
                                    $mspcCoupon->set('count', $count);
                                }
                                $mspcCoupon->save();
                            }
                        }
                    }
                }
            }

            $this->clean();
            if (empty($_SESSION["payandsee"]["orders"])) {
                $_SESSION["payandsee"]["orders"] = array();
            }
            $_SESSION["payandsee"]["orders"][] = $order->get("id");

            // Trying to set status "new"
            $response = $this->ms2->changeOrderStatus($order->get("id"), 1);
            if ($response !== true) {
                return $this->failure($response, array("msorder" => $order->get("id")));
            } /** @var msPayment $payment */
            else if ($payment = $this->modx->getObject("msPayment",
                array("id" => $order->get("payment"), "active" => 1))
            ) {
                $response = $payment->send($order);
                if ($this->config["jsonResponse"]) {
                    @session_write_close();
                    exit(is_array($response) ? json_encode($response) : $response);
                } else {
                    if (!empty($response["data"]["redirect"])) {
                        $this->modx->sendRedirect($response["data"]["redirect"]);
                    } else if (!empty($response["data"]["msorder"])) {
                        $this->modx->sendRedirect(
                            $this->modx->context->makeUrl(
                                $this->modx->resource->id,
                                array("msorder" => $response["data"]["msorder"])
                            )
                        );
                    } else {
                        $this->modx->sendRedirect($this->modx->context->makeUrl($this->modx->resource->id));
                    }

                    return $this->success();
                }
            } else {
                if ($this->ms2->config["jsonResponse"]) {
                    return $this->success("", array("msorder" => $order->get("id")));
                } else {
                    $this->modx->sendRedirect(
                        $this->modx->context->makeUrl(
                            $this->modx->resource->id,
                            array("msorder" => $response["data"]["msorder"])
                        )
                    );

                    return $this->success();
                }
            }
        }

        return $this->failure();
    }

    public function getDeliveries($filter = null, $sort = null)
    {
        $ids = $this->PayAndSee->getOption("order_delivery_id", null, 1, true);
        $ids = $this->PayAndSee->explodeAndClean($ids);

        $c = $this->modx->newQuery("msDelivery");
        if (is_null($filter)) {
            $filter = array();
        }
        $c->where(array_merge(array("msDelivery.id:IN" => $ids), $filter));
        if (is_array($sort)) {
            foreach ($sort as $column => $direction) {
                $c->query["sortby"][] = array(
                    "column"    => $column,
                    "direction" => $direction,
                );
            }
        }

        $data = array();
        $c->select($this->modx->getSelectColumns("msDelivery", "msDelivery"));
        if ($c->prepare() AND $c->stmt->execute()) {
            while ($array = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $array;
            }
        }

        return $data;
    }

    public function getPayments($filter = null, $sort = null)
    {
        $c = $this->modx->newQuery("msPayment");
        if (is_null($filter)) {
            $filter = array();
        }
        $c->where(array_merge(array("msPayment.active" => 1), $filter));
        if (is_array($sort)) {
            foreach ($sort as $column => $direction) {
                $c->query["sortby"][] = array(
                    "column"    => $column,
                    "direction" => $direction,
                );
            }
        }

        $data = array();
        $c->select($this->modx->getSelectColumns("msPayment", "msPayment"));
        if ($c->prepare() AND $c->stmt->execute()) {
            while ($array = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $array;
            }
        }

        return $data;
    }

    public function getDeliveryRequiresFields($id = 0)
    {
        if (empty($id)) {
            $id = $this->order["delivery"];
        }

        /** @var msDelivery $delivery */
        if (!$delivery = $this->modx->getObject("msDelivery", array("id" => $id))) {
            return $this->failure("order_err_delivery", array("delivery"));
        }

        $requires = $delivery->get("requires");
        $requires = empty($requires)
            ? array()
            : array_map("trim", explode(",", $requires));
        if (!in_array("email", $requires)) {
            $requires[] = "email";
        }

        return $this->success("", array("requires" => $requires));
    }

    public function failure($message = "", $data = array(), $placeholders = array())
    {
        return $this->PayAndSee->failure($message, $data, $placeholders);
    }

    public function success($message = "", $data = array(), $placeholders = array())
    {
        return $this->PayAndSee->success($message, $data, $placeholders);
    }

    public function getBlocks($data = array())
    {
        $blocks = array();
        $processBlocks = json_decode(@$this->order["process_blocks"], true);
        if (!empty($processBlocks)) {
            $data = array("order" => array_merge($this->order, $data));
            foreach ($processBlocks as $name => $element) {
                $blocks[$name] = $this->PayAndSee->pdoTools->getChunk($element, $data);
            }
        }

        return $blocks;
    }

    public function setMsg($key = "", $value = "")
    {
        $this->msg[$key] = $value;
    }

    public function getMsg($key = "")
    {
        if (!empty($key)) {
            return isset($this->msg[$key]) ? $this->msg[$key] : "";
        }

        return $this->msg;
    }

    public function getNum()
    {
        $cur = date("ym");
        $num = 0;

        $c = $this->modx->newQuery("msOrder");
        $c->where(array("num:LIKE" => "{$cur}%", "context" => "pas"));
        $c->select("num");
        $c->sortby("id", "DESC");
        $c->limit(1);
        if ($c->prepare() AND $c->stmt->execute()) {
            $num = $c->stmt->fetchColumn();
        }
        if (empty($num)) {
            $num = date("ym") . "/0";
        }
        $num = explode("/", $num);
        $num = $cur . "/" . ($num[1] + 1);

        return $num;
    }

    public function ucfirst($str = "")
    {
        if (!preg_match("/[a-zа-я]/iu", $str)) {
            return "";
        } else if (strpos($str, "-") !== false) {
            $tmp = array_map(array($this, __FUNCTION__), explode("-", $str));

            return implode("-", $tmp);
        }

        if (preg_match("/[а-я]/iu", $str)) {
            $tmp = mb_strtolower($str, "utf-8");
            $str = mb_substr(mb_strtoupper($tmp, "utf-8"), 0, 1, "utf-8") .
                mb_substr($tmp, 1, mb_strlen($tmp) - 1, "utf-8");
        } else {
            $str = ucfirst(strtolower($str));
        }

        return $str;
    }

    public function getFreshenFields()
    {
        $freshen = isset($this->order["freshen_fields"]) ? $this->order["freshen_fields"] : ["agree"];
        if (!is_array($freshen)) {
            $freshen = [];
        }

        return $freshen;
    }

}