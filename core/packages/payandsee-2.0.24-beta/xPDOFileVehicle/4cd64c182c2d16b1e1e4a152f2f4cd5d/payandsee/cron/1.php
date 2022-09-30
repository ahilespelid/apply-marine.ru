<?php

//ini_set('display_errors', 1);
//ini_set('error_reporting', -1);

/*
 * выборка разрещающих подписок сроком действия менее 3-х дней и перевод их в статус "Скоро неАктивна"
 */

define('MODX_API_MODE', true);
$productionConfig = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';
$developmentConfig = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/index.php';
if (file_exists($productionConfig)) {
    /** @noinspection PhpIncludeInspection */
    require_once $productionConfig;
} else {
    /** @noinspection PhpIncludeInspection */
    require_once $developmentConfig;
}

// load services
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'FILE');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->getService('error', 'error.modError');
$modx->error->message = null;

$corePath = $modx->getOption('payandsee_core_path', null,
    $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/payandsee/');
/** @var PayAndSee $PayAndSee */
$PayAndSee = $modx->getService('payandsee', 'PayAndSee', $corePath . 'model/payandsee/',
    array('core_path' => $corePath));
$modx->lexicon->load('payandsee:default');

// time limit
set_time_limit(600);
$tmp = 'Trying to set time limit = 600 sec: ';
$tmp .= ini_get('max_execution_time') == 600 ? 'done' : 'error';
$modx->log(modX::LOG_LEVEL_INFO, $tmp);

// status "Скоро неАктивна"
$status = 4;

// startdate, stopdate
$startdate = date('Y-m-d H:i:s', time());
$date = new DateTime($startdate);
// 3 дня
$interval = new DateInterval('P3D');
$date->add($interval);
$stopdate = $date->format('Y-m-d H:i:s');

$c = $modx->newQuery('PasSubscription');
$c->setClassAlias('Subscription');
$c->leftJoin('PasStatus', 'SubscriptionStatus', 'SubscriptionStatus.id = Subscription.status AND SubscriptionStatus.class = "PasSubscription"');
$c->sortby('Subscription.id');

$c->where(array(
    'SubscriptionStatus.allowed' => true,
    'SubscriptionStatus.id:!='   => $status,
    'Subscription.stopdate:>='   => $startdate,
    'Subscription.stopdate:<='   => $stopdate,
));
/** @var PasSubscription $subscription */
while ($subscription = $modx->getObject('PasSubscription', $c)) {
    $subscription->changeStatus($status);
}