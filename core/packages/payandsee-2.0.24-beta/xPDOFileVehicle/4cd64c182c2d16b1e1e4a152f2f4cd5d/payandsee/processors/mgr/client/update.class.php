<?php

/**
 * Update an PasClient
 */
class PasClientUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'PasClient';
    public $classKey = 'PasClient';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_client_edit';

    /** @var PasClient $object */
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

        $required = array('id');
        foreach ($required as $field) {
            if (!$tmp = (string)trim($this->getProperty($field))) {
                $this->addFieldError($field, $this->modx->lexicon('field_required'));
            } else {
                $this->setProperty($field, $tmp);
            }
        }

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

}

return 'PasClientUpdateProcessor';
