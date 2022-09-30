<?php

class PayAndSeeClassGetListProcessor extends modObjectProcessor
{
    public $objectType = 'PasStatus';
    public $classKey = 'PasStatus';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_setting_view';

    /** {@inheritDoc} */
    public function process()
    {
        $array = array(
            array(
                'id' => 'y',
            ),
            array(
                'id' => 'm',
            ),
            array(
                'id' => 'd',
            ),
            array(
                'id' => 'h',
            ),
            array(
                'id' => 'i',
            ),
        );

        foreach ($array as $k => $v) {
            $array[$k]['name'] = $this->modx->lexicon('payandsee_unit_date_' . $v['id']);
        }

        return $this->outputArray($array);
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive(array(array(
                'id'   => 0,
                'name' => $this->modx->lexicon('payandsee_all'),
            )), $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive(array(array(
                'id'   => 0,
                'name' => $this->modx->lexicon('payandsee_no'),
            )), $array);
        }

        return parent::outputArray($array, $count);
    }

}

return 'PayAndSeeClassGetListProcessor';