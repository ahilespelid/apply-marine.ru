<?php

/**
 * Get an PasAlert
 */
class PasAlertGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'PasAlert';
    public $classKey = 'PasAlert';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_alert_view';

    /** {@inheritDoc} */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'PasAlertGetProcessor';