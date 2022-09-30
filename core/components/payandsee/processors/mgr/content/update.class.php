<?php

/**
 * Update an PasContent
 */
class PasContentUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'PasContent';
    public $classKey = 'PasContent';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_content_edit';

    /** @var PasContent $object */
    public $object;
    /** @var xPDOObject $object */
    public $state;

    public function process()
    {
        $this->state = clone $this->object;

        return parent::process();
    }

    /** {@inheritDoc} */
    public function beforeSet()
    {
        $this->setProperties(array_merge($this->object->toArray(), $this->getProperties()));

        $required = array('resource', 'name');
        foreach ($required as $field) {
            if (!$tmp = (string)trim($this->getProperty($field))) {
                $this->addFieldError($field, $this->modx->lexicon('field_required'));
            } else {
                $this->setProperty($field, $tmp);
            }
        }

        if ($this->doesAlreadyExist(array('id:!=' => $this->getProperty('id'), 'resource' => $this->getProperty('resource')))) {
            $this->addFieldError('resource', $this->modx->lexicon('payandsee_err_object_exists'));
        }

        $this->handleCheckBoxes();

        return parent::beforeSet();
    }

    /** {@inheritDoc} */
    public function beforeSave()
    {
        if ($this->isDirty('status')) {
            $change_status = $this->object->changeStatus($this->object->get('status'));
            if ($change_status !== true) {
                return $change_status;
            }
        }

        return parent::beforeSave();
    }

    public function isDirty($key)
    {
        return isset($this->state) ? $this->state->get($key) != $this->object->get($key) : false;
    }

    public function handleCheckBoxes()
    {
        $required = array('nested');
        foreach ($required as $field) {
            $this->setCheckbox($field);
        }
    }

}

return 'PasContentUpdateProcessor';
