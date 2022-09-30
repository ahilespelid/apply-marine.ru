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
            'PasSubscription' => array(
                array(
                    'id' => 'minus',
                ),
                array(
                    'id' => 'plus',
                ),
            ),
        );

        $class = $this->getProperty('class', '0');
        $array = $this->modx->getOption($class, $array, array(), true);

        foreach ($array as $k => $v) {
            $array[$k]['name'] = $this->modx->lexicon('payandsee_action_' . $v['id']);
        }

        return $this->outputArray($array);
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive(array(array(
                'id'   => '-',
                'name' => $this->modx->lexicon('payandsee_all'),
            )), $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive(array(array(
                'id'   => '-',
                'name' => $this->modx->lexicon('payandsee_no'),
            )), $array);
        }

        return parent::outputArray($array, $count);
    }

}

return 'PayAndSeeClassGetListProcessor';