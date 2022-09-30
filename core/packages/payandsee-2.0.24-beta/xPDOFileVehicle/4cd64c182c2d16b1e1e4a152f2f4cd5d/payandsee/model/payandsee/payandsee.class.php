<?php

//ini_set('display_errors', 1);
//ini_set('error_reporting', -1);

/**
 * The base class for PayAndSee.
 */
class PayAndSee
{
    public $version = '2.0.24-beta';

    /** @var modX $modx */
    public $modx;

    /** @var mixed|null $namespace */
    public $namespace = 'payandsee';
    /** @var array $config */
    public $config = array();
    /** @var array $initialized */
    public $initialized = array();
    /** @var array $placeholders */
    public $placeholders = array();

    /** @var array $_extension */
    protected $_extension = array();
    /** @var array $_store */
    protected $_store = array();

    /** @var pdoFetch $pdoTools */
    public $pdoTools;

    /** @var miniShop2 $miniShop2 */
    public $miniShop2;
    /** @var msCartHandler $cart */
    public $cart;
    /** @var PasOrderHandler $order */
    public $order;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;

        $corePath = $this->getOption('core_path', $config,
            $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/payandsee/');
        $assetsPath = $this->getOption('assets_path', $config,
            $this->modx->getOption('assets_path', null, MODX_ASSETS_PATH) . 'components/payandsee/');
        $assetsUrl = $this->getOption('assets_url', $config,
            $this->modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/payandsee/');
        $connectorUrl = $assetsUrl . 'connector.php';

        $this->config = array_merge(array(
            'namespace'       => $this->namespace,
            'connectorUrl'    => $connectorUrl,
            'assetsBasePath'  => MODX_ASSETS_PATH,
            'assetsBaseUrl'   => MODX_ASSETS_URL,
            'assetsPath'      => $assetsPath,
            'assetsUrl'       => $assetsUrl,
            'cssUrl'          => $assetsUrl . 'css/',
            'jsUrl'           => $assetsUrl . 'js/',
            'corePath'        => $corePath,
            'modelPath'       => $corePath . 'model/',
            'handlersPath'    => $corePath . 'handlers/',
            'customPath'      => $corePath . 'custom/',
            'processorsPath'  => $corePath . 'processors/',
            'templatesPath'   => $corePath . 'elements/templates/mgr/',
            'jsonResponse'    => true,
            'prepareResponse' => true,
            'showLog'         => false,
            'useFenom'        => true,
        ), $config);


        $this->modx->addPackage('payandsee', $this->config['modelPath']);
        $this->modx->lexicon->load('payandsee:default');
        $this->namespace = $this->getOption('namespace', $config, 'payandsee');

        $this->miniShop2 = $modx->getService('miniShop2');
        if (!($this->miniShop2 instanceof miniShop2)) {
            return false;
        }

        if ($this->pdoTools = $this->modx->getService('pdoFetch')) {
            $this->pdoTools->setConfig($this->config);
        } else {
            return false;
        }

        $this->checkStat();
    }

    /**
     * @param       $n
     * @param array $p
     */
    public function __call($n, array $p)
    {
        echo __METHOD__ . ' says: ' . $n;
    }

    /**
     * @param       $key
     * @param array $config
     * @param null $default
     *
     * @return mixed|null
     */
    public function getOption($key, $config = array(), $default = null, $skipEmpty = false)
    {
        $option = $default;
        if (!empty($key) AND is_string($key)) {
            if ($config != null AND array_key_exists($key, $config)) {
                $option = $config[$key];
            } else if (array_key_exists($key, $this->config)) {
                $option = $this->config[$key];
            } else if (array_key_exists("{$this->namespace}_{$key}", $this->modx->config)) {
                $option = $this->modx->getOption("{$this->namespace}_{$key}");
            }
        }
        if ($skipEmpty AND empty($option)) {
            $option = $default;
        }

        return $option;
    }

    public function setOption($key, $value)
    {
        $this->config[$key] = $value;
    }

    public function initialize($ctx = 'web', array $scriptProperties = array())
    {
        if (empty($ctx)) {
            $ctx = $this->modx->context->key;
        }
        if (isset($this->initialized[$ctx])) {
            return $this->initialized[$ctx];
        }

        $this->config = array_merge($this->config, $scriptProperties, array('ctx' => $ctx));

        if ($ctx != 'mgr' AND (!defined('MODX_API_MODE') OR !MODX_API_MODE)) {

            if ($results = $this->modx->getCacheManager()->generateContext($ctx)) {
                $config = isset($results['config']) ? $results['config'] : null;
                $lang = $this->getOption('cultureKey', $config);
            }
            if (empty($lang)) {
                $lang = $this->modx->getOption('cultureKey', null, 'en');
            }

            $this->setOption('cultureKey', $lang);
            $this->modx->setOption('cultureKey', $lang);
            $this->modx->lexicon->load($lang . ':payandsee:default');

            $this->loadResourceJsCss($scriptProperties);
        }

        $load = $this->loadServices($ctx);
        $this->initialized[$ctx] = $load;

        return $load;
    }

    public function loadCustomClasses($type)
    {
        // Original classes
        if (file_exists($this->config['customPath'] . $type)) {
            $files = scandir($this->config['customPath'] . $type, true);
            foreach ($files as $file) {
                if (preg_match('/.*?\.class\.php$/i', $file)) {
                    /** @noinspection PhpIncludeInspection */
                    include_once($this->config['customPath'] . $type . '/' . $file);
                }
            }
        }
    }

    public function loadServices($ctx = 'web')
    {
        if (!class_exists('PasOrderHandler')) {
            require_once dirname(__FILE__) . '/pasorderhandler.class.php';
        }

        $order_class = $this->getOption('order_handler_class', null, 'PasOrderHandler');
        if ($order_class != 'PasOrderHandler') {
            $this->loadCustomClasses('order');
        }
        if (!class_exists($order_class)) {
            $order_class = 'PasOrderHandler';
        }
        $this->order = new $order_class($this, $this->config);
        if (!($this->order instanceof PasOrderInterface) || $this->order->initialize($ctx) !== true) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,
                'Could not initialize PayAndSee order handler class: "' . $order_class . '"');

            return false;
        }

        return true;
    }

    /**
     * return lexicon message if possibly
     *
     * @param string $message
     *
     * @return string $message
     */
    public function lexicon($message, $placeholders = array())
    {
        $key = '';
        if ($this->modx->lexicon->exists($message)) {
            $key = $message;
        } else if ($this->modx->lexicon->exists($this->namespace . '_' . $message)) {
            $key = $this->namespace . '_' . $message;
        }
        if ($key !== '') {
            $message = $this->modx->lexicon->process($key, $placeholders);
        }

        return $message;
    }

    /**
     * @param string $message
     * @param array $data
     * @param array $placeholders
     *
     * @return array|string
     */
    public function failure($message = '', $data = array(), $placeholders = array())
    {
        $response = array(
            'success' => false,
            'message' => $this->lexicon($message, $placeholders),
            'data'    => $data,
        );

        return $this->config['jsonResponse'] ? $this->modx->toJSON($response) : $response;
    }

    /**
     * @param string $message
     * @param array $data
     * @param array $placeholders
     *
     * @return array|string
     */
    public function success($message = '', $data = array(), $placeholders = array())
    {
        $response = array(
            'success' => true,
            'message' => $this->lexicon($message, $placeholders),
            'data'    => $data,
        );

        return $this->config['jsonResponse'] ? $this->modx->toJSON($response) : $response;
    }


    /**
     * @param        $array
     * @param string $delimiter
     *
     * @return array
     */
    public function explodeAndClean($array, $delimiter = ',')
    {
        $array = explode($delimiter, $array);     // Explode fields to array
        $array = array_map('trim', $array);       // Trim array's values
        $array = array_keys(array_flip($array));  // Remove duplicate fields
        $array = array_filter($array);            // Remove empty values from array

        return $array;
    }

    /**
     * @param        $array
     * @param string $delimiter
     *
     * @return array|string
     */
    public function cleanAndImplode($array, $delimiter = ',')
    {
        $array = array_map('trim', $array);       // Trim array's values
        $array = array_keys(array_flip($array));  // Remove duplicate fields
        $array = array_filter($array);            // Remove empty values from array
        $array = implode($delimiter, $array);

        return $array;
    }

    /**
     * @param array $array
     *
     * @return array
     */
    public function cleanArray(array $array = array())
    {
        $array = array_map('trim', $array);       // Trim array's values
        $array = array_filter($array);            // Remove empty values from array
        $array = array_keys(array_flip($array));  // Remove duplicate fields

        return $array;
    }

    /**
     * @param array $array1
     * @param array $array2
     *
     * @return array
     */
    public function array_merge_recursive_ex(array & $array1 = array(), array & $array2 = array())
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value) {
            if (is_array($value) AND isset($merged[$key]) AND is_array($merged[$key])) {
                $merged[$key] = $this->array_merge_recursive_ex($merged[$key], $value);
            } else {
                if (is_numeric($key)) {
                    if (!in_array($value, $merged)) {
                        $merged[] = $value;
                    }
                } else {
                    $merged[$key] = $value;
                }
            }
        }

        return $merged;
    }

    /**
     * @param array $array
     * @param string $prefix
     *
     * @return array
     */
    public function flattenArray(array $array = array(), $prefix = '')
    {
        $outArray = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $outArray = $outArray + $this->flattenArray($value, $prefix . $key . '.');
            } else {
                $outArray[$prefix . $key] = $value;
            }
        }

        return $outArray;
    }

    public function translatePath($path = '')
    {
        return str_replace(array(
            '{core_path}',
            '{base_path}',
            '{assets_path}',
        ), array(
            $this->modx->getOption('core_path', null, MODX_CORE_PATH),
            $this->modx->getOption('base_path', null, MODX_BASE_PATH),
            $this->modx->getOption('assets_path', null, MODX_ASSETS_PATH),
        ), $path);
    }

    public function isWorkingTemplates(modResource $resource)
    {
        return in_array($resource->get('template'), $this->explodeAndClean($this->getOption('working_templates', null)));
    }

    public function getResourceParents($id = null, $height = 10, array $parents = array())
    {
        if ($id AND $height > 0) {
            $parent = 0;
            $sql = "SELECT parent FROM " . $this->modx->getTableName('modResource') . " WHERE id = " . $id;
            $sql .= " AND template IN (" . $this->getOption('working_templates', null, '-0', true) . ")";
            if ($stmt = $this->modx->prepare($sql)) {
                if (!$parent = $this->modx->getValue($stmt)) {
                    $parent = 0;
                }
            }
            $parents[] = $parent;
            if (!empty($parent)) {
                $parents = $this->getResourceParents($parent, --$height, $parents);
            }
        }

        return $parents;
    }

    public function getResourceContent($id = null, $height = 10, $cache = true)
    {
        $cid = 0;
        $key = "rid_{$id}";
        if (($id AND $height > 0) AND (!$cache OR ($cid = $this->getStore('access', $key)) === false)) {
            $parents = $this->getResourceParents($id, $height);

            $sql = "SELECT id FROM " . $this->modx->getTableName('PasContent') . " WHERE resource = " . $id;
            $sql .= " OR (resource IN (" . implode(',', $parents) . ") AND nested = 1)";
            $sql .= " ORDER BY FIELD(resource, " . implode(',', array_merge(array($id), $parents)) . ") ASC ";
            if ($stmt = $this->modx->prepare($sql)) {
                $cid = $this->modx->getValue($stmt);
            }
            $cid = (int)$cid;

            $this->addStore('access', $key, $cid);
        }

        return $cid;
    }

    public function getContentId($id = null, $height = 10, $cache = true)
    {
        $func = $this->getExtension('access', 'getContentId');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($id, $height, $cache));
        }

        $key = "cid_{$id}";
        if (!$cache OR ($cid = $this->getStore('access', $key)) === false) {
            $cid = $this->getResourceContent($id, $height);
            $this->addStore('access', $key, $cid);
        }

        return $cid;
    }

    public function getContentAccess($cid = null, $uid = null, $cache = true)
    {
        $func = $this->getExtension('access', 'getContentAccess');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($cid, $uid, $cache));
        }

        $cid = (int)$cid;
        $uid = (int)$uid;
        $key = "cid_{$cid}|uid_{$uid}";
        if (!$cache OR ($access = $this->getStore('access', $key)) === false) {
            if (!empty($cid)) {
                $c = $this->modx->newQuery('PasContent');
                $c->setClassAlias('Content');

                $c->leftJoin('PasClient', 'Client', "Client.id = {$uid}");
                $c->leftJoin('PasSubscription', 'Subscription', "Subscription.content = {$cid} AND Subscription.client = {$uid}");

                $c->leftJoin('PasStatus', 'ClientStatus', 'ClientStatus.id = Client.status AND ClientStatus.class = "PasClient"');
                $c->leftJoin('PasStatus', 'ContentStatus', 'ContentStatus.id = Content.status AND ContentStatus.class = "PasContent"');
                $c->leftJoin('PasStatus', 'SubscriptionStatus', 'SubscriptionStatus.id = Subscription.status AND SubscriptionStatus.class = "PasSubscription"');
                $c->groupby('Content.id');

                $time = date('Y-m-d H:i:s', time());
                $filter = array(
                    "Content.id"                 => $cid,
                    'ClientStatus.allowed'       => true,
                    'ContentStatus.allowed'      => true,
                    'SubscriptionStatus.allowed' => true,
                    'Subscription.startdate:<='  => $time,
                    'Subscription.stopdate:>='   => $time,
                );
                $c->query['where'][] = new xPDOQueryCondition(array(
                    'sql'         => $this->parseBindings($c->parseConditions($filter, xPDOQuery::SQL_AND), true),
                    'conjunction' => "OR",
                ));

                $filter = array(
                    "Content.id"        => $cid,
                    "Content.status:IN" => array(1, 3),
                );
                $c->query['where'][] = new xPDOQueryCondition(array(
                    'sql'         => $this->parseBindings($c->parseConditions($filter, xPDOQuery::SQL_AND), true),
                    'conjunction' => "OR",
                ));

                /*$s = $c->prepare();
                $sql = $c->toSQL();
                $s->execute();
                $this->modx->log(1, print_r($sql, 1));
                $this->modx->log(1, print_r($s->errorInfo(), 1));*/

                $access = $this->modx->getCount('PasContent', $c);
            } else {
                $access = 1;
            }

            $this->addStore('access', $key, $access);
        }

        return $access;
    }

    public function getResourceAccess($rid = null, $uid = null, $cache = true)
    {
        $func = $this->getExtension('access', 'getResourceAccess');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($rid, $uid, $cache));
        }

        $rid = (int)$rid;
        $uid = (int)$uid;
        $key = "rid_{$rid}|uid_{$uid}";
        if (!$cache OR ($access = $this->getStore('access', $key)) === false) {
            $cid = $this->getContentId($rid, 10, $cache);
            $access = $this->getContentAccess($cid, $uid, $cache);

            $this->addStore('access', $key, $access);
        }

        return $access;
    }

    public function getActionUrl($action = "", array $setting = array(), $cache = true)
    {
        $key = "action_{$action}";
        if (!$cache OR ($actionUrl = $this->getStore('access', $key)) === false) {

            $actionUrl = "";
            switch ($action) {
                case "order":
                    $id = trim($this->modx->getOption("orderAction", $setting, $this->getOption("order_resource_id", null), true));
                    if (!empty($id) AND is_numeric($id)) {
                        $actionUrl = $this->modx->makeUrl($id, "", "", "full");
                    } else {
                        $actionUrl = $id;
                    }
                    break;
                default:
                    break;
            }

            $this->addStore('access', $key, $actionUrl);
        }

        return $actionUrl;
    }

    public function setUserCultureKey($uid = null, $lang = null)
    {
        if (empty($lang)) {
            $lang = $this->modx->getOption('cultureKey');
        }
        $uid = (int)$uid;
        $lang = (string)$lang;

        if ($uid AND $lang) {
            if (!$cultureKey = $this->modx->getObject('modUserSetting', array('key' => 'cultureKey', 'user' => $uid))) {
                $cultureKey = $this->modx->newObject('modUserSetting');
            }
            $cultureKey->fromArray(array(
                'key'   => 'cultureKey',
                'user'  => $uid,
                'value' => $lang,
            ), '', true, true);

            return $cultureKey->save();
        }

        return false;
    }

    public function getUserCultureKey($uid = null)
    {
        $uid = (int)$uid;
        if ($uid AND $cultureKey = $this->modx->getObject('modUserSetting', array('key' => 'cultureKey', 'user' => $uid))) {
            return $cultureKey->get('value');
        }

        return false;
    }

    /** @return array Grid Status Fields */
    public function getGridStatusFields()
    {
        $fields = $this->getOption('grid_status_fields', null,
            'id,name,class,description,color', true);
        $fields .= ',id,name,class,rank,editable,active,properties,actions';
        $fields = $this->explodeAndClean($fields);

        return $fields;
    }

    /** @return array Grid Client Fields */
    public function getGridClientFields()
    {
        $fields = $this->getOption('grid_client_fields', null,
            'id,client,status', true);
        $fields .= ',id,status,properties,actions';
        $fields = $this->explodeAndClean($fields);

        return $fields;
    }

    /** @return array Grid Subscription Fields */
    public function getGridSubscriptionFields()
    {
        $fields = $this->getOption('grid_subscription_fields', null,
            'id,client,content,status,startdate,stopdate', true);
        $fields .= ',id,content,status,actions';
        $fields = $this->explodeAndClean($fields);

        return $fields;
    }

    /** @return array Grid Rate Fields */
    public function getGridRateFields()
    {
        $fields = $this->getOption('grid_rate_fields', null,
            'id,content,cost,term_value,term_unit', true);
        $fields .= ',id,content,term,active,description,actions';
        $fields = $this->explodeAndClean($fields);

        return $fields;
    }

    /** @return array Grid Alert Fields */
    public function getGridAlertFields()
    {
        $fields = $this->getOption('grid_alert_fields', null,
            'id,class,status,email', true);
        $fields .= ',id,class,status,rank,active,description,properties,actions';
        $fields = $this->explodeAndClean($fields);

        return $fields;
    }

    /** @return array Grid Content Fields */
    public function getGridContentFields()
    {
        $fields = $this->getOption('grid_content_fields', null,
            'id,name,status', true);
        $fields .= ',id,resource,name,description,status,properties,actions';
        $fields = $this->explodeAndClean($fields);

        return $fields;
    }

    public function getWindowContentTabs()
    {
        $tabs = $this->getOption('window_content_tabs', null,
            'content,rates,subscriptions', true);
        $tabs .= ',content';
        $tabs = $this->explodeAndClean($tabs);

        return $tabs;
    }

    public function getWindowClientTabs()
    {
        $tabs = $this->getOption('window_client_tabs', null,
            'client,subscriptions', true);
        $tabs .= ',client';
        $tabs = $this->explodeAndClean($tabs);

        return $tabs;
    }

    //

    /**
     * @param modManagerController $controller
     * @param array $setting
     */
    public function loadControllerCssJs(modManagerController &$controller, array $setting = array())
    {
        $controller->addLexiconTopic('payandsee:default');

        $config = $this->config;
        if (is_object($controller->resource) AND $controller->resource instanceof modResource) {
            /** @var modResource $resource */
            $resource = $controller->resource;
            $config['resource'] = $resource->toArray();

            $cid = $this->getContentId($resource->get('id'), $height = 10, $cache = false);
            /** @var PasContent $content */
            if ($content = $this->modx->getObject('PasContent', $cid)) {
                $config['content'] = $content->toArray();
            }
        }

        $keyPrefix = $this->getOption('key_prefix', null, 'pas-', true);
        $connectorUrl = $this->getOption('connectorUrl', null);
        $cssUrl = $this->getOption('cssUrl', null);
        $jsUrl = $this->getOption('jsUrl', null);

        $config = json_encode(array_merge($config, array(
            'key_prefix'    => $keyPrefix,
            'connector_url' => $connectorUrl,

            'grid_content_fields' => $this->getGridContentFields(),
            'window_content_tabs' => $this->getWindowContentTabs(),

            'grid_rate_fields' => $this->getGridRateFields(),

            'grid_client_fields' => $this->getGridClientFields(),
            'window_client_tabs' => $this->getWindowClientTabs(),

            'grid_subscription_fields' => $this->getGridSubscriptionFields(),

            'grid_status_fields' => $this->getGridStatusFields(),
            'grid_alert_fields'  => $this->getGridAlertFields(),

        )), true);

        if (!empty($setting['config'])) {
            $controller->addJavascript($jsUrl . 'mgr/payandsee.js');
            $controller->addHtml("<script type='text/javascript'>payandsee.config={$config};</script>");
        }

        if (!empty($setting['css'])) {
            $controller->addCss($cssUrl . 'mgr/main.css');
            $controller->addCss($cssUrl . 'mgr/bootstrap.buttons.css');
        }

        if (!empty($setting['tools'])) {
            $controller->addJavascript($jsUrl . 'mgr/misc/tools.js');
            $controller->addJavascript($jsUrl . 'mgr/misc/combo.js');
        }

        if (!empty($setting['main'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/main/main.panel.js');
        }

        if (!empty($setting['content'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/content/content.window.js');
            $controller->addLastJavascript($jsUrl . 'mgr/content/content.grid.js');
        }

        if (!empty($setting['rate'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/rate/rate.window.js');
            $controller->addLastJavascript($jsUrl . 'mgr/rate/rate.grid.js');
        }

        if (!empty($setting['client'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/client/client.window.js');
            $controller->addLastJavascript($jsUrl . 'mgr/client/client.grid.js');
        }

        if (!empty($setting['subscription'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/subscription/subscription.window.js');
            $controller->addLastJavascript($jsUrl . 'mgr/subscription/subscription.grid.js');
        }

        if (!empty($setting['status'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/status/status.window.js');
            $controller->addLastJavascript($jsUrl . 'mgr/status/status.grid.js');
        }

        if (!empty($setting['alert'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/alert/alert.window.js');
            $controller->addLastJavascript($jsUrl . 'mgr/alert/alert.grid.js');
        }

        if (!empty($setting['inject/resource'])) {
            $controller->addLastJavascript($jsUrl . 'mgr/inject/resource.tab.js');
            $controller->addLastJavascript($jsUrl . 'mgr/inject/resource.panel.js');
        }

    }

    public function loadResourceJsCss(array $scriptProperties = array())
    {
        $pls = $this->placeholders = $this->makePlaceholders($this->config);

        /**************************************************/

        if (!empty($this->config['jGrowlJsCss'])) {
            $css = $this->getOption('jGrowlCss', $scriptProperties);
            $this->regClientCSS($css);
            $js = $this->getOption('jGrowlJs', $scriptProperties);
            $this->regClientScript($js);
        }

        /*if (!empty($this->config['bootstrapModalJsCss'])) {
            $css = $this->getOption('bootstrapModalCss', $scriptProperties);
            $this->regClientCSS($css);
            $js = $this->getOption('bootstrapModalJs', $scriptProperties);
            $this->regClientScript($js);
        }
        if (!empty($this->config['bootstrapPopoverJsCss'])) {
            $css = $this->getOption('bootstrapPopoverCss', $scriptProperties);
            $this->regClientCSS($css);
            $js = $this->getOption('bootstrapPopoverJs', $scriptProperties);
            $this->regClientScript($js);
        }
        if (!empty($this->config['selectizeJsCss'])) {
            $css = $this->getOption('selectizeCss', $scriptProperties);
            $this->regClientCSS($css);
            $js = $this->getOption('selectizeJs', $scriptProperties);
            $this->regClientScript($js);
        }*/

        /**************************************************/

        $css = $this->getOption('frontСss', $scriptProperties, $this->modx->getOption('payandsee_front_css', null),
            true);
        $this->regClientCSS($css, $this->version);

        $js = $this->getOption('frontJs', $scriptProperties, $this->modx->getOption('payandsee_front_js', null), true);
        $this->regClientScript($js, $this->version);

        $action = trim($this->getOption('actionUrl', null, '[[+assetsUrl]]action.php'));
        $assetsUrl = trim($this->getOption('assetsUrl', null, '[[+assetsUrl]]'));

        $config = json_encode(array(
            'actionUrl' => str_replace($pls['pl'], $pls['vl'], $action),
            'assetsUrl' => str_replace($pls['pl'], $pls['vl'], $assetsUrl),
            // 'jsUrl'     => str_replace($pls['pl'], $pls['vl'], $assetsUrl) . 'js/',
            'ctx'       => $this->modx->context->get('key'),
            'version'   => $this->version,

            'close_all_message'     => $this->lexicon('action_close'),
            'price_format'          => json_decode(
                $this->getOption('price_format', null, '[2, ".", " "]'), true
            ),
            'price_format_no_zeros' => (bool)$this->getOption('price_format_no_zeros', null, true),
        ), true);

        $this->regClientStartupScript("<script type=\"text/javascript\">payandseeConfig={$config};</script>", true);
    }

    public function regClientStartupScript($src, $plaintext)
    {
        $src = trim($src);
        if (!empty($src)) {
            $this->modx->regClientStartupScript($src, $plaintext);
        }
    }

    public function regClientScript($src, $version = '')
    {
        $src = trim($src);
        if (!empty($src)) {
            if (!empty($version)) {
                $version = '?v=' . dechex(crc32($version));
            } else {
                $version = '';
            }

            // check is load
            if (empty($version)) {
                $tmp = preg_replace('/\[\[.*?\]\]/', '', $src);
                foreach ($this->modx->loadedjscripts as $script => $v) {
                    if (strpos($script, $tmp) != false) {
                        return;
                    }
                }
            }

            $pls = $this->placeholders;
            if (empty($pls)) {
                $pls = $this->placeholders = $this->makePlaceholders($this->config);
            }

            $src = str_replace($pls['pl'], $pls['vl'], $src);
            $this->modx->regClientScript($src . $version, false);
        }
    }

    public function regClientCSS($src, $version = '')
    {
        $src = trim($src);
        if (!empty($src)) {
            if (!empty($version)) {
                $version = '?v=' . dechex(crc32($version));
            } else {
                $version = '';
            }

            // check is load
            if (empty($version)) {
                $tmp = preg_replace('/\[\[.*?\]\]/', '', $src);
                foreach ($this->modx->loadedjscripts as $script => $v) {
                    if (strpos($script, $tmp) != false) {
                        return;
                    }
                }
            }

            $pls = $this->placeholders;
            if (empty($pls)) {
                $pls = $this->placeholders = $this->makePlaceholders($this->config);
            }

            $src = str_replace($pls['pl'], $pls['vl'], $src);
            $this->modx->regClientCSS($src . $version, null);
        }
    }

    public function processEvent(modSystemEvent $event, array $scriptProperties)
    {
        switch ($event->name) {

            case 'OnDocFormPrerender':
                $id = $this->modx->getOption('id', $scriptProperties, 0, true);
                $mode = $this->modx->getOption('mode', $scriptProperties, modSystemEvent::MODE_NEW, true);
                if (empty($id) OR $mode == modSystemEvent::MODE_NEW) {
                    return;
                }

                /** @var modResource $resource */
                $resource = $this->modx->getOption('resource', $scriptProperties, null, true);
                if (!$this->isWorkingTemplates($resource)) {
                    return;
                }

                $this->loadControllerCssJs($this->modx->controller, array(
                    'config'          => true,
                    'tools'           => true,
                    'css'             => true,
                    'content'         => true,
                    'rate'            => true,
                    'subscription'    => true,
                    'inject/resource' => true,
                ));

                break;
            case 'OnDocFormSave':
                /** @var modResource $resource */
                $resource = $this->modx->getOption('resource', $scriptProperties, null, true);
                if (!$this->isWorkingTemplates($resource)) {
                    return;
                }

                $keyPrefix = $this->getOption('key_prefix', null, 'pas-', true);
                $fields = $resource->toArray();
                foreach ($fields as $key => $value) {
                    if (strpos($key, $keyPrefix) === 0) {
                        unset($resource->_fields[$key]);
                    }
                }

                break;
            case 'pdoToolsOnFenomInit':
                /** @var Fenom $fenom */
                if (!$fenom = $this->modx->getOption('fenom', $scriptProperties)) {
                    return;
                }

                $self = &$this;

                $pas_content_access = function ($content, $default = '', $cid = null, $uid = null) use ($self) {
                    if (is_null($uid)) {
                        $uid = $self->modx->user->id;
                    }

                    $access = $self->getContentAccess($cid, $uid);
                    if ($access) {
                        return $content;
                    }

                    return $default;
                };

                $fenom->addModifier('pas_content_access', $pas_content_access);
                $fenom->addModifier('pascaccess', $pas_content_access);

                $pas_resource_access = function ($content, $default = '', $rid = null, $uid = null) use ($self) {
                    if (is_null($rid)) {
                        $rid = $self->modx->resource->id;
                    }
                    if (is_null($uid)) {
                        $uid = $self->modx->user->id;
                    }

                    $access = $self->getResourceAccess($rid, $uid);
                    if ($access) {
                        return $content;
                    }

                    return $default;
                };

                $fenom->addModifier('pas_resource_access', $pas_resource_access);
                $fenom->addModifier('pasraccess', $pas_resource_access);

                break;
            case 'msOnChangeOrderStatus':

                /** @var msOrder $order */
                /** @var modUser $user */
                if (
                    $status = $this->modx->getOption('status', $scriptProperties) AND
                    $status == $this->getOption('status_order_success', null, 2, true) AND
                    $order = $this->modx->getOption('order', $scriptProperties) AND
                    $order->get('context') == 'pas' AND
                    $user = $order->getOne('User') AND
                    $products = $order->getMany('Products')
                ) {
                    $rows = array();
                    /** @var msOrderProduct[] $products */
                    foreach ($products as $product) {
                        $content = $product->get('content_id');
                        $options = $product->get('options');
                        if (empty($content) OR !is_array($options)) {
                            continue;
                        }
                        $term = $this->modx->getOption("term", $options);
                        if (empty($term)) {
                            continue;
                        }
                        $rows[] = array(
                            "content" => $content,
                            "term"    => $term,
                        );
                    }

                    /** @var PasClient $client */
                    if (empty($rows) OR !$client = $this->modx->getObject("PasClient", $user->get("id"))) {
                        return;
                    }

                    foreach ($rows as &$row) {
                        /** @var PasContent $content */
                        if (!$content = $this->modx->getObject("PasContent", (int)$row["content"])) {
                            continue;
                        }
                        if (!$change = $client->changeSubscription($row["content"], $row["term"])) {
                            continue;
                        }
                        /** @var PasSubscription $subscription */
                        if ($change AND $subscription = $this->modx->getObject('PasSubscription', array(
                                "client"  => $client->get("id"),
                                "content" => $content->get("id"),
                            ))
                        ) {
                            /* set status 2 */
                            $subscription->changeStatus(2);
                        }

                        $row["change"] = $change;
                    }

                    /* set status 2 */
                    if (!$client->getStatus(null, array('allowed' => true))) {
                        $client->changeStatus(2);
                    }
                }
                break;

            default:
                break;
        }

    }


    public function changeSubscription($client = 0, $content = 0, $term = null, $action = "plus")
    {
        /** @var PasClient $client */
        if (!$client = $this->modx->getObject("PasClient", (int)$client)) {
            return $this->lexicon('err_object_nf');
        }
        /** @var PasContent $content */
        if (!$content = $this->modx->getObject("PasContent", (int)$content)) {
            return $this->lexicon('err_object_nf');
        }

        $criteria = array(
            "client"  => $client->get("id"),
            "content" => $content->get("id"),
        );

        $startdate = date("Y-m-d H:i:s", time());
        $stopdate = date("Y-m-d H:i:s", strtotime($startdate) + 1 * 60);

        /** @var PasSubscription $subscription */
        if (!$subscription = $this->modx->getObject('PasSubscription', $criteria)) {
            $subscription = $this->modx->newObject('PasSubscription');
            $subscription->fromArray(array_merge(array(
                "startdate" => $startdate,
                "stopdate"  => $stopdate,
            ), $criteria));
        }

        if ($subscription->get("stopdate") < $startdate) {
            $subscription->fromArray(array_merge(array(
                "startdate" => $startdate,
                "stopdate"  => $stopdate,
            ), $criteria));
        }

        $change = false;
        if ($subscription->save()) {
            $change = $subscription->changeTerm($action, $term);
        }

        return $change;
    }


    public function changeStatus($class = '', $id = 0, $status_id = 0)
    {
        $error = '';
        /** @var xPDOObject|PasContent $instance */
        if (!$instance = $this->modx->getObject($class, (int)$id)) {
            return $this->lexicon('err_object_nf');
        }
        if ($instance->get('status') == $status_id) {
            return true;
        }

        $this->initialize();

        /** @var PasStatus $status */
        if (!$status = $instance->getStatus($status_id)) {
            $error = 'err_status_nf';
        } else {
            /** @var PasStatus $old_status */
            if (!$old_status = $instance->getStatus($instance->get('status'))) {
                $old_status = $this->modx->newObject('PasStatus');
            }
        }


        /* if ($instance->get('status') == $status_id) {
             $error = 'err_status_same';
         }*/

        if (!empty($error)) {
            return $this->lexicon($error);
        }

        $response = $this->invokeEvent('PasOnBeforeChangeStatus', array(
            'instance' => $instance,
            'status'   => $instance->get('status'),
        ));
        if (!$response['success']) {
            return $response['message'];
        }
        $instance->set('status', $status_id);
        if (!$instance->save()) {
            return $this->lexicon('err_status_wrong');
        }

        //$this->orderLog($order->get('id'), 'status', $status_id);
        $response = $this->invokeEvent('PasOnChangeStatus', array(
            'instance' => $instance,
            'status'   => $status_id,
        ));
        if (!$response['success']) {
            return $response['message'];
        }

        /** @var PasAlert[] $alerts */
        if ($alerts = $status->getAlerts()) {
            $pls = array_merge(
                $instance->getPls(),
                $status->toArray('status_')
            );
            $pls['client_email'] = $instance->getClientEmails();
            $pls['manager_email'] = $instance->getManagerEmails();

            /** @var PasClient $client */
            $client = $this->modx->newObject('PasClient');

            foreach ($alerts as $alert) {
                $emails = $this->pdoTools->getChunk('@INLINE ' . $alert->get('email'), $pls);
                if (!is_array($emails)) {
                    $emails = $this->explodeAndClean($emails);
                }
                if (empty($emails)) {
                    continue;
                }

                foreach ($emails as $email) {
                    $lang = $client->getClientLang($email);
                    if (empty($lang)) {
                        $lang = $this->getOption('cultureKey', null, $this->modx->getOption('cultureKey', null, 'en'), true);
                    }

                    // set user lang
                    if (!empty($lang)) {
                        $this->modx->setOption('cultureKey', $lang);
                        $this->modx->lexicon->load($lang . ':payandsee:default');
                    }

                    $subject = $this->pdoTools->getChunk('@INLINE ' . $alert->get('subject'), $pls);
                    $body = $this->pdoTools->getChunk('@INLINE ' . $alert->get('body'), $pls);

                    $this->sendEmail($email, $subject, $body);
                }
            }

            // set default lang
            $lang = $this->getOption('cultureKey', null, $this->modx->getOption('cultureKey', null, 'en'), true);
            $this->modx->setOption('cultureKey', $lang);
            $this->modx->lexicon->load($lang . ':payandsee:default');

        }

        /* TODO */

        return true;
    }


    public function changeTerm($id = 0, $action = null, $term = null)
    {
        $error = '';
        /** @var xPDOObject|PasContent $subscription */
        if (!$subscription = $this->modx->getObject('PasSubscription', (int)$id)) {
            return $this->lexicon('err_object_nf');
        }

        $action = strtolower(trim($action));
        switch ($action) {
            case "minus":
            case "plus":
                break;
            default:
                $action = null;
                break;
        }

        $term = trim($term);
        if (!$term OR !$action) {
            $error = 'err_action_nf';
        }

        $stopdate = $subscription->get('stopdate');
        $stopdate = $this->changeDate($stopdate, $term, $action == 'minus' ? true : false);
        if (!$stopdate) {
            $error = 'err_term_change';
        }

        if (!empty($error)) {
            return $this->lexicon($error);
        }

        $response = $this->invokeEvent('PasOnBeforeChangeTerm', array(
            'subscription' => $subscription,
            'action'       => $action,
            'term'         => $term,
        ));
        if (!$response['success']) {
            return $response['message'];
        }

        $subscription->set('stopdate', $stopdate);
        if (!$subscription->save()) {
            return $this->lexicon('err_term_wrong');
        }

        $response = $this->invokeEvent('PasOnChangeTerm', array(
            'subscription' => $subscription,
            'action'       => $action,
            'term'         => $term,
        ));
        if (!$response['success']) {
            return $response['message'];
        }

        /* TODO */

        return true;
    }


    public function changeDate($date = null, $term = null, $invert = false)
    {
        if (!$date OR !$term) {
            return false;
        }

        $term = strtolower(trim($term));

        $pattern_term_value = $this->getOption('pattern_term_value', null, "/[^0-9]/");
        $pattern_term_unit = $this->getOption('pattern_term_unit', null, "/[^y|m|d|h|i]/");
        $term_value = preg_replace($pattern_term_value, '', $term);
        $term_unit = preg_replace($pattern_term_unit, '', $term);

        switch ($term_unit) {
            case 'y':
                $interval = "P{$term_value}Y";
                break;
            case 'm':
                $interval = "P{$term_value}M";
                break;
            case 'd':
                $interval = "P{$term_value}D";
                break;
            case 'h':
                $interval = "PT{$term_value}H";
                break;
            case 'i':
                $interval = "PT{$term_value}M";
                break;
            default:
                return false;
        }

        if (!is_numeric($date)) {
            $date = strtotime($date);
        }
        $date = new DateTime(date('Y-m-d H:i:s', $date));
        $interval = new DateInterval($interval);
        if ($invert) {
            $interval->invert = 1;
        }
        $date->add($interval);

        return $date->format('Y-m-d H:i:s');
    }


    public function invokeEvent($eventName, array $params = array(), $glue = '<br/>')
    {
        if (isset($this->modx->event->returnedValues)) {
            $this->modx->event->returnedValues = null;
        }
        $response = $this->modx->invokeEvent($eventName, $params);
        if (is_array($response) AND count($response) > 1) {
            foreach ($response as $k => $v) {
                if (empty($v)) {
                    unset($response[$k]);
                }
            }
        }
        $message = is_array($response) ? implode($glue, $response) : trim((string)$response);
        if (isset($this->modx->event->returnedValues) AND is_array($this->modx->event->returnedValues)) {
            $params = array_merge($params, $this->modx->event->returnedValues);
        }

        return array(
            'success' => empty($message),
            'message' => $message,
            'data'    => $params,
        );
    }

    /** @inheritdoc} */
    public function getUserId($email = '', array $data = array())
    {
        $email = mb_strtolower(trim($email), 'UTF-8');
        $pattern = $this->getOption('email_syntax', null, '#.*?@.*#', true);
        if (!preg_match($pattern, $email)) {
            return false;
        }

        /** @var modUser $user */
        $uid = 0;
        if ($user = $this->modx->getObject('modUser', array('username' => $email))) {
            $uid = $user->get('id');
        } else if ($profile = $this->modx->getObject('modUserProfile', array('email' => $email))) {
            $user = $profile->getOne('User');
            $uid = $profile->get('internalKey');
        } else {
            $username = $this->getOption('username', $data, $email, true);
            $password = $this->getOption('password', $data, md5(time()), true);
            $active = (boolean)$this->getOption('client_create_active', $data, 1);

            $data = array_merge($data, array(
                'email'    => $email,
                'username' => $username,
                'active'   => $active,
                'password' => $password,
            ));

            // set extended
            $extended = isset($data['extended']) ? $data['extended'] : array();
            if (is_string($extended)) {
                $extended = json_decode($extended, true);
            }
            if (!is_array($extended)) {
                $extended = array();
            }
            $extended['password'] = $password;
            $data['extended'] = $extended;

            $user = $this->modx->newObject('modUser', $data);
            $profile = $this->modx->newObject('modUserProfile', $data);
            $user->addOne($profile);
            if ($user->save()) {
                $uid = $user->get('id');
            }
        }

        // add cultureKey
        if ($uid) {
            $this->setUserCultureKey($uid);
        }

        return $uid;
    }

    /** {@inheritDoc} */
    public function sendEmail($email, $subject = null, $body = null)
    {
        $email = strtolower(trim($email));
        $pattern = $this->getOption('email_syntax', null, '#.*?@.*#', true);
        if (!preg_match($pattern, $email)) {
            return false;
        }

        /** @var modPHPMailer $mail */
        $mail = $this->modx->getService('mail', 'mail.modPHPMailer');
        $mail->setHTML(true);
        $mail->address('to', trim($email));
        $mail->set(modMail::MAIL_SUBJECT, trim($subject));
        $mail->set(modMail::MAIL_BODY, $body);
        $mail->set(modMail::MAIL_FROM, $this->modx->getOption('emailsender'));
        $mail->set(modMail::MAIL_FROM_NAME, $this->modx->getOption('site_name'));
        if (!$mail->send()) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,
                'An error occurred while trying to send the email: ' . $mail->mailer->ErrorInfo
            );
        }
        $mail->reset();
    }

    public function addExtension($class = null, $key = null, $callback)
    {
        if ($class AND $key) {
            if (!isset($this->_extension[$class])) {
                $this->_extension[$class] = array();
            }
            $this->_extension[$class][$key] = $callback;
        }

        return $this;
    }

    public function getExtension($class = null, $key = null)
    {
        if (isset($this->_extension[$class])) {
            if ($key AND isset($this->_extension[$class][$key])) {
                return $this->_extension[$class][$key];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function removeExtension($class = null, $key = null)
    {
        if ($class AND $key) {
            if (!isset($this->_extension[$class])) {
                $this->_extension[$class] = array();
            }
            unset($this->_extension[$class][$key]);
        }

        return $this;
    }

    public function addStore($class = null, $key = null, $data)
    {
        if ($class AND $key) {
            if (!isset($this->_store[$class])) {
                $this->_store[$class] = array();
            }
            $this->_store[$class][$key] = $data;
        }

        return $this;
    }

    public function getStore($class = null, $key = null)
    {
        if (isset($this->_store[$class])) {
            if ($key AND isset($this->_store[$class][$key])) {
                return $this->_store[$class][$key];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function removeStore($class = null, $key = null)
    {
        if ($class AND $key) {
            if (!isset($this->_store[$class])) {
                $this->_store[$class] = array();
            }
            unset($this->_store[$class][$key]);
        }

        return $this;
    }

    public function parseBindings($bindings = array(), $group = true)
    {
        $sql = '';
        $idx = count($bindings);

        if (!empty($bindings)) {
            reset($bindings);
            $bound = array();
            while (list ($k, $param) = each($bindings)) {
                $idx--;
                if ($param instanceof xPDOQueryCondition) {

                    $sql .= $param->sql;
                    if ($idx) {
                        $sql .= ' ' . $param->conjunction . ' ';
                    }

                    $param = $param->binding;
                }

                if (!is_array($param)) {
                    $v = $param;
                    $type = $this->modx->getPDOType($param);
                    $bindings[$k] = array(
                        'value' => $v,
                        'type'  => $type,
                    );
                } else {
                    $v = isset($param['value']) ? $param['value'] : '';
                    $type = isset($param['type']) ? $param['type'] : '';
                }
                if (!$v) {
                    switch ($type) {
                        case PDO::PARAM_INT:
                            $v = '0';
                            break;
                        case PDO::PARAM_BOOL:
                            $v = '0';
                            break;
                        default:
                            break;
                    }
                }

                if ($type > 0) {
                    $v = $this->modx->quote($v, $type);
                } else {
                    $v = 'NULL';
                }

                if (!is_int($k) || substr($k, 0, 1) === ':') {
                    $pattern = '/' . $k . '\b/';
                    $bound[$pattern] = str_replace(array('\\', '$'), array('\\\\', '\$'), $v);
                } else {
                    $pattern = '/(\?)(\b)?/';
                    $sql = preg_replace($pattern, ':' . $k . '$2', $sql, 1);
                    $bound['/:' . $k . '\b/'] = str_replace(array('\\', '$'), array('\\\\', '\$'), $v);
                }
            }
            if ($this->modx->getDebug() === true) {
                $this->modx->log(xPDO::LOG_LEVEL_DEBUG, "{$sql}\n" . print_r($bound, true));
            }
            if (!empty($bound)) {
                $sql = preg_replace(array_keys($bound), array_values($bound), $sql);
            }
        }

        if ($group) {
            $sql = '(' . $sql . ')';
        }

        return $sql;
    }

    /** {@inheritDoc} */
    public function setCache($data = array(), $options = array())
    {
        return $this->pdoTools->setCache($data, $options);
    }

    /** {@inheritDoc} */
    public function getCache($options = array())
    {
        return $this->pdoTools->getCache($options);
    }

    /** {@inheritDoc} */
    public function clearCache($options = array())
    {
        return $this->pdoTools->clearCache($options);
    }

    /** @inheritdoc} */
    public function makePlaceholders(
        array $array = array(),
        $plPrefix = '',
        $prefix = '[[+',
        $suffix = ']]',
        $uncacheable = true
    )
    {
        return $this->pdoTools->makePlaceholders($array, $plPrefix, $prefix, $suffix, $uncacheable);
    }

    public function formatNumber($value = 0, $ceil = false)
    {
        $value = str_replace(',', '.', $value);
        $value = (float)$value;

        if ($ceil) {
            $ceil = $this->getOption('number_ceil_format', null, 1, true);
            if ($value AND $ceil AND $value > $ceil) {
                $value = ceil($value / $ceil) * $ceil;
            }
        }

        return round($value, 3);
    }

    public function formatPrice($price = '0', $number = false, $ceil = false)
    {
        $price = $this->formatNumber($price, $ceil);
        $pf = $this->modx->fromJSON($this->getOption('number_format', null, '[0, 2]', true));
        if (is_array($pf)) {
            $price = round($price, $pf[0], $pf[1]);
        }

        if (!$number) {
            $pf = json_decode($this->modx->getOption('ms2_price_format', null, '[2, ".", " "]', true), 1);
            if (is_array($pf)) {
                $price = number_format($price, $pf[0], $pf[1], $pf[2]);
            }
            if ($this->getOption('price_format_no_zeros', null, false)) {
                if (preg_match('/\..*$/', $price, $matches)) {
                    $tmp = rtrim($matches[0], '.0');
                    $price = str_replace($matches[0], $tmp, $price);
                }
            }
        }

        return $price;
    }

    public function isExistService($service = '')
    {
        $service = strtolower($service);

        return file_exists(MODX_CORE_PATH . 'components/' . $service . '/model/' . $service . '/' . $service . '.class.php');
    }

    protected function checkStat()
    {
        $key = strtolower(__CLASS__);
        /** @var modDbRegister $registry */
        $registry = $this->modx->getService('registry', 'registry.modRegistry')->getRegister('user', 'registry.modDbRegister');
        $registry->connect();
        $registry->subscribe('/modstore/' . md5($key));
        if ($res = $registry->read(array('poll_limit' => 1, 'remove_read' => false))) {
            return;
        }
        $c = $this->modx->newQuery('transport.modTransportProvider', array('service_url:LIKE' => '%modstore%'));
        $c->select('username,api_key');
        /** @var modRest $rest */
        $rest = $this->modx->getService('modRest', 'rest.modRest', '', array(
            'baseUrl'        => 'https://modstore.pro/extras',
            'suppressSuffix' => true,
            'timeout'        => 1,
            'connectTimeout' => 1,
        ));

        if ($rest) {
            $level = $this->modx->getLogLevel();
            $this->modx->setLogLevel(modX::LOG_LEVEL_FATAL);
            $rest->post('stat', array(
                'package'            => $key,
                'version'            => $this->version,
                'keys'               => ($c->prepare() AND $c->stmt->execute()) ? $c->stmt->fetchAll(PDO::FETCH_ASSOC) : array(),
                'uuid'               => $this->modx->uuid,
                'database'           => $this->modx->config['dbtype'],
                'revolution_version' => $this->modx->version['code_name'] . '-' . $this->modx->version['full_version'],
                'supports'           => $this->modx->version['code_name'] . '-' . $this->modx->version['full_version'],
                'http_host'          => $this->modx->getOption('http_host'),
                'php_version'        => XPDO_PHP_VERSION,
                'language'           => $this->modx->getOption('manager_language'),
            ));
            $this->modx->setLogLevel($level);
        }
        $registry->subscribe('/modstore/');
        $registry->send('/modstore/', array(md5($key) => true), array('ttl' => 3600 * 24));
    }

}

if (!function_exists("array_column")) {

    function array_column($array, $column_name)
    {
        return array_map(function ($element) use ($column_name) {
            return $element[$column_name];
        }, $array);
    }

}

if (!function_exists("mb_substr")) {
    function mb_substr($str, $start, $length = null, $encoding = null)
    {
        preg_match_all('/./us', $str, $match);
        $chars = is_null($length) ? array_slice($match[0], $start) : array_slice($match[0], $start, $length);

        return implode('', $chars);
    }
}