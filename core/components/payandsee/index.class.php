<?php

/**
 * Class PayAndSeeMainController
 */
abstract class PayAndSeeMainController extends modExtraManagerController
{
    /** @var PayAndSee $PayAndSee */
    public $PayAndSee;


    /**
     * @return void
     */
    public function initialize()
    {
        $corePath = $this->modx->getOption('payandsee_core_path', null,
            $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/payandsee/');
        require_once $corePath . 'model/payandsee/payandsee.class.php';

        /** @var PayAndSee $PayAndSee */
        $this->PayAndSee = new PayAndSee($this->modx);

        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('payandsee:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends PayAndSeeMainController
{

    /**
     * @return string
     */
    public static function getDefaultController()
    {
        return 'main';
    }
}