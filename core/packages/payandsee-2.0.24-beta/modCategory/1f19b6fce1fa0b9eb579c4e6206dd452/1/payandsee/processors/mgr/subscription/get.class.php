<?php

/**
 * Get an PasSubscription
 */
class PasSubscriptionGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'PasSubscription';
    public $classKey = 'PasSubscription';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_subscription_view';

    /** {@inheritDoc} */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'PasSubscriptionGetProcessor';