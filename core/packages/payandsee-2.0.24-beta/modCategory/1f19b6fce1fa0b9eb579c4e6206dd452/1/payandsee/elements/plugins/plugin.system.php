<?php

/** @var modX $modx */
/** @var array $scriptProperties */
/** @var PayAndSee $PayAndSee */
$corePath = $modx->getOption('payandsee_core_path', null,
    $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/payandsee/');
$PayAndSee = $modx->getService('payandsee', 'PayAndSee', $corePath . 'model/payandsee/',
    array('core_path' => $corePath));
if (!$PayAndSee) {
    return;
}

$PayAndSee->processEvent($modx->event, $scriptProperties);