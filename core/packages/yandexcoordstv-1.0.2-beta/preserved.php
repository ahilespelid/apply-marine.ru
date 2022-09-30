<?php return array (
  '9e9aa9c58eb7b053b49b6cb74643725c' => 
  array (
    'criteria' => 
    array (
      'category' => 'yandexcoordstv',
    ),
    'object' => 
    array (
      'id' => 40,
      'parent' => 0,
      'category' => 'yandexcoordstv',
      'rank' => 0,
    ),
  ),
  'ce4582ff0a2e0586ae91fe3db249ba5b' => 
  array (
    'criteria' => 
    array (
      'name' => 'YandexCoordsTv',
    ),
    'object' => 
    array (
      'id' => 30,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'YandexCoordsTv',
      'description' => '',
      'editor_type' => 0,
      'category' => 40,
      'cache_type' => 0,
      'plugincode' => '$corePath = $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/yandexcoordstv/\';
$assetsUrl = $modx->getOption(\'assets_url\', null, MODX_CORE_PATH).\'components/yandexcoordstv/\';
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath . \'tv/input/\');
        break;
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath . \'tv/output/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath . \'tv/inputoptions/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath . \'tv/properties/\');
        break;
    case \'OnManagerPageBeforeRender\':
        break;
    case \'OnDocFormRender\':

        $modx->regClientCSS($assetsUrl . \'css/mgr/default.css\');

        $jqueryScript = \'<script type="text/javascript">\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'if(typeof jQuery == "undefined"){\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'document.write(\\\'<script type="text/javascript" src="//yandex.st/jquery/2.1.1/jquery.min.js" ></\\\'+\\\'script>\\\');\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'}\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'</script>\';
        $jqueryScript .= "\\n";

        $modx->regClientStartupScript($jqueryScript, true);


        $ymapsScript = \'<script type="text/javascript">\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'if(typeof ymaps == "undefined"){\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'document.write(\\\'<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?lang=ru_RU" ></\\\'+\\\'script>\\\');\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'}\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'</script>\';
        $ymapsScript .= "\\n";

        $modx->regClientStartupScript($ymapsScript, true);
        break;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$corePath = $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/yandexcoordstv/\';
$assetsUrl = $modx->getOption(\'assets_url\', null, MODX_CORE_PATH).\'components/yandexcoordstv/\';
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath . \'tv/input/\');
        break;
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath . \'tv/output/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath . \'tv/inputoptions/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath . \'tv/properties/\');
        break;
    case \'OnManagerPageBeforeRender\':
        break;
    case \'OnDocFormRender\':

        $modx->regClientCSS($assetsUrl . \'css/mgr/default.css\');

        $jqueryScript = \'<script type="text/javascript">\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'if(typeof jQuery == "undefined"){\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'document.write(\\\'<script type="text/javascript" src="//yandex.st/jquery/2.1.1/jquery.min.js" ></\\\'+\\\'script>\\\');\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'}\';
        $jqueryScript .= "\\n";
        $jqueryScript .= \'</script>\';
        $jqueryScript .= "\\n";

        $modx->regClientStartupScript($jqueryScript, true);


        $ymapsScript = \'<script type="text/javascript">\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'if(typeof ymaps == "undefined"){\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'document.write(\\\'<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?lang=ru_RU" ></\\\'+\\\'script>\\\');\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'}\';
        $ymapsScript .= "\\n";
        $ymapsScript .= \'</script>\';
        $ymapsScript .= "\\n";

        $modx->regClientStartupScript($ymapsScript, true);
        break;
}',
    ),
  ),
  'addf5d69f46be88239c62dbf1463fd86' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 30,
      'event' => 'OnDocFormRender',
    ),
    'object' => 
    array (
      'pluginid' => 30,
      'event' => 'OnDocFormRender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '9d2eb3d67c27722afdf669bdef88a63f' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 30,
      'event' => 'OnTVInputRenderList',
    ),
    'object' => 
    array (
      'pluginid' => 30,
      'event' => 'OnTVInputRenderList',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);