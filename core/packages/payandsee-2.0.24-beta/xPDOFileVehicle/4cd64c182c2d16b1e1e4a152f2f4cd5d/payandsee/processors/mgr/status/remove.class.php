<?php

/**
 * Remove a PasStatus
 */
class PasStatusRemoveProcessor extends modObjectRemoveProcessor
{
    public $classKey = 'PasStatus';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_status_edit';

    /** {@inheritDoc} */
    public function initialize()
    {
        $query = array();
        $primary = array('id', 'class');
        foreach ($primary as $field) {
            $query[$field] = trim($this->getProperty($field));
        }
        $this->object = $this->modx->getObject($this->classKey, $query);
        if (empty($this->object)) {
            return $this->modx->lexicon($this->objectType . '_err_nfs', $query);
        }

        if (!$this->modx->hasPermission($this->permission)) {
            return $this->modx->lexicon('access_denied');
        }


        return true;
    }

    /** {@inheritDoc} */
    public function beforeRemove()
    {
        if (!$this->object->get('editable')) {
            $this->failure($this->modx->lexicon('payandsee_err_lock'));
        }

        return parent::beforeRemove();
    }
}

return 'PasStatusRemoveProcessor';