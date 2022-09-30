<?php

//ini_set('display_errors', 1);
//ini_set('error_reporting', -1);

class PasValidator extends xPDOValidationRule
{
    public $validator = null;
    public $field = '';
    public $name = '';
    public $message = '';

    public function __construct(& $validator, $field, $name, $message = '')
    {
        parent:: __construct($validator, $field, $name, $message);
    }

    public function isValid($value, array $options = array())
    {
        $result = parent:: isValid($value, $options);
        if ($result === true) {

            $obj =& $this->validator->object;
            $xpdo =& $obj->xpdo;

            /** @var xPDOObject $obj */
            $obj =& $this->validator->object;
            $method = $obj->_class . $options['column'] . 'isValid';

            if (method_exists($this, $method)) {
                $result = $this->$method($value, $options);
            }
        }

        if ($result === false) {
            $this->validator->addMessage($this->field, $this->name, $this->message);
        }

        return $result;
    }

    public function PasSubscriptionStartDateIsValid($value, array $options = array())
    {
        /** @var xPDOObject $obj */
        $obj =& $this->validator->object;

        $startdate = strtotime($value);
        $stopdate = strtotime($obj->get('stopdate'));
        if ($startdate >= $stopdate) {
            return false;
        }

        return true;
    }

    public function PasSubscriptionStopDateIsValid($value, array $options = array())
    {
        /** @var xPDOObject $obj */
        $obj =& $this->validator->object;

        $startdate = strtotime($obj->get('startdate'));
        $stopdate = strtotime($value);
        if ($startdate >= $stopdate) {
            return false;
        }

        return true;
    }

}