<?php

/**
 * Remove a PasAlert
 */
class PasAlertRemoveProcessor extends modObjectRemoveProcessor
{
    public $classKey = 'PasAlert';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_alert_edit';

    /** {@inheritDoc} */
    public function beforeRemove()
    {
        return parent::beforeRemove();
    }
}

return 'PasAlertRemoveProcessor';