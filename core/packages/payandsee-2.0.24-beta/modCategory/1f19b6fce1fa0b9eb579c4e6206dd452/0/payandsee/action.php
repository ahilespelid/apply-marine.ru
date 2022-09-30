<?php

//ini_set('display_errors', 1);
//ini_set('error_reporting', -1);

if (empty($_REQUEST['pasaction'])) {
    @session_write_close();
    die('Access denied');
}
define('MODX_API_MODE', true);
define('MODX_ACTION_MODE', true);

$productionConfig = dirname(dirname(dirname(dirname(__FILE__)))) . '/index.php';
$developmentConfig = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/index.php';
if (file_exists($productionConfig)) {
    /** @noinspection PhpIncludeInspection */
    require_once $productionConfig;
} else {
    /** @noinspection PhpIncludeInspection */
    require_once $developmentConfig;
}

$modx->getService('error', 'error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('FILE');
$modx->error->message = null;

$ctx = !empty($_REQUEST['ctx']) ? (string)$_REQUEST['ctx'] : 'web';
if ($ctx !== 'web') {
    $modx->switchContext($ctx);
    $modx->user = null;
    $modx->getUser($ctx);
}

$corePath = $modx->getOption('payandsee_core_path', null,
    $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/payandsee/');
/** @var PayAndSee $PayAndSee */
$PayAndSee = $modx->getService('payandsee', 'PayAndSee', $corePath . 'model/payandsee/',
    array('core_path' => $corePath));
$modx->lexicon->load('payandsee:default');

if ($modx->error->hasError() OR !($PayAndSee instanceof PayAndSee)) {
    @session_write_close();
    die('Error');
}


$PayAndSee->initialize($ctx, array('jsonResponse' => true));
switch (strtolower($_REQUEST['pasaction'])) {
    case 'order/add':
        $response = $PayAndSee->order->add(@$_REQUEST['key'], @$_REQUEST['value']);
        break;
    case 'order/submit':
        $response = $PayAndSee->order->submit($_REQUEST);
        break;
    case 'order/getcost':
        $response = $PayAndSee->order->getCost();
        break;
    case 'order/getrequired':
        $response = $PayAndSee->order->getDeliveryRequiresFields(@$_REQUEST['id']);
        break;
    case 'order/get':
        $response = $PayAndSee->order->get();
        break;
    default:
        $response = $PayAndSee->failure('pas_err_unknown');
}

if (is_array($response)) {
    $response = json_encode($response, true);
}

@session_write_close();
exit($response);