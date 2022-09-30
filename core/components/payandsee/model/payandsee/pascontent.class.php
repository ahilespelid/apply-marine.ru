<?php

class PasContent extends xPDOSimpleObject
{
    /** @var  PayAndSee $PayAndSee */
    public $PayAndSee;

    public function __construct(xPDO $xpdo)
    {
        parent::__construct($xpdo);

        $this->PayAndSee = $this->xpdo->getService('PayAndSee');
    }

    public function save($cacheFlag = false)
    {
        $isNew = $this->isNew();

        if ($this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnContentBeforeSave', array(
                'mode'      => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'content'   => &$this,
                'cacheFlag' => $cacheFlag,
            ));
        }

        $saved = parent:: save($cacheFlag);

        if ($saved && $this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnContentSave', array(
                'mode'      => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'content'   => &$this,
                'cacheFlag' => $cacheFlag,
            ));
        }

        return $saved;
    }

    public function getPls()
    {
        $func = $this->PayAndSee->getExtension('content', 'getPls');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($this));
        }

        $pls = parent::toArray();

        return $pls;
    }

    public function getClientEmails()
    {
        $func = $this->PayAndSee->getExtension('content', 'getClientEmails');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this));
        }

        $emails = array();
        $id = parent::get('id');
        $c = $this->xpdo->newQuery('PasContent');
        $c->setClassAlias('Content');
        $c->leftJoin('PasSubscription', 'Subscription', "Subscription.content = {$id}");
        $c->leftJoin('PasClient', 'Client', "Client.id = Subscription.client");
        $c->leftJoin('modUserProfile', 'UserProfile', "Client.id = UserProfile.internalKey");

        $filter = array(
            "Content.id"                 => $id,
            "Client.status:NOT IN"       => array(1, 3),
            "Subscription.status:NOT IN" => array(1, 3),
            "UserProfile.blocked"        => false,
        );
        $c->where($filter);
        $c->groupby('UserProfile.email');
        $c->select('UserProfile.email');
        if ($c->prepare() AND $c->stmt->execute()) {
            if ($tmp = $c->stmt->fetchAll(PDO::FETCH_COLUMN)) {
                $emails = $tmp;
            }
        }

        return $emails;
    }

    public function getManagerEmails()
    {
        $func = $this->PayAndSee->getExtension('content', 'getManagerEmails');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this));
        }

        $emails = $this->PayAndSee->getOption('email_manager', null);
        $emails = $this->PayAndSee->explodeAndClean($emails);

        return $emails;
    }

    public function getStatus($status = null, $filter = null)
    {
        $condition = array(
            'class'  => __CLASS__,
            'id'     => parent::get('status'),
            'active' => true,
        );
        if (!is_null($status)) {
            $condition['id'] = $status;
        }
        if (is_array($filter)) {
            $condition = array_merge($condition, $filter);
        }

        return $this->xpdo->getObject('PasStatus', $condition);
    }

    public function changeStatus($status = 0)
    {
        $func = $this->PayAndSee->getExtension('content', 'changeStatus');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this->get('id'), $status));
        }

        return $this->PayAndSee->changeStatus(__CLASS__, $this->get('id'), $status);
    }

    public function getRate($data = array())
    {
        $func = $this->PayAndSee->getExtension('content', 'getRate');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($data));
        }

        $rate = isset($data['rate']) ? (int)$data['rate'] : 0;
        $c = $this->xpdo->newQuery('PasRate');

        $filter = array(
            'content' => parent::get('id'),
            'active'  => true,
        );
        $c->query['where'][] = new xPDOQueryCondition(array(
            'sql'         => $this->PayAndSee->parseBindings($c->parseConditions($filter, xPDOQuery::SQL_AND), true),
            'conjunction' => "OR",
        ));
        if (!empty($rate)) {
            $filter = array_merge($filter, array(
                'id' => $rate,
            ));
            $c->query['where'][] = new xPDOQueryCondition(array(
                'sql'         => $this->PayAndSee->parseBindings($c->parseConditions($filter, xPDOQuery::SQL_AND), true),
                'conjunction' => "OR",
            ));
            $c->sortby("FIELD (PasRate.id, {$rate})", "DESC");
        }

        /* $s = $c->prepare();
         $sql = $c->toSQL();
         $s->execute();
         $this->xpdo->log(1, print_r($sql, 1));
         $this->xpdo->log(1, print_r($s->errorInfo(), 1));*/

        $rate = $this->xpdo->getObject('PasRate', $c);
        if ($this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnGetContentRate', array(
                'content' => &$this,
                'rate'    => &$rate,
                'data'    => $data,
            ));
        }

        return $rate;
    }

    public static function getRates(xPDO & $xpdo, $filter = null, $sort = null)
    {
        if ($PayAndSee = $xpdo->getService('PayAndSee')) {
            $func = $PayAndSee->getExtension('content', 'getRates');
            if ($func AND is_callable($func)) {
                return call_user_func_array($func, array($xpdo, $filter, $sort));
            }
        }

        if (!array($filter)) {
            $filter = array();
        }
        $id = isset($filter["content"]) ? $filter["content"] : "0";
        $filter = array_merge($filter, array(
            "content" => $id,
            "active"  => true,
        ));

        $c = $xpdo->newQuery('PasRate');
        $c->where($filter);
        if (is_array($sort)) {
            foreach ($sort as $column => $direction) {
                $c->query['sortby'][] = array(
                    'column'    => $column,
                    'direction' => $direction,
                );
            }
        }

        $data = array();
        /** @var PasContent $content */
        $content = $xpdo->getObject('PasContent', (int)$id);
        if (!$rates = $xpdo->getCollection('PasRate', $c)) {
            $rates = array(null);
        }

        /** @var PasRate[] $rates */
        foreach ($rates as $rate) {
            if ($xpdo instanceof modX) {
                $xpdo->invokeEvent('PasOnGetContentRate', array(
                    'content' => &$content,
                    'rate'    => &$rate,
                    'data'    => null,
                ));
            }
            if ($rate AND $rate instanceof xPDOObject) {
                $tmp = $rate->toArray();
                $tmp['cost'] = $rate->getCost();
                $data[] = $tmp;
            }
        }

        return $data;
    }

}