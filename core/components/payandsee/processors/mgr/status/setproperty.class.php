<?php

require_once(dirname(__FILE__) . '/update.class.php');

/**
 * SetProperty a PasStatus
 */
class PasStatusSetPropertyProcessor extends PasStatusUpdateProcessor
{
    public $classKey = 'PasStatus';

    /** {@inheritDoc} */
    public static function getInstance(modX &$modx, $className, $properties = array())
    {
        /** @var modProcessor $processor */
        $processor = new PasStatusSetPropertyProcessor($modx, $properties);

        return $processor;
    }

    /** {@inheritDoc} */
    public function initialize()
    {
        $fieldName = $this->getProperty('field_name', null);
        $fieldValue = $this->getProperty('field_value', null);

        if (!is_null($fieldName) && !is_null($fieldValue)) {
            $this->setProperty($fieldName, $fieldValue);
        }

        return parent::initialize();
    }

}

return 'PasStatusSetPropertyProcessor';