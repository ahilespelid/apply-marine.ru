<?php

/** @var modX $modx */
/** @var array $scriptProperties */
/** @var PayAndSee $PayAndSee */
switch ($modx->event->name) {

    // создать тариф для подписки
    case 'PasOnGetContentRate':
        return;

        /** @var PasContent $content */
        /** @var PasRate $rate */
        if ($content AND !$rate) {
            $rate = $modx->newObject('PasRate');
            $rate->fromArray(array(
                'content'    => $content->get('id'),
                'cost'       => '100',
                'term_value' => '2',
                'term_unit'  => 'd',
                'active'     => 1,
            ));
            $scriptProperties['rate'] = $rate;
        }
        break;

    case 'OnMODXInit':
        /** @var PayAndSee $PayAndSee */
        $corePath = $modx->getOption('payandsee_core_path', null,
            $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/payandsee/');
        $PayAndSee = $modx->getService('payandsee', 'PayAndSee', $corePath . 'model/payandsee/',
            array('core_path' => $corePath));
        if (!$PayAndSee) {
            return;
        }

        $PayAndSee->addExtension('access', 'getResourceAccess', function ($rid = null, $uid = null, $cache = true) use (&$modx, &$PayAndSee) {
            $rid = (int)$rid;
            $uid = (int)$uid;
            $key = "rid_{$rid}|uid_{$uid}";
            if (!$cache OR ($access = $PayAndSee->getStore('access', $key)) === false) {
                // получаем клиента и если статус == 4 vip сразу разрешаем доступ независимо от контента ресурса
                if ($client = $modx->user->getOne('PasClient') AND $client->get('status') == 4) {
                    $access = true;
                } else {
                    $cid = $PayAndSee->getContentId($rid, 10, $cache);
                    $access = $PayAndSee->getContentAccess($cid, $uid, $cache);
                }
                $PayAndSee->addStore('access', $key, $access);
            }

            return $access;
        });
        break;


}