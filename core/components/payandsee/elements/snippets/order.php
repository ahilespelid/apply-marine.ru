<?php

/** @var modX $modx */
/** @var array $scriptProperties */
/** @var PayAndSee $PayAndSee */
/** @var pdoFetch $pdoFetch */

$corePath = $modx->getOption("payandsee_core_path", null,
    $modx->getOption("core_path", null, MODX_CORE_PATH) . "components/payandsee/");
$PayAndSee = $modx->getService("payandsee", "PayAndSee", $corePath . "model/payandsee/", ["core_path" => $corePath]);
if (!$PayAndSee) {
    return "Could not load payandsee class!";
}
$PayAndSee->initialize($modx->context->key, $scriptProperties);

$content = (int)$modx->getOption("content", $scriptProperties, $modx->getOption("content", $_REQUEST), true);
$rate = (int)$modx->getOption("rate", $scriptProperties, $modx->getOption("rate", $_REQUEST), true);

$class = $scriptProperties["class"] = $modx->getOption("class", $scriptProperties, "modResource", true);
$status = $modx->getOption("status", $scriptProperties, 2, true);
$status = $PayAndSee->explodeAndClean($status);

$freshenFields = $modx->getOption("freshenFields", $scriptProperties, '');
$freshenFields = $PayAndSee->explodeAndClean($freshenFields);

if (!empty($_REQUEST["msorder"]) OR empty($content)) {
    return "";
}

// where
$where = [];
if (!empty($status)) {
    $where["Content.status:IN"] = $status;
}
if (!empty($content)) {
    $where["Content.id"] = $content;
}
/*if (empty($showEmptyRate)) {
    $where["Rates.cost:>"] = 0;
}*/

// leftJoin
$leftJoin = [
    "PasStatus" => ["alias" => "Status", "on" => "Status.id = Content.status AND Status.class = 'PasContent'"],
    "PasRate"   => ["alias" => "Rates", "on" => "Rates.content = Content.id"],
];

// innerJoin
$innerJoin = [
    "PasContent" => ["alias" => "Content", "on" => "Content.resource = {$class}.id"],
];

// select
$select = [
    $class    => !empty($includeContent) ? $modx->getSelectColumns($class, $class) : $modx->getSelectColumns($class, $class, "", ["content"], true),
    "Content" => $modx->getSelectColumns("PasContent", "Content", "content_"),
];

// groupby
$groupby = [
    "Content.id",
];

$sortRates = [
    "PasRate.cost" => "ASC",
];

$wherePayments = $sortPayments = [];
$whereDeliveries = $sortDeliveries = [];

// Add user parameters
foreach (["where", "leftJoin", "innerJoin", "select", "groupby", "sortRates", "sortPayments", "wherePayments"] as $v) {
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

$class_key = $modx->getOption("class_key", $where);
switch ($class_key) {
    case "msProduct":
        $leftJoin["Data"] = ["class" => "msProductData"];
        $leftJoin["Vendor"] = ["class" => "msVendor", "on" => "Data.vendor=Vendor.id"];

        $select["Data"] = $modx->getSelectColumns("msProductData", "Data", "", ["id"], true);
        $select["Vendor"] = $modx->getSelectColumns("msVendor", "Vendor", "vendor.", ["id"], true);

        // Include thumbnails
        if (!empty($includeThumbs)) {
            $thumbs = array_map("trim", explode(",", $includeThumbs));
            foreach ($thumbs as $thumb) {
                if (empty($thumb)) {
                    continue;
                }
                $leftJoin[$thumb] = [
                    "class" => "msProductFile",
                    "on"    => "`{$thumb}`.product_id = msProduct.id AND `{$thumb}`.rank = 0 AND `{$thumb}`.path LIKE '%/{$thumb}/%'",
                ];
                $select[$thumb] = "`{$thumb}`.url as `{$thumb}`";
                $groupby[] = "`{$thumb}`.url";
            }
        }

        break;
}

/** @var pdoFetch $pdoFetch */
$fqn = $modx->getOption("pdoFetch.class", null, "pdotools.pdofetch", true);
$path = $modx->getOption("pdofetch_class_path", null, MODX_CORE_PATH . "components/pdotools/model/", true);
if ($pdoClass = $modx->loadClass($fqn, $path, false, true)) {
    $pdoFetch = new $pdoClass($modx, $scriptProperties);
} else {
    return false;
}

$default = [
    "class"          => $class,
    "where"          => $where,
    "leftJoin"       => $leftJoin,
    "innerJoin"      => $innerJoin,
    "select"         => $select,
    "groupby"        => implode(", ", $groupby),
    "parents"        => 0,
    "depth"          => 10,
    "includeContent" => 0,
];

// Merge all properties and run!
$pdoFetch->setConfig(array_merge($default, $scriptProperties, ["return" => "data"]), false);
$pdoFetch->addTime("pdoTools loaded");
$rows = $pdoFetch->run();

if (!empty($rows) AND is_array($rows)) {
    $row = reset($rows);
    $rates = $payments = null;
    if (!empty($scriptProperties["processRates"])) {
        $rates = $modx->call("PasContent", "getRates", [&$modx, ["content" => $row["content_id"]], $sortRates]);
    }
    $row["rates"] = $rates;
} else {
    return;
}

$order = $PayAndSee->order->get();
// Get payments
$payments = $PayAndSee->order->getPayments($wherePayments, $sortPayments);
$paymentIds = array_column($payments, "id");
// Get deliveries
$deliveries = $PayAndSee->order->getDeliveries($whereDeliveries, $sortDeliveries);
$deliveryIds = array_column($deliveries, "id");

// Get user data
$profile = $form = [];
if ($modx->user->isAuthenticated($modx->context->key)) {
    $profile = array_merge($modx->user->Profile->toArray(), $modx->user->toArray());
}

$systems = [
    "content"        => $content,
    "rate"           => $rate,
    "payment"        => isset($order["payment"]) ? $order["payment"] : reset($paymentIds),
    "delivery"       => isset($order["delivery"]) ? $order["delivery"] : reset($deliveryIds),
    "freshen_fields" => isset($freshenFields) ? $freshenFields : [],
    "process_blocks" => isset($processBlocks) ? $processBlocks : null,
];

// Set system fields
foreach ($systems as $key => $value) {
    $response = $PayAndSee->order->add($key, $value);
    if (!is_array($response)) {
        $response = json_decode($response, true);
    }
    if ($response['success'] AND !empty($response['data'][$key])) {
        $form[$key] = $response['data'][$key];
    }
}

$fields = [
    'receiver' => 'fullname',
    'phone'    => 'phone',
    'email'    => 'email',
    'comment'  => 'extended[comment]',
    'index'    => 'zip',
    'country'  => 'country',
    'region'   => 'state',
    'city'     => 'city',
    'street'   => 'address',
    'building' => 'extended[building]',
    'room'     => 'extended[room]',
];

// Apply custom fields
if (!empty($userFields)) {
    if (!is_array($userFields)) {
        $userFields = json_decode($userFields, true);
    }
    if (is_array($userFields)) {
        $fields = array_merge($fields, $userFields);
    }
}

// Set user fields
foreach ($fields as $key => $value) {
    if (!empty($profile) AND !empty($value)) {
        if (strpos($value, 'extended') !== false) {
            $tmp = substr($value, 9, -1);
            $value = !empty($profile['extended'][$tmp])
                ? $profile['extended'][$tmp]
                : '';
        } else {
            $value = $profile[$value];
        }
        $response = $PayAndSee->order->add($key, $value);
        if (!is_array($response)) {
            $response = json_decode($response, true);
        }
        if ($response['success'] AND !empty($response['data'][$key])) {
            $form[$key] = $response['data'][$key];
        }
    }
    if (empty($form[$key]) AND !empty($order[$key])) {
        $form[$key] = $order[$key];
        unset($order[$key]);
    }
}


// Check for errors
$errors = [];
if (!empty($_POST)) {
    $response = $PayAndSee->order->getDeliveryRequiresFields();
    if (!is_array($response)) {
        $response = json_decode($response, true);
    }
    if ($requires = $response['data']['requires']) {
        foreach ($_POST as $field => $val) {
            $validated = $PayAndSee->order->validate($field, $val);
            if ((in_array($field, $requires) AND empty($validated))) {
                $errors[] = $field;
            }
        }
    }
}

$rows = array_merge($row, [
    "order"      => $order,
    "payments"   => $payments,
    "deliveries" => $deliveries,
    "profile"    => $profile,
    "form"       => $form,
    "errors"     => $errors,
]);
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
