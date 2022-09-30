<?php

/**
 * Get an PasStatus
 */
class PasStatusGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'PasStatus';
    public $classKey = 'PasStatus';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_status_view';

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

        if ($this->checkViewPermission && $this->object instanceof modAccessibleObject && !$this->object->checkPolicy('view')) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }

    /** {@inheritDoc} */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'PasStatusGetProcessor';