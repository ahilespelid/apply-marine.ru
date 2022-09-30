<?php

/**
 * Remove a PasClient
 */
class PasClientRemoveProcessor extends modObjectRemoveProcessor
{
    public $classKey = 'PasClient';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_client_edit';

    /** {@inheritDoc} */
    public function beforeRemove()
    {
        return parent::beforeRemove();
    }
}

return 'PasClientRemoveProcessor';