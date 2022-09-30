<?php

/**
 * Create an PasSubscription
 */
class PasSubscriptionCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'PasSubscription';
    public $classKey = 'PasSubscription';
    public $languageTopics = ['payandsee'];
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
        $required = ['client', 'content', 'startdate', 'stopdate'];
        foreach ($required as $field) {
            if (!$tmp = (string)trim($this->getProperty($field))) {
                $this->addFieldError($field, $this->modx->lexicon('field_required'));
            } else {
                $this->setProperty($field, $tmp);
            }
        }

        if ($this->doesAlreadyExist(['client' => $this->getProperty('client'), 'content' => $this->getProperty('content')])) {
            $this->addFieldError('client', $this->modx->lexicon('payandsee_err_object_exists'));
            $this->addFieldError('content');
        }

        return parent::beforeSet();
    }

    public function beforeSave()
    {
        $this->object->set('status', 0);
        return !$this->hasErrors();
    }

    /** {@inheritDoc} */
    public function afterSave()
    {
        if ($this->isDirty('term_action')) {
            $change_term = $this->object->changeTerm($this->object->get('term_action'), $this->object->get('term_value') . $this->object->get('term_unit'));
            if ($change_term !== true) {
                return $change_term;
            }
        }

        $change_status = $this->object->changeStatus($this->getProperty('status'));
        if ($change_status !== true) {
            return $change_status;
        }

        return parent::beforeSave();
    }

    public function isDirty($key)
    {
        return isset($this->state) ? $this->state->get($key) != $this->object->get($key) : false;
    }

}

return 'PasSubscriptionCreateProcessor';