<?php

/**
 * Update an PasStatus
 */
class PasStatusUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'PasStatus';
    public $classKey = 'PasStatus';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_status_edit';

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

        if ($this->checkSavePermission AND $this->object instanceof modAccessibleObject AND !$this->object->checkPolicy('save')) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }

    /** {@inheritDoc} */
    public function beforeSet()
    {
        $this->setProperties(array_merge($this->object->toArray(), $this->getProperties()));

        $required = array('name', 'class');
        foreach ($required as $field) {
            if (!$tmp = (string)trim($this->getProperty($field))) {
                $this->addFieldError($field, $this->modx->lexicon('field_required'));
            } else {
                $this->setProperty($field, $tmp);
            }
        }

        $this->handleCheckBoxes();

        return parent::beforeSet();
    }

    /** {@inheritDoc} */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }

    public function handleCheckBoxes()
    {
        $required = array('active', 'allowed');
        foreach ($required as $field) {
            $this->setCheckbox($field);
        }
    }

}

return 'PasStatusUpdateProcessor';
