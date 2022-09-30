<?php return array (
  'd77c887663770d554c2f3db425b50a70' => 
  array (
    'criteria' => 
    array (
      'name' => 'simpleupdater',
    ),
    'object' => 
    array (
      'name' => 'simpleupdater',
      'path' => '{core_path}components/simpleupdater/',
      'assets_path' => '',
    ),
  ),
  'a41563b2193f3c567f44a7e2cd5f99f1' => 
  array (
    'criteria' => 
    array (
      'key' => 'simpleupdater.http_handler',
    ),
    'object' => 
    array (
      'key' => 'simpleupdater.http_handler',
      'value' => 'file_get_contents',
      'xtype' => 'textfield',
      'namespace' => 'simpleupdater',
      'area' => 'system',
      'editedon' => NULL,
    ),
  ),
  'b97dd053917932d2c5e6a9ee04ce656c' => 
  array (
    'criteria' => 
    array (
      'key' => 'simpleupdater.github_user',
    ),
    'object' => 
    array (
      'key' => 'simpleupdater.github_user',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'simpleupdater',
      'area' => 'system',
      'editedon' => NULL,
    ),
  ),
  '73514e21a19b851be5d7c9a9344646df' => 
  array (
    'criteria' => 
    array (
      'key' => 'simpleupdater.github_token',
    ),
    'object' => 
    array (
      'key' => 'simpleupdater.github_token',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'simpleupdater',
      'area' => 'system',
      'editedon' => NULL,
    ),
  ),
  'd0c0ee4c1431bf4bec7e323e39014929' => 
  array (
    'criteria' => 
    array (
      'text' => 'simpleupdater',
    ),
    'object' => 
    array (
      'text' => 'simpleupdater',
      'parent' => 'Системное',
      'action' => 'index',
      'description' => 'simpleupdater_menu_desc',
      'icon' => 'images/icons/plugin.gif',
      'menuindex' => 6,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'simpleupdater',
    ),
  ),
  '47c51aaa7db007a1848ff45c1dae61d1' => 
  array (
    'criteria' => 
    array (
      'category' => 'simpleUpdater',
    ),
    'object' => 
    array (
      'id' => 17,
      'parent' => 0,
      'category' => 'simpleUpdater',
      'rank' => 0,
    ),
  ),
  'a21d038b65fdad40433a7e469ae185dc' => 
  array (
    'criteria' => 
    array (
      'name' => 'simpleUpdater',
    ),
    'object' => 
    array (
      'id' => 16,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'simpleUpdater',
      'description' => '',
      'editor_type' => 0,
      'category' => 17,
      'cache_type' => 0,
      'plugincode' => '/**
 * simpleUpdater
 *
 * @package simpleupdater
 * @subpackage plugin
 *
 * @event OnManagerPageBeforeRender
 *
 * @var modX $modx
 */

$eventName = $modx->event->name;

$corePath = $modx->getOption(\'simpleupdater.core_path\', null, $modx->getOption(\'core_path\') . \'components/simpleupdater/\');
/** @var simpleUpdater $simpleupdater */
$simpleupdater = $modx->getService(\'simpleupdater\', \'simpleUpdater\', $corePath . \'model/simpleupdater/\', array(
    \'core_path\' => $corePath
));

switch ($modx->event->name) {
    case \'OnManagerPageBeforeRender\':
        if ($modx->user->isMember(\'Administrator\')) {
            $modx->controller->addLexiconTopic(\'simpleupdater:default\');
            $modx->controller->addJavascript($simpleupdater->getOption(\'assetsUrl\') . \'js/mgr/widgets/update.button.js?v=\' . $simpleupdater->version);
            $response = $modx->runProcessor(\'mgr/version/check\', array(), array(
                \'processors_path\' => $simpleupdater->getOption(\'processorsPath\')
            ));
            $html = "<script>var simpleUpdateConfig = " . json_encode($response->getObject(), JSON_PRETTY_PRINT) . ";</script>";
            $modx->controller->addHtml($html);
        }
        break;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/simpleupdater/elements/plugins/plugin.simpleupdater.php',
      'content' => '/**
 * simpleUpdater
 *
 * @package simpleupdater
 * @subpackage plugin
 *
 * @event OnManagerPageBeforeRender
 *
 * @var modX $modx
 */

$eventName = $modx->event->name;

$corePath = $modx->getOption(\'simpleupdater.core_path\', null, $modx->getOption(\'core_path\') . \'components/simpleupdater/\');
/** @var simpleUpdater $simpleupdater */
$simpleupdater = $modx->getService(\'simpleupdater\', \'simpleUpdater\', $corePath . \'model/simpleupdater/\', array(
    \'core_path\' => $corePath
));

switch ($modx->event->name) {
    case \'OnManagerPageBeforeRender\':
        if ($modx->user->isMember(\'Administrator\')) {
            $modx->controller->addLexiconTopic(\'simpleupdater:default\');
            $modx->controller->addJavascript($simpleupdater->getOption(\'assetsUrl\') . \'js/mgr/widgets/update.button.js?v=\' . $simpleupdater->version);
            $response = $modx->runProcessor(\'mgr/version/check\', array(), array(
                \'processors_path\' => $simpleupdater->getOption(\'processorsPath\')
            ));
            $html = "<script>var simpleUpdateConfig = " . json_encode($response->getObject(), JSON_PRETTY_PRINT) . ";</script>";
            $modx->controller->addHtml($html);
        }
        break;
}',
    ),
  ),
  'eabc81f39aa64986c550dc5808bf40f8' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnManagerPageBeforeRender',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnManagerPageBeforeRender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);