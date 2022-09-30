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

if (isset($scriptProperties["client"])) {
    if (empty($scriptProperties["client"])) {
        $scriptProperties["client"] = $modx->user->id;;
    }
    if (empty($scriptProperties["client"])) {
        $scriptProperties["client"] = '-0';
    }
}

$class = $scriptProperties["class"] = $modx->getOption("class", $scriptProperties, "PasSubscription", true);
$time = $scriptProperties["time"] = $modx->getOption("time", $scriptProperties, date('Y-m-d H:i:s', time()), true);

$status = $modx->getOption("status", $scriptProperties);
$status = $PayAndSee->explodeAndClean($status);
$client = $modx->getOption("client", $scriptProperties, '0', true);
$client = $PayAndSee->explodeAndClean($client);
$content = $modx->getOption("content", $scriptProperties);
$content = $PayAndSee->explodeAndClean($content);

// where
$where = array();
if (!empty($status)) {
    $where["{$class}.status:IN"] = $status;
}
if (!empty($client)) {
    $where["{$class}.client:IN"] = $client;
}
if (!empty($content)) {
    $where["{$class}.content:IN"] = $content;
}

if (empty($showOverdue)) {
    $where["{$class}.startdate:<"] = $time;
    $where["{$class}.stopdate:>"] = $time;
}

// leftJoin
$leftJoin = array(
    "PasContent"     => array("alias" => "Content", "on" => "Content.id = {$class}.content"),
    "modUser"        => array("alias" => "User", "on" => "User.id = {$class}.client"),
    "modUserProfile" => array("alias" => "UserProfile", "on" => "UserProfile.internalKey = {$class}.client"),
    "PasStatus"      => array("alias" => "SubscriptionStatus", "on" => "SubscriptionStatus.id = {$class}.status AND SubscriptionStatus.class = 'PasSubscription'"),
);

// innerJoin
$innerJoin = array();

// select
$select = array(
    $class        => $modx->getSelectColumns($class, $class),
    "Content"     => $modx->getSelectColumns("PasContent", "Content", "content_"),
    "User"        => $modx->getSelectColumns("modUser", "User", "user_"),
    "UserProfile" => $modx->getSelectColumns("modUserProfile", "UserProfile", "profile_"),
    "PasStatus"   => $modx->getSelectColumns("PasStatus", "SubscriptionStatus", "status_"),
);

// groupby
$groupby = array(
    "{$class}.id",
);

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


/** @var pdoFetch $pdoFetch */
$fqn = $modx->getOption("pdoFetch.class", null, "pdotools.pdofetch", true);
$path = $modx->getOption("pdofetch_class_path", null, MODX_CORE_PATH . "components/pdotools/model/", true);
if ($pdoClass = $modx->loadClass($fqn, $path, false, true)) {
    $pdoFetch = new $pdoClass($modx, $scriptProperties);
} else {
    return false;
}

$default = array(
    "class"     => $class,
    "where"     => $where,
    "leftJoin"  => $leftJoin,
    "innerJoin" => $innerJoin,
    "select"    => $select,
    "groupby"   => implode(", ", $groupby),
);

// Merge all properties and run!
$pdoFetch->setConfig(array_merge($default, $scriptProperties, array("return" => "data")), false);
$pdoFetch->addTime("pdoTools loaded");
$rows = $pdoFetch->run();

$subscriptions = array();
if (!empty($rows) AND is_array($rows)) {
    foreach ($rows as $k => $row) {
        $row = array_merge($scriptProperties, $row);
        $subscriptions[] = $row;
    }
}

$rows = $subscriptions;
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
