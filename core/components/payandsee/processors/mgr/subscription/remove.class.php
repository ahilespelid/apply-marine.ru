<?php

/**
 * Remove a PasSubscription
 */
class PasSubscriptionRemoveProcessor extends modObjectRemoveProcessor
{
	public $classKey = 'PasSubscription';
	public $languageTopics = array('payandsee');
	public $permission = 'payandsee_subscription_edit';

	/** {@inheritDoc} */
	public function initialize()
	{
		if (!$this->modx->hasPermission($this->permission)) {
			return $this->modx->lexicon('access_denied');
		}
		return parent::initialize();
	}

	/** {@inheritDoc} */
	public function beforeRemove()
	{
		return parent::beforeRemove();
	}
}

return 'PasSubscriptionRemoveProcessor';