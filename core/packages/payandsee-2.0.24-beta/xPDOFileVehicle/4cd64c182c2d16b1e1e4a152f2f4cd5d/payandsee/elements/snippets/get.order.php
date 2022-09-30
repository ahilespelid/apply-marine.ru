<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var PayAndSee $PayAndSee */
/** @var pdoFetch $pdoFetch */

$corePath = $modx->getOption("payandsee_core_path", null,
    $modx->getOption("core_path", null, MODX_CORE_PATH) . "components/payandsee/");
$PayAndSee = $modx->getService("payandsee", "PayAndSee", $corePath . "model/payandsee/",
    array("core_path" => $corePath));
if (!$PayAndSee) {
    return "Could not load payandsee class!";
}
$PayAndSee->initialize($modx->context->key, $scriptProperties);

/** @var pdoFetch $pdoFetch */
$fqn = $modx->getOption("pdoFetch.class", null, "pdotools.pdofetch", true);
$path = $modx->getOption("pdofetch_class_path", null, MODX_CORE_PATH . "components/pdotools/model/", true);
if ($pdoClass = $modx->loadClass($fqn, $path, false, true)) {
    $pdoFetch = new $pdoClass($modx, $scriptProperties);
} else {
    return false;
}
$pdoFetch->addTime("pdoTools loaded.");

$tpl = $modx->getOption("tpl", $scriptProperties, "tpl.get.order");
$id = (int)$modx->getOption("msorder", $scriptProperties, $modx->getOption("msorder", $_REQUEST), true);
if (empty($id)) {
    return;
}
$class = $modx->getOption("class", $scriptProperties, "modResource", true);

/** @var msOrder $order */
if (!$order = $modx->getObject("msOrder", $id)) {
    return $PayAndSee->lexicon("err_order_nf");
}

//$canView = ((!empty($_SESSION["payandsee"]["orders"]) AND in_array($id, $_SESSION["payandsee"]["orders"])) OR $order->get("user_id") == $modx->user->id OR $modx->user->hasSessionContext("mgr"));
$canView = ((!empty($_SESSION["payandsee"]["orders"]) AND in_array($id, $_SESSION["payandsee"]["orders"])) OR ($order->get("context") === "pas" AND ($order->get("user_id") == $modx->user->id OR $modx->user->hasSessionContext("mgr"))));
//
if (!$canView) {
    return "";
}

// Select ordered products
$where = array(
    "msOrderProduct.order_id" => $id,
);

// leftJoin
$leftJoin = array();

// innerJoin
$innerJoin = array(
    "PasContent" => array("alias" => "Content", "on" => "Content.id = msOrderProduct.content_id"),
    "PasStatus"  => array("alias" => "Status", "on" => "Status.id = Content.status AND Status.class = 'PasContent'"),
    $class       => array("alias" => $class, "on" => "{$class}.id = Content.resource"),
);

// Select columns
$select = array(
    "OrderProduct" => $modx->getSelectColumns("msOrderProduct", "msOrderProduct", "", array("id"), true),
    "PasContent"   => $modx->getSelectColumns("PasContent", "Content", "content_", array("id"), true),
    "PasStatus"    => $modx->getSelectColumns("PasStatus", "Status", "status_", array("id"), true),
    $class         => !empty($includeContent) ? $modx->getSelectColumns($class, $class) : $modx->getSelectColumns($class, $class, "", array("content"), true),

);

// groupby
$groupby = array(
    "msOrderProduct.id",
);

$class_key = $modx->getOption("class_key", $where);
switch ($class_key) {
    case "msProduct":
        $leftJoin["Data"] = array("class" => "msProductData");
        $leftJoin["Vendor"] = array("class" => "msVendor", "on" => "Data.vendor=Vendor.id");

        $select["Data"] = $modx->getSelectColumns("msProductData", "Data", "", array("id"), true);
        $select["Vendor"] = $modx->getSelectColumns("msVendor", "Vendor", "vendor.", array("id"), true);

        // Include thumbnails
        if (!empty($includeThumbs)) {
            $thumbs = array_map("trim", explode(",", $includeThumbs));
            foreach ($thumbs as $thumb) {
                if (empty($thumb)) {
                    continue;
                }
                $leftJoin[$thumb] = array(
                    "class" => "msProductFile",
                    "on"    => "`{$thumb}`.product_id = msProduct.id AND `{$thumb}`.rank = 0 AND `{$thumb}`.path LIKE '%/{$thumb}/%'",
                );
                $select[$thumb] = "`{$thumb}`.url as `{$thumb}`";
                $groupby[] = "`{$thumb}`.url";
            }
        }

        break;
}


// Add user parameters
foreach (array("where", "leftJoin", "innerJoin", "select", "groupby") as $v) {
    if (!empty($scriptProperties[$v])) {
        $tmp = $scriptProperties[$v];
        if (!is_array($tmp)) {
            $tmp = json_decode($tmp, true);
        }
        if (is_array($tmp)) {
            $$v = array_merge($$v, $tmp);
        }
    }
    unset($scriptProperties[$v]);
}


$pdoFetch->addTime("Conditions prepared");

// Tables for joining
$default = array(
    "class"     => "msOrderProduct",
    "where"     => $where,
    "leftJoin"  => $leftJoin,
    "innerJoin" => $innerJoin,
    "select"    => $select,
    "groupby"   => implode(", ", $groupby),
    "sortby"    => "msOrderProduct.id",
    "sortdir"   => "asc",
    "limit"     => 0,
);

// Merge all properties and run!
$pdoFetch->setConfig(array_merge($default, $scriptProperties, array("return" => "data")), false);
$rows = $pdoFetch->run();

$products = array();
$cart_count = 0;
if (!empty($rows) AND is_array($rows)) {
    foreach ($rows as $k => $row) {
        $row["price"] = $PayAndSee->formatPrice($row["price"]);
        $row["cost"] = $PayAndSee->formatPrice($row["cost"]);

        $options = $row['options'];
        if (!empty($options) AND is_array($options)) {
            $term = isset($options['term']) ? strtolower($options['term']) : "";
            $row["term_value"] = preg_replace("/[^0-9]/", '', $term);
            $row["term_unit"] = preg_replace("/[^y|m|d|h|i]/", '', $term);
        }
        $products[] = $row;

        // Count total
        $cart_count += $row['count'];
    }
}

$rows = array_merge($scriptProperties, array(
    "order"    => $order->toArray(),
    "products" => $products,
    "user"     => ($tmp = $order->getOne("User"))
        ? array_merge($tmp->getOne("Profile")->toArray(), $tmp->toArray())
        : array(),
    "address"  => ($tmp = $order->getOne("Address"))
        ? $tmp->toArray()
        : array(),
    "delivery" => ($tmp = $order->getOne("Delivery"))
        ? $tmp->toArray()
        : array(),
    "payment"  => ($tmp = $order->getOne("Payment"))
        ? $tmp->toArray()
        : array(),
    "total"    => array(
        "cost"          => $PayAndSee->formatPrice($order->get("cost")),
        "cart_cost"     => $PayAndSee->formatPrice($order->get("cart_cost")),
        "delivery_cost" => $PayAndSee->formatPrice($order->get("delivery_cost")),
        "cart_count"    => $cart_count,
    ),
));
$output = "";
switch ($scriptProperties["return"]) {
    case "data":
        $output = $rows;
        break;
    case "json":
        $output = json_encode($rows, true);
        break;
    default:
        if (is_array($rows)) {
            $output .= $pdoFetch->getChunk($tpl, $rows);
        }
        break;
}

if ($modx->user->hasSessionContext("mgr") AND !empty($showLog)) {
    $modx->log(1, print_r($pdoFetch->getTime(), 1));
    $modx->log(1, print_r($output, 1));
}

return $output;