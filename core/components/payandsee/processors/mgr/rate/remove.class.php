<?php

/**
 * Remove a PasRate
 */
class PasRateRemoveProcessor extends modObjectRemoveProcessor
{
    public $classKey = 'PasRate';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_rate_edit';

    /** {@inheritDoc} */
    public function beforeRemove()
    {
        return parent::beforeRemove();
    }
}

return 'PasRateRemoveProcessor';