<?php
$xpdo_meta_map['PasRate']= array (
  'package' => 'payandsee',
  'version' => '1.1',
  'table' => 'payandsee_rates',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'MyISAM',
  ),
  'fields' => 
  array (
    'content' => NULL,
    'cost' => 0,
    'term_value' => 0,
    'term_unit' => '',
    'description' => '',
    'active' => 1,
  ),
  'fieldMeta' => 
  array (
    'content' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
    ),
    'cost' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => false,
      'default' => 0,
    ),
    'term_value' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'term_unit' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '10',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'active' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => true,
      'default' => 1,
    ),
  ),
  'indexes' => 
  array (
    'content' => 
    array (
      'alias' => 'content',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'content' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'term_unit' => 
    array (
      'alias' => 'term_unit',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'term_unit' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'active' => 
    array (
      'alias' => 'active',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'active' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'aggregates' => 
  array (
    'Content' => 
    array (
      'class' => 'PasContent',
      'local' => 'content',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
  'validation' => 
  array (
    'rules' => 
    array (
      'content' => 
      array (
        'preventBlank' => 
        array (
          'type' => 'xPDOValidationRule',
          'rule' => 'xPDOMinValueValidationRule',
          'value' => '1',
          'message' => 'payandsee_err_value',
        ),
      ),
      'term_value' => 
      array (
        'preventBlank' => 
        array (
          'type' => 'xPDOValidationRule',
          'rule' => 'xPDOMinValueValidationRule',
          'value' => '1',
          'message' => 'payandsee_err_value',
        ),
      ),
      'term_unit' => 
      array (
        'invalid' => 
        array (
          'type' => 'preg_match',
          'rule' => '/^[y|m|d|h|i]$/',
          'message' => 'payandsee_err_value',
        ),
      ),
    ),
  ),
);
