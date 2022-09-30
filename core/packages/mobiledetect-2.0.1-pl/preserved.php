<?php return array (
  'd9267bd0c236c1f39f37f41a04660e56' => 
  array (
    'criteria' => 
    array (
      'name' => 'mobiledetect',
    ),
    'object' => 
    array (
      'name' => 'mobiledetect',
      'path' => '{core_path}components/mobiledetect/',
      'assets_path' => '',
    ),
  ),
  'e0479b5089817b7aa02a036d54494232' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_disable_plugin',
    ),
    'object' => 
    array (
      'key' => 'md_disable_plugin',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  'f178707ad30f5d0880fc26910b26f49f' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_use_cookie',
    ),
    'object' => 
    array (
      'key' => 'md_use_cookie',
      'value' => '1',
      'xtype' => 'combo-boolean',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '99332071eb613997fd78a4392bbaebde' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_tablet_is_standard',
    ),
    'object' => 
    array (
      'key' => 'md_tablet_is_standard',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '073b9194eb7238646c33320d4c1be562' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_force_browser_variable',
    ),
    'object' => 
    array (
      'key' => 'md_force_browser_variable',
      'value' => 'browser',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '91e3bf12b93d8803ff14687934649ad1' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_force_browser_standard',
    ),
    'object' => 
    array (
      'key' => 'md_force_browser_standard',
      'value' => 'standard',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  'a4f209493736ed43ddbd766d27725dad' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_force_browser_tablet',
    ),
    'object' => 
    array (
      'key' => 'md_force_browser_tablet',
      'value' => 'tablet',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  'acbefd27364d5794d926d95f3e4b8cd0' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_force_browser_mobile',
    ),
    'object' => 
    array (
      'key' => 'md_force_browser_mobile',
      'value' => 'mobile',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '98b1d953d2abda0ff64aea5c8a82ca79' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_force_browser_detect',
    ),
    'object' => 
    array (
      'key' => 'md_force_browser_detect',
      'value' => 'detect',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '89e4d4ea8a440131363ee12daa4e8ddb' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_standard_node',
    ),
    'object' => 
    array (
      'key' => 'md_standard_node',
      'value' => 'standard',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '91f547e6eec42f84a51a5b2273e928e2' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_tablet_node',
    ),
    'object' => 
    array (
      'key' => 'md_tablet_node',
      'value' => 'tablet',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '6be71b062baace1a24ffe21527bfd827' => 
  array (
    'criteria' => 
    array (
      'key' => 'md_mobile_node',
    ),
    'object' => 
    array (
      'key' => 'md_mobile_node',
      'value' => 'mobile',
      'xtype' => 'textfield',
      'namespace' => 'mobiledetect',
      'area' => 'md_main',
      'editedon' => NULL,
    ),
  ),
  '1841ddd0ad46e795e551449bd14391a1' => 
  array (
    'criteria' => 
    array (
      'category' => 'MobileDetect',
    ),
    'object' => 
    array (
      'id' => 33,
      'parent' => 0,
      'category' => 'MobileDetect',
      'rank' => 0,
    ),
  ),
  '9e4ab276bbf5c0d0014bbf7553265e5b' => 
  array (
    'criteria' => 
    array (
      'name' => 'MobileDetect',
    ),
    'object' => 
    array (
      'id' => 53,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'MobileDetect',
      'description' => '',
      'editor_type' => 0,
      'category' => 33,
      'cache_type' => 0,
      'snippet' => '/** @var string $input */
/** @var MobileDetect $MobileDetect */
$MobileDetect = $modx->getService(\'mobiledetect\', \'MobileDetect\', MODX_CORE_PATH . \'components/mobiledetect/\');

$key = $MobileDetect->config[\'force_browser_variable\'];
$device = !empty($_GET) && array_key_exists($key, $_GET)
    ? $modx->stripTags($_GET[$key])
    : \'\';

if (empty($device)) {
    $device = $MobileDetect->getSettings();
}

if (empty($device) || $device == \'detect\') {
    /** @var Mobile_Detect $detector */
    $detector = $MobileDetect->getDetector();
    $device = ($detector->isMobile()
        ? ($detector->isTablet() ? \'tablet\' : \'mobile\')
        : \'standard\');
    $MobileDetect->saveSettings($device);
}

return (int)(strtolower($input) == $device);',
      'locked' => 0,
      'properties' => 'a:1:{s:5:"input";a:7:{s:4:"name";s:5:"input";s:4:"desc";s:13:"md_prop_input";s:4:"type";s:4:"list";s:7:"options";a:3:{i:0;a:2:{s:4:"text";s:8:"standard";s:5:"value";s:8:"standard";}i:1;a:2:{s:4:"text";s:6:"tablet";s:5:"value";s:6:"tablet";}i:2;a:2:{s:4:"text";s:6:"mobile";s:5:"value";s:6:"mobile";}}s:5:"value";s:6:"mobile";s:7:"lexicon";s:23:"mobiledetect:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/mobiledetect/elements/snippets/snippet.mobiledetect.php',
      'content' => '/** @var string $input */
/** @var MobileDetect $MobileDetect */
$MobileDetect = $modx->getService(\'mobiledetect\', \'MobileDetect\', MODX_CORE_PATH . \'components/mobiledetect/\');

$key = $MobileDetect->config[\'force_browser_variable\'];
$device = !empty($_GET) && array_key_exists($key, $_GET)
    ? $modx->stripTags($_GET[$key])
    : \'\';

if (empty($device)) {
    $device = $MobileDetect->getSettings();
}

if (empty($device) || $device == \'detect\') {
    /** @var Mobile_Detect $detector */
    $detector = $MobileDetect->getDetector();
    $device = ($detector->isMobile()
        ? ($detector->isTablet() ? \'tablet\' : \'mobile\')
        : \'standard\');
    $MobileDetect->saveSettings($device);
}

return (int)(strtolower($input) == $device);',
    ),
  ),
  'c0c8d7e2ff9c5428d4aa947a9d1cf2ea' => 
  array (
    'criteria' => 
    array (
      'name' => 'MobileDetect',
    ),
    'object' => 
    array (
      'id' => 25,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'MobileDetect',
      'description' => '',
      'editor_type' => 0,
      'category' => 33,
      'cache_type' => 0,
      'plugincode' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var MobileDetect $MobileDetect */
switch ($modx->event->name) {
    case \'OnWebPagePrerender\':
        $MobileDetect = $modx->getService(\'mobiledetect\', \'MobileDetect\', MODX_CORE_PATH . \'components/mobiledetect/\');
        if ($MobileDetect && empty($MobileDetect->config[\'disable_plugin\'])) {
            $key = $MobileDetect->config[\'force_browser_variable\'];
            $device = !empty($_GET) && array_key_exists($key, $_GET)
                ? $modx->stripTags($_GET[$key])
                : \'\';

            $modx->resource->_output = $MobileDetect->parseDocument($modx->resource->_output, $device);
        }
        break;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/mobiledetect/elements/plugins/plugin.mobiledetect.php',
      'content' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var MobileDetect $MobileDetect */
switch ($modx->event->name) {
    case \'OnWebPagePrerender\':
        $MobileDetect = $modx->getService(\'mobiledetect\', \'MobileDetect\', MODX_CORE_PATH . \'components/mobiledetect/\');
        if ($MobileDetect && empty($MobileDetect->config[\'disable_plugin\'])) {
            $key = $MobileDetect->config[\'force_browser_variable\'];
            $device = !empty($_GET) && array_key_exists($key, $_GET)
                ? $modx->stripTags($_GET[$key])
                : \'\';

            $modx->resource->_output = $MobileDetect->parseDocument($modx->resource->_output, $device);
        }
        break;
}',
    ),
  ),
  '5ca9da83926f3e5afa3071cdadcc8be1' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 25,
      'event' => 'OnWebPagePrerender',
    ),
    'object' => 
    array (
      'pluginid' => 25,
      'event' => 'OnWebPagePrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);