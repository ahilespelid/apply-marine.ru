<?php

/**
 * Create an PasStatus
 */
class PasStatusCreateProcessor extends modObjectCreateProcessor
{
    /** @var $object PasStatus */
    public $object;
    public $objectType = 'PasStatus';
    public $classKey = 'PasStatus';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_status_edit';

    /** {@inheritDoc} */
    public function beforeSet()
    {
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
        $this->object->fromArray(array(
            'id'       => $this->getId(),
            'class'    => $this->getProperty('class'),
            'rank'     => $this->modx->getCount($this->classKey),
            'editable' => true,
        ), '', true, true);

        return parent::beforeSave();
    }

    public function getId()
    {
        $id = 0;
        $q = $this->modx->newQuery($this->classKey, array('class' => $this->getProperty('class')));
        $q->sortby("{$this->classKey}.id", 'DESC');
        $q->select("{$this->classKey}.id + 1");
        $q->limit(1);
        if ($q->prepare() AND $q->stmt->execute()) {
            $id = (int)$q->stmt->fetch(PDO::FETCH_COLUMN);
        }

        return $id;
    }

    public function handleCheckBoxes()
    {
        $required = array('active', 'allowed');
        foreach ($required as $field) {
            $this->setCheckbox($field);
        }
    }

}

return 'PasStatusCreateProcessor';