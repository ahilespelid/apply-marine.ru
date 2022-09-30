<?php

/**
 * Remove a PasContent
 */
class PasContentRemoveProcessor extends modObjectRemoveProcessor
{
	public $classKey = 'PasContent';
	public $languageTopics = array('payandsee');
	public $permission = 'payandsee_content_edit';

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

return 'PasContentRemoveProcessor';