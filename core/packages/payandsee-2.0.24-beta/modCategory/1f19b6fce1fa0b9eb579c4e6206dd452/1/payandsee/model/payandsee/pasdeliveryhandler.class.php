<?php

//ini_set('display_errors', 1);
//ini_set('error_reporting', -1);

if (!class_exists('msDeliveryInterface')) {
    require_once MODX_CORE_PATH . 'components/minishop2/model/minishop2/msdeliveryhandler.class.php';
}

class PasDeliveryHandler extends msDeliveryHandler implements msDeliveryInterface
{
    /** @var modX $modx */
    public $modx;
    /** @var miniShop2 $ms2 */
    public $ms2;
    /** @var  PayAndSee $PayAndSee */
    public $PayAndSee;

    function __construct(xPDOObject $object, array $config = array())
    {
        parent::__construct($object, $config);

        $this->PayAndSee = $this->modx->getService('PayAndSee');
    }

}