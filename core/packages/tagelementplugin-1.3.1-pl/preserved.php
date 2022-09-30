<?php return array (
  'e2728d72e38904b3b09aaec0f9cba2f6' => 
  array (
    'criteria' => 
    array (
      'name' => 'tagelementplugin',
    ),
    'object' => 
    array (
      'name' => 'tagelementplugin',
      'path' => '{core_path}components/tagelementplugin/',
      'assets_path' => '',
    ),
  ),
  'def2715b7eb147f4fa4e8fc32eedb727' => 
  array (
    'criteria' => 
    array (
      'key' => 'tagelementplugin_quick_editor_keys',
    ),
    'object' => 
    array (
      'key' => 'tagelementplugin_quick_editor_keys',
      'value' => '{key: Ext.EventObject.ENTER, ctrl: true, shift: false, alt: false}',
      'xtype' => 'textfield',
      'namespace' => 'tagelementplugin',
      'area' => 'tagelementplugin_main',
      'editedon' => NULL,
    ),
  ),
  'f1e5256c5baf15acc8a1b7a4bff489a3' => 
  array (
    'criteria' => 
    array (
      'key' => 'tagelementplugin_element_editor_keys',
    ),
    'object' => 
    array (
      'key' => 'tagelementplugin_element_editor_keys',
      'value' => '{key: Ext.EventObject.ENTER, ctrl: true, shift: true, alt: false}',
      'xtype' => 'textfield',
      'namespace' => 'tagelementplugin',
      'area' => 'tagelementplugin_main',
      'editedon' => NULL,
    ),
  ),
  '5081bdf157eeccc9d95d85585af63698' => 
  array (
    'criteria' => 
    array (
      'key' => 'tagelementplugin_element_prop_keys',
    ),
    'object' => 
    array (
      'key' => 'tagelementplugin_element_prop_keys',
      'value' => '{key: Ext.EventObject.INSERT, ctrl: true, shift: false, alt: false}',
      'xtype' => 'textfield',
      'namespace' => 'tagelementplugin',
      'area' => 'tagelementplugin_main',
      'editedon' => NULL,
    ),
  ),
  '6b2ab3d353ff0acbcc4d976ea77f408b' => 
  array (
    'criteria' => 
    array (
      'key' => 'tagelementplugin_quick_chunk_editor_keys',
    ),
    'object' => 
    array (
      'key' => 'tagelementplugin_quick_chunk_editor_keys',
      'value' => '{key: Ext.EventObject.C, ctrl: true, shift: false, alt: true}',
      'xtype' => 'textfield',
      'namespace' => 'tagelementplugin',
      'area' => 'tagelementplugin_main',
      'editedon' => NULL,
    ),
  ),
  '4b5e4162bf6227d10e45ee556638c111' => 
  array (
    'criteria' => 
    array (
      'key' => 'tagelementplugin_chunk_editor_keys',
    ),
    'object' => 
    array (
      'key' => 'tagelementplugin_chunk_editor_keys',
      'value' => '{key: Ext.EventObject.C, ctrl: true, shift: true, alt: true}',
      'xtype' => 'textfield',
      'namespace' => 'tagelementplugin',
      'area' => 'tagelementplugin_main',
      'editedon' => NULL,
    ),
  ),
  '79a1142c923051268ff76d1e8f70a9cb' => 
  array (
    'criteria' => 
    array (
      'category' => 'tagElementPlugin',
    ),
    'object' => 
    array (
      'id' => 18,
      'parent' => 0,
      'category' => 'tagElementPlugin',
      'rank' => 0,
    ),
  ),
  '3cb67f1c6b08a08f380c7b4d5e1b7e2d' => 
  array (
    'criteria' => 
    array (
      'name' => 'tagElementPlugin',
    ),
    'object' => 
    array (
      'id' => 17,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tagElementPlugin',
      'description' => '',
      'editor_type' => 0,
      'category' => 18,
      'cache_type' => 0,
      'plugincode' => 'switch ($modx->event->name) {
    case \'OnDocFormPrerender\':
        $field = \'ta\';
        $panel = \'\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $panel = \'modx-panel-template\';
        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        $panel = \'modx-panel-chunk\';
        break;
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $panel = \'modx-panel-snippet\';
        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $panel = \'modx-panel-plugin\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        $panel = \'modx-panel-file-edit\';
        break;
    default:
        return;
}
if (!empty($field)) {
    $modx->controller->addLexiconTopic(\'core:chunk\');
    $modx->controller->addLexiconTopic(\'core:snippet\');
    $modx->controller->addLexiconTopic(\'tagelementplugin:default\');
    $jsUrl = $modx->getOption(\'tagelementplugin_assets_url\', null, $modx->getOption(\'assets_url\') . \'components/tagelementplugin/\').\'js/mgr/\';
    /** @var modManagerController */
    $modx->controller->addLastJavascript($jsUrl.\'tagelementplugin.js\');
    $modx->controller->addLastJavascript($jsUrl.\'dialogs.js\');
    $usingFenon = $modx->getOption(\'pdotools_fenom_parser\', null, false) ? \'true\' : \'false\';
    $connectorUrl = $modx->getOption("tagelementplugin_assets_url", null, $modx->getOption("assets_url") . "components/tagelementplugin/")."connector.php";
    $_html = <<<SCRIPT
<script type="text/javascript">
    var tagElPlugin = {};
    tagElPlugin.config = {
        panel : \'{$panel}\',
        field : \'{$field}\',
        parent : [],
        keys : {
        	quickEditor: {$modx->getOption(\'tagelementplugin_quick_editor_keys\', null, \'\')},
            elementEditor: {$modx->getOption(\'tagelementplugin_element_editor_keys\', null, \'\')},
            chunkEditor: {$modx->getOption(\'tagelementplugin_chunk_editor_keys\', null, \'\')},
            quickChunkEditor: {$modx->getOption(\'tagelementplugin_quick_chunk_editor_keys\', null,\' \')},
            elementProperties: {$modx->getOption(\'tagelementplugin_element_prop_keys\', null, \'\')}
        },
        using_fenom: {$usingFenon},
        elementEditor: \'{$modx->getOption("which_element_editor")}\',
        connector_url: \'{$connectorUrl}\'
    };
</script>
SCRIPT;
    $modx->controller->addHtml($_html);
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/tagelementplugin/elements/plugins/plugin.tagelementplugin.php',
      'content' => 'switch ($modx->event->name) {
    case \'OnDocFormPrerender\':
        $field = \'ta\';
        $panel = \'\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $panel = \'modx-panel-template\';
        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        $panel = \'modx-panel-chunk\';
        break;
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $panel = \'modx-panel-snippet\';
        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $panel = \'modx-panel-plugin\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        $panel = \'modx-panel-file-edit\';
        break;
    default:
        return;
}
if (!empty($field)) {
    $modx->controller->addLexiconTopic(\'core:chunk\');
    $modx->controller->addLexiconTopic(\'core:snippet\');
    $modx->controller->addLexiconTopic(\'tagelementplugin:default\');
    $jsUrl = $modx->getOption(\'tagelementplugin_assets_url\', null, $modx->getOption(\'assets_url\') . \'components/tagelementplugin/\').\'js/mgr/\';
    /** @var modManagerController */
    $modx->controller->addLastJavascript($jsUrl.\'tagelementplugin.js\');
    $modx->controller->addLastJavascript($jsUrl.\'dialogs.js\');
    $usingFenon = $modx->getOption(\'pdotools_fenom_parser\', null, false) ? \'true\' : \'false\';
    $connectorUrl = $modx->getOption("tagelementplugin_assets_url", null, $modx->getOption("assets_url") . "components/tagelementplugin/")."connector.php";
    $_html = <<<SCRIPT
<script type="text/javascript">
    var tagElPlugin = {};
    tagElPlugin.config = {
        panel : \'{$panel}\',
        field : \'{$field}\',
        parent : [],
        keys : {
        	quickEditor: {$modx->getOption(\'tagelementplugin_quick_editor_keys\', null, \'\')},
            elementEditor: {$modx->getOption(\'tagelementplugin_element_editor_keys\', null, \'\')},
            chunkEditor: {$modx->getOption(\'tagelementplugin_chunk_editor_keys\', null, \'\')},
            quickChunkEditor: {$modx->getOption(\'tagelementplugin_quick_chunk_editor_keys\', null,\' \')},
            elementProperties: {$modx->getOption(\'tagelementplugin_element_prop_keys\', null, \'\')}
        },
        using_fenom: {$usingFenon},
        elementEditor: \'{$modx->getOption("which_element_editor")}\',
        connector_url: \'{$connectorUrl}\'
    };
</script>
SCRIPT;
    $modx->controller->addHtml($_html);
}',
    ),
  ),
  'e5fdcfa30f65e6e51592080bbee2da21' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnChunkFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnChunkFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'edfbfb337f949fe94d374463cc56047a' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnDocFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnDocFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'c5b811bd9ecd640d6814d625f49abcc5' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnTempFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnTempFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '685b20087210fd5e852c77c3f5f829a6' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnSnipFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnSnipFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '0a99a12c66b30876be00c4de5b66df10' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnPluginFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnPluginFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'f1388d2cf627f6f08a552d8515965afd' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnFileEditFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnFileEditFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);