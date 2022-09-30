<?php

/**
 * Update an PasAlert
 */
class PasAlertUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'PasAlert';
    public $classKey = 'PasAlert';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_alert_edit';

    /** {@inheritDoc} */
    public function beforeSet()
    {
        $this->setProperties(array_merge($this->object->toArray(), $this->getProperties()));

        $required = array('class', 'status');
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
        $required = array('active');
        foreach ($required as $field) {
            $this->setCheckbox($field);
        }
    }

}

return 'PasAlertUpdateProcessor';
