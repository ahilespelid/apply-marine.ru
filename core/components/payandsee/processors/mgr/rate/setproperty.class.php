<?php

require_once(dirname(__FILE__) . '/update.class.php');

/**
 * SetProperty a PasRate
 */
class PasRateSetPropertyProcessor extends PasRateUpdateProcessor
{
    public $classKey = 'PasRate';

    /** {@inheritDoc} */
    public static function getInstance(modX &$modx, $className, $properties = array())
    {
        /** @var modProcessor $processor */
        $processor = new PasRateSetPropertyProcessor($modx, $properties);

        return $processor;
    }

    /** {@inheritDoc} */
    public function initialize()
    {
        $fieldName = $this->getProperty('field_name', null);
        $fieldValue = $this->getProperty('field_value', null);

        if (!is_null($fieldName) AND !is_null($fieldValue)) {
            $this->setProperty($fieldName, $fieldValue);
        }

        return parent::initialize();
    }

}

return 'PasRateSetPropertyProcessor';