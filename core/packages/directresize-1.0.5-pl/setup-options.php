<?php
/* set some default values */
$values = array(
    'path_base' => 'assets/images',
);
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $setting = $modx->getObject('modSystemSetting',array('key' => 'directresize.path_base'));
        if ($setting != null) { 
		
		$values['path_base'] = $setting->get('value'); 
		
		}
        unset($setting);

    break;
    case xPDOTransport::ACTION_UNINSTALL: break;
}

$output = 'Укажите путь к директории в которой хранятся изображения (Например: assets/images). Ко всем изображениям находящимся в этой директори (в том числе и вложенные директории) будет применен плагин.
<br /><br /><label for="path_base">Директория с изображениями:</label>
<input type="text" name="path_base" id="path_base" width="300" value="'.$values['path_base'].'" />
';

return $output;