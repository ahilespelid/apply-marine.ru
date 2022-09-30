<?php

/**
 * Get an PasRate
 */
class PasRateGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'PasRate';
    public $classKey = 'PasRate';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_rate_view';

    /** {@inheritDoc} */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'PasRateGetProcessor';