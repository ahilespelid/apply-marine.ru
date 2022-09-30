<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var PayAndSee $PayAndSee */
/** @var pdoFetch $pdoFetch */

$corePath = $modx->getOption("payandsee_core_path", null,
    $modx->getOption("core_path", null, MODX_CORE_PATH) . "components/payandsee/");
$PayAndSee = $modx->getService("payandsee", "PayAndSee", $corePath . "model/payandsee/",
    ["core_path" => $corePath]);
if (!$PayAndSee) {
    return "Could not load payandsee class!";
}
$PayAndSee->initialize($modx->context->key, $scriptProperties);

if (isset($parents) AND $parents === "") {
    $scriptProperties["parents"] = $modx->resource->id;
}
if (!empty($returnIds)) {
    $scriptProperties["return"] = "ids";
}
if (isset($scriptProperties["resource"])) {
    $scriptProperties["parents"] = 0;
    if (empty($scriptProperties["resource"])) {
        $scriptProperties["resource"] = $modx->resource->id;;
    }
    $content = (int)$PayAndSee->getResourceContent($scriptProperties["resource"]);
    if (empty($content)) {
        $content = '-0';
    }
    $scriptProperties["content"] = $content;
}

$class = $scriptProperties["class"] = $modx->getOption("class", $scriptProperties, "modResource", true);
$status = $modx->getOption("status", $scriptProperties, 2, true);
$status = $PayAndSee->explodeAndClean($status);
$content = $modx->getOption("content", $scriptProperties);
$content = $PayAndSee->explodeAndClean($content);
$action = $modx->getOption("orderAction", $scriptProperties);

// where
$where = [];
if (!empty($status)) {
    $where["Content.status:IN"] = $status;
}
if (!empty($content)) {
    $where["Content.id:IN"] = $content;
}
if (empty($showEmptyRate)) {
    $where["Rates.cost:>"] = 0;
}

// leftJoin
$leftJoin = [
    "PasRate" => ["alias" => "Rates", "on" => "Rates.content = Content.id AND Rates.active = 1"],
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

// Add user parameters
foreach (["where", "leftJoin", "innerJoin", "select", "groupby", "sortRates"] as $v) {
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

$class_key = $modx->getOption("class_key", $where, $class, true);
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
    "class"     => $class,
    "where"     => $where,
    "leftJoin"  => $leftJoin,
    "innerJoin" => $innerJoin,
    "select"    => $select,
    "groupby"   => implode(", ", $groupby),
];

// Merge all properties and run!
$pdoFetch->setConfig(array_merge($default, $scriptProperties, ["return" => "data"]), false);
$pdoFetch->addTime("pdoTools loaded");
$rows = $pdoFetch->run();

$contents = [];
if (!empty($rows) AND is_array($rows)) {
    foreach ($rows as $k => $row) {
        $rates = null;
        if (!empty($scriptProperties["processRates"])) {
            $rates = $modx->call("PasContent", "getRates", [&$modx, ["content" => $row["content_id"]], $sortRates]);
        }
        $row["rates"] = $rates;

        $action = $PayAndSee->getActionUrl("order", $scriptProperties);
        $row["action"] = $action;

        $row = array_merge($scriptProperties, $row);
        $contents[] = $row;
    }
}

$rows = $contents;
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
            foreach ($rows as $row) {
                $output .= $pdoFetch->getChunk($tpl, $row);
            }
        }
        break;
}

if ($modx->user->hasSessionContext("mgr") AND !empty($showLog)) {
    $modx->log(1, print_r($pdoFetch->getTime(), 1));
    $modx->log(1, print_r($output, 1));
}

return $output;