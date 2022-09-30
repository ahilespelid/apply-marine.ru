<?php

class PasRate extends xPDOSimpleObject
{
    /** @var  PayAndSee $PayAndSee */
    public $PayAndSee;

    public function __construct(xPDO $xpdo)
    {
        parent::__construct($xpdo);

        $this->PayAndSee = $this->xpdo->getService('PayAndSee');
    }

    public function save($cacheFlag = false)
    {
        $isNew = $this->isNew();

        if ($this->isDirty('term_unit')) {
            $term_unit = parent::get('term_unit');
            $this->set('term_unit', strtolower($term_unit));
        }

        if ($this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnRateBeforeSave', array(
                'mode'      => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'rate'      => &$this,
                'cacheFlag' => $cacheFlag,
            ));
        }

        $saved = parent:: save($cacheFlag);

        if ($saved && $this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnRateSave', array(
                'mode'      => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'rate'      => &$this,
                'cacheFlag' => $cacheFlag,
            ));
        }

        return $saved;
    }

    public function getCost($data = array())
    {
        $isNew = $this->isNew();

        if ($this->xpdo instanceof modX) {
            if (empty($data)) {
                $data = parent::toArray();
            }
            $this->xpdo->invokeEvent('PasOnGetRateCost', array(
                'mode' => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'rate' => &$this,
                'data' => $data,
            ));
        }

        $cost = parent::get('cost');

        return $cost;
    }

}