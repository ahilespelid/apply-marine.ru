<?php

/** @var modX $modx */
/** @var array $scriptProperties */
/** @var miniShop2 $miniShop2 */
$miniShop2 = $modx->getService('miniShop2');
if (!($miniShop2 instanceof miniShop2)) {
    return;
}

$id = (int)$modx->getOption("msorder", $scriptProperties, $modx->getOption("msorder", $_GET), true);
if (empty($id)) {
    return;
}
/** @var msOrder $order */
if (!$order = $modx->getObject("msOrder", $id)) {
    return;
}

$canView = ((!empty($_SESSION["payandsee"]["orders"]) AND in_array($id, $_SESSION["payandsee"]["orders"])) OR
    $order->get("user_id") == $modx->user->id OR $modx->user->hasSessionContext("mgr"));
if (!$canView) {
    return "";
}

if ($order->get('context') == 'pas' AND $order->get('delivery') == '2' AND $order->get('status') == '1') {
    if (!$modx->user->hasSessionContext('web') AND $order->get('user') != 1 AND $user = $order->getOne('User')) {
        $modx->user = $user;
        $modx->user->addSessionContext('web');
    }
    $miniShop2->changeOrderStatus($order->get("id"), 2);
}
return;