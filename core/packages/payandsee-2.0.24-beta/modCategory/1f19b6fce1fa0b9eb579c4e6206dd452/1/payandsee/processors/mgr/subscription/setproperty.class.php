<?php
require_once dirname(__FILE__) . '/update.class.php';

/**
 * SetProperty a PasSubscription
 */
class PasSubscriptionSetPropertyProcessor extends PasSubscriptionUpdateProcessor
{
    public $classKey = 'PasSubscription';

    /** {@inheritDoc} */
    public static function getInstance(modX &$modx, $className, $properties = array())
    {
        /** @var modProcessor $processor */
        $processor = new PasSubscriptionSetPropertyProcessor($modx, $properties);

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

return 'PasSubscriptionSetPropertyProcessor';
