<?php
/** @var modX $modx */
/** @var array $scriptProperties */
if ($modx->event->name != 'OnMODXInit') {
    return;
}

$fqn = $modx->getOption('payandsee_validator_class', null, 'payandsee.PasValidator', true);
$path = $modx->getOption('payandsee_validator_class_path', null, MODX_CORE_PATH . 'components/payandsee/model/', true);
$modx->loadClass($fqn, $path, false, true);

$modx->loadClass('modUser');
$modx->map['modUser']['composites']['PasClient'] = array(
    'class'       => 'PasClient',
    'local'       => 'id',
    'foreign'     => 'id',
    'cardinality' => 'one',
    'owner'       => 'local',
);
$modx->map['modUser']['composites']['PasSubscription'] = array(
    'class'       => 'PasSubscription',
    'local'       => 'id',
    'foreign'     => 'client',
    'cardinality' => 'many',
    'owner'       => 'local',
);

$modx->loadClass('msOrderProduct');
$modx->map['msOrderProduct']['fields']['content_id'] = '';
$modx->map['msOrderProduct']['fieldMeta']['content_id'] = array(
    'dbtype'     => 'int',
    'precision'  => '10',
    'attributes' => 'unsigned',
    'phptype'    => 'integer',
    'null'       => true,
    'default'    => 0,
);
$modx->map['msOrderProduct']['indexes']['content_id'] = array(
    'alias'   => 'content_id',
    'primary' => false,
    'unique'  => false,
    'type'    => 'BTREE',
    'columns' => array(
        'content_id' => array(
            'length'    => '',
            'collation' => 'A',
            'null'      => false,
            'default'   => 0,
        ),
    ),
);
$modx->map['msOrderProduct']['aggregates']['Content'] = array(
    'class'       => 'PasContent',
    'local'       => 'content_id',
    'foreign'     => 'id',
    'cardinality' => 'one',
    'owner'       => 'local',
);
return;
