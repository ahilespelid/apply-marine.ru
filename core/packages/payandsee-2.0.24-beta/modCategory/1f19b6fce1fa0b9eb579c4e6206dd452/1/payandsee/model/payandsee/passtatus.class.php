<?php

class PasStatus extends xPDOObject
{

    public function getAlerts($status = null, $filter = null)
    {
        $condition = array(
            'class'  => parent::get('class'),
            'status' => parent::get('id'),
            'active' => true,
        );
        if (!is_null($status)) {
            $condition['status'] = $status;
        }
        if (is_array($filter)) {
            $condition = array_merge($condition, $filter);
        }

        return $this->xpdo->getIterator('PasAlert', $condition);
    }

}