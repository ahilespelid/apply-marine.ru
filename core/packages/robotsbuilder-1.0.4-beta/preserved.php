<?php return array (
  'a94f465570af693313a3f0cd7843252f' => 
  array (
    'criteria' => 
    array (
      'name' => 'robotsbuilder',
    ),
    'object' => 
    array (
      'name' => 'robotsbuilder',
      'path' => '{core_path}components/robotsbuilder/',
      'assets_path' => '',
    ),
  ),
  'e03fa04779c4e68229329ab2d20bd2e0' => 
  array (
    'criteria' => 
    array (
      'text' => 'robotsbuilder',
    ),
    'object' => 
    array (
      'text' => 'robotsbuilder',
      'parent' => 'components',
      'action' => 'home',
      'description' => 'robotsbuilder_menu_desc',
      'icon' => '',
      'menuindex' => 3,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'robotsbuilder',
    ),
  ),
  '749a85eb74c90b530512fd6203ff9638' => 
  array (
    'criteria' => 
    array (
      'category' => 'RobotsBuilder',
    ),
    'object' => 
    array (
      'id' => 16,
      'parent' => 0,
      'category' => 'RobotsBuilder',
      'rank' => 0,
    ),
  ),
  '9cb79dbee32f9f3e1374e5d3e9c94129' => 
  array (
    'criteria' => 
    array (
      'name' => 'RobotsBuilder',
    ),
    'object' => 
    array (
      'id' => 15,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'RobotsBuilder',
      'description' => '',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'plugincode' => '/** @var modX $modx */
if ($modx->context->key == \'mgr\') return;
switch ($modx->event->name) {
    case \'OnHandleRequest\':
        $output = \'\';
        $uri = substr($_SERVER[\'REQUEST_URI\'], 1);
        switch ($uri) {
            case \'robots.txt\':
            case \'sitemap.xml\':
                $modelPath = $modx->getOption(\'robotsbuilder_core_path\',null,$modx->getOption(\'core_path\').\'components/robotsbuilder/\').\'model/\';
                $modx->addPackage(\'robotsbuilder\', $modelPath);
                if ($robots = $modx->getObject(\'RobotsBuilderItem\', array(\'context\' => $modx->context->key, \'type\' => $uri, \'active\' => true))) {
                    if ($chunk = $modx->newObject(\'modChunk\', array(\'snippet\' => $robots->get(\'content\')))){
                        $chunk->setCacheable(false);
                        $output = $chunk->process();
                    }
                }
                break;
            default:
                break;
        }
        if ($output) {
            switch ($uri) {
                case \'robots.txt\':
                    header(\'Content-Type: text/plain\');
                    break;
                case \'sitemap.xml\':
                    header(\'Content-Type: text/xml\');
                    break;
                default:
                    return;
                    break;
            }
            print $output;
            die();
        }
        break;
    default:
        break;
}
return;',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/robotsbuilder/elements/plugins/plugin.robotsbuilder.php',
      'content' => '/** @var modX $modx */
if ($modx->context->key == \'mgr\') return;
switch ($modx->event->name) {
    case \'OnHandleRequest\':
        $output = \'\';
        $uri = substr($_SERVER[\'REQUEST_URI\'], 1);
        switch ($uri) {
            case \'robots.txt\':
            case \'sitemap.xml\':
                $modelPath = $modx->getOption(\'robotsbuilder_core_path\',null,$modx->getOption(\'core_path\').\'components/robotsbuilder/\').\'model/\';
                $modx->addPackage(\'robotsbuilder\', $modelPath);
                if ($robots = $modx->getObject(\'RobotsBuilderItem\', array(\'context\' => $modx->context->key, \'type\' => $uri, \'active\' => true))) {
                    if ($chunk = $modx->newObject(\'modChunk\', array(\'snippet\' => $robots->get(\'content\')))){
                        $chunk->setCacheable(false);
                        $output = $chunk->process();
                    }
                }
                break;
            default:
                break;
        }
        if ($output) {
            switch ($uri) {
                case \'robots.txt\':
                    header(\'Content-Type: text/plain\');
                    break;
                case \'sitemap.xml\':
                    header(\'Content-Type: text/xml\');
                    break;
                default:
                    return;
                    break;
            }
            print $output;
            die();
        }
        break;
    default:
        break;
}
return;',
    ),
  ),
  '0d5e6be4df1beb3b2e2966b68713f7ba' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 15,
      'event' => 'OnHandleRequest',
    ),
    'object' => 
    array (
      'pluginid' => 15,
      'event' => 'OnHandleRequest',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);