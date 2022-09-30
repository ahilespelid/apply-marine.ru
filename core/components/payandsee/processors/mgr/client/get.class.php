<?php

/**
 * Get an PasClient
 */
class PasClientGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'PasClient';
    public $classKey = 'PasClient';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_client_view';

    /** {@inheritDoc} */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'PasClientGetProcessor';