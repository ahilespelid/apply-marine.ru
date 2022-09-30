<?php

/**
 * Create an PasAlert
 */
class PasAlertCreateProcessor extends modObjectCreateProcessor
{
    /** @var $object PasAlert */
    public $object;
    public $objectType = 'PasAlert';
    public $classKey = 'PasAlert';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_alert_edit';

    /** {@inheritDoc} */
    public function beforeSet()
    {
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
        $this->object->fromArray(array(
            'rank' => $this->modx->getCount($this->classKey),
        ), '', true, true);

        return parent::beforeSave();
    }

    public function handleCheckBoxes()
    {
        $required = array('active');
        foreach ($required as $field) {
            $this->setCheckbox($field);
        }
    }

}

return 'PasAlertCreateProcessor';