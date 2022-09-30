<?php

require_once dirname(dirname(__FILE__)) . '/index.class.php';

class ControllersMainManagerController extends PayAndSeeMainController
{

    public static function getDefaultController()
    {
        return 'main';
    }

}

class PayAndSeeMainManagerController extends PayAndSeeMainController
{

    public function getPageTitle()
    {
        return $this->modx->lexicon('payandsee_main');
    }

    public function getLanguageTopics()
    {
        return array('payandsee:default');
    }

    public function loadCustomCssJs()
    {

        $this->PayAndSee->loadControllerCssJs($this, array(
            'config'       => true,
            'tools'        => true,
            'css'          => true,
            'main'         => true,
            'content'      => true,
            'rate'         => true,
            'client'       => true,
            'subscription' => true,
            'status'       => true,
            'alert'        => true,
        ));

        $script = 'Ext.onReady(function() {
			MODx.add({ xtype: "payandsee-panel-main"});
		});';
        $this->addHtml("<script type='text/javascript'>{$script}</script>");

        $this->modx->invokeEvent('PayAndSeeOnManagerCustomCssJs', array('controller' => &$this, 'page' => 'main'));

    }

    public function getTemplateFile()
    {
        return $this->PayAndSee->config['templatesPath'] . 'main.tpl';
    }

}

// MODX 2.3
class ControllersMgrMainManagerController extends ControllersMainManagerController
{

    public static function getDefaultController()
    {
        return 'main';
    }

}

class PayAndSeeMgrMainManagerController extends PayAndSeeMainManagerController
{

}
