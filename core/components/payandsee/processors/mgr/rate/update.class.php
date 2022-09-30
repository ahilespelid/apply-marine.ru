<?php

/**
 * Update an PasRate
 */
class PasRateUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'PasRate';
    public $classKey = 'PasRate';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_rate_edit';

    /** {@inheritDoc} */
    public function beforeSet()
    {
        $this->setProperties(array_merge($this->object->toArray(), $this->getProperties()));

        $required = array('content', 'term_value', 'term_unit');
        foreach ($required as $field) {
            if (!$tmp = (string)trim($this->getProperty($field))) {
                $this->addFieldError($field, $this->modx->lexicon('field_required'));
            } else {
                $this->setProperty($field, $tmp);
            }
        }

        if ($this->doesAlreadyExist(array('id:!=' => $this->getProperty('id'), 'content' => $this->getProperty('content'), 'term_value' => $this->getProperty('term_value'), 'term_unit' => $this->getProperty('term_unit')))) {
            $this->addFieldError('term_value', $this->modx->lexicon('payandsee_err_object_exists'));
            $this->addFieldError('term_unit');
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

        /* $this->object->fromArray(array(
             'term' => $this->getProperty('term_value') . $this->getProperty('term_unit'),
         ));*/

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

return 'PasRateUpdateProcessor';
