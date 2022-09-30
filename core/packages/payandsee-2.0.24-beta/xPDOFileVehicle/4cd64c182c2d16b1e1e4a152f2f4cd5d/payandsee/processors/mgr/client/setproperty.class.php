<?php

require_once(dirname(__FILE__) . '/update.class.php');

/**
 * SetProperty a PasClient
 */
class PasClientSetPropertyProcessor extends PasClientUpdateProcessor
{
    public $classKey = 'PasClient';

    /** {@inheritDoc} */
    public static function getInstance(modX &$modx, $className, $properties = array())
    {
        /** @var modProcessor $processor */
        $processor = new PasClientSetPropertyProcessor($modx, $properties);

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

return 'PasClientSetPropertyProcessor';