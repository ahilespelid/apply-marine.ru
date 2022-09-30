<?php

/**
 * Get an PasContent
 */
class PasContentGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'PasContent';
    public $classKey = 'PasContent';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_content_view';

    /** {@inheritDoc} */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'PasContentGetProcessor';