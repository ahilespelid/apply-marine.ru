<?php

/**
 * Create an PasClient
 */
class PasClientCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'PasClient';
    public $classKey = 'PasClient';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_client_edit';

    /** @var PasClient $object */
    public $object;
    /** @var xPDOObject $object */
    public $state;

    /** {@inheritDoc} */
    public function beforeSet()
    {
        $required = array('email');
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
        $id = $this->getProperty('id');
        if (empty($id)) {
            $id = $this->object->getUserId($this->getProperty('email'));
        }
        if (empty($id)) {
            $this->addFieldError('id', $this->modx->lexicon('field_required'));
        }
        if ($this->doesAlreadyExist(array('id' => $id))) {
            $this->addFieldError('id', $this->modx->lexicon('payandsee_err_object_exists'));
        }

        $this->object->set('id', $id);

        return parent::beforeSave();
    }

    /** {@inheritDoc} */
    public function afterSave()
    {
        $change_status = $this->object->changeStatus($this->object->get('status'));
        if ($change_status !== true) {
            return $change_status;
        }

        return true;
    }

    public function isDirty($key)
    {
        return isset($this->state) ? $this->state->get($key) != $this->object->get($key) : false;
    }

}

return 'PasClientCreateProcessor';