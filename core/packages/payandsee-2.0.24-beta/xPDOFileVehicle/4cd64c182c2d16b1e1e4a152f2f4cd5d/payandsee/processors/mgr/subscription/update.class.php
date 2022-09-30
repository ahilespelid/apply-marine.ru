<?php

/**
 * Update an PasSubscription
 */
class PasSubscriptionUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'PasSubscription';
    public $classKey = 'PasSubscription';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_subscription_edit';

    /** @var PasSubscription $object */
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

        $required = array('client', 'content', 'startdate', 'stopdate');
        foreach ($required as $field) {
            if (!$tmp = (string)trim($this->getProperty($field))) {
                $this->addFieldError($field, $this->modx->lexicon('field_required'));
            } else {
                $this->setProperty($field, $tmp);
            }
        }

        if ($this->doesAlreadyExist(array('id:!=' => $this->getProperty('id'), 'client' => $this->getProperty('client'), 'content' => $this->getProperty('content')))) {
            $this->addFieldError('client', $this->modx->lexicon('payandsee_err_object_exists'));
            $this->addFieldError('content');
        }

        return parent::beforeSet();
    }


    /** {@inheritDoc} */
    public function beforeSave()
    {
        if ($this->isDirty('term_action')) {
            $change_term = $this->object->changeTerm($this->object->get('term_action'), $this->object->get('term_value') . $this->object->get('term_unit'));
            if ($change_term !== true) {
                return $change_term;
            }
        }

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

return 'PasSubscriptionUpdateProcessor';
