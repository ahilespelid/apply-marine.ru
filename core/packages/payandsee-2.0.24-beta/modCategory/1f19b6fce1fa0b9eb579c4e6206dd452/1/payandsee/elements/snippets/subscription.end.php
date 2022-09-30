<?php
/** @var modX $modx */
/** @var array $scriptProperties */

/*
 * выборка разрещающих просроченных подписок и перевод их в статус "неактивна"
 */

// status "неактивна"
$status = 3;

// startdate, stopdate
$stopdate = date('Y-m-d H:i:s', time());

$c = $modx->newQuery('PasSubscription');
$c->setClassAlias('Subscription');
$c->leftJoin('PasStatus', 'SubscriptionStatus', 'SubscriptionStatus.id = Subscription.status AND SubscriptionStatus.class = "PasSubscription"');
$c->sortby('Subscription.id');

$c->where(array(
    'SubscriptionStatus.allowed' => true,
    'SubscriptionStatus.id:!='   => $status,
    'Subscription.stopdate:<='   => $stopdate,
));
/** @var PasSubscription $subscription */
while ($subscription = $modx->getObject('PasSubscription', $c)) {
    $subscription->changeStatus($status);
}


/*
 * выборка разрещающих подписок сроком действия менее 3-х дней и перевод их в статус "Скоро неАктивна"
 */

// startdate, stopdate
$startdate = date('Y-m-d H:i:s', time());
$date = new DateTime($startdate);
// 3 дня
$interval = new DateInterval('P3D');
$date->add($interval);

$stopdate = $date->format('Y-m-d H:i:s');

// status "Скоро неАктивна"
$status = 4;

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