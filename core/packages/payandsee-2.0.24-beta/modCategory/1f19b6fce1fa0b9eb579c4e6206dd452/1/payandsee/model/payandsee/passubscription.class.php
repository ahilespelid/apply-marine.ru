<?php

class PasSubscription extends xPDOSimpleObject
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
            $this->xpdo->invokeEvent('PasOnSubscriptionBeforeSave', array(
                'mode'         => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'subscription' => &$this,
                'cacheFlag'    => $cacheFlag,
            ));
        }

        $saved = parent:: save($cacheFlag);

        if ($saved && $this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnSubscriptionSave', array(
                'mode'         => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'subscription' => &$this,
                'cacheFlag'    => $cacheFlag,
            ));
        }

        return $saved;
    }

    public function remove(array $ancestors = array())
    {
        if ($this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnSubscriptionBeforeRemove', array(
                'subscription' => &$this,
                'ancestors'    => $ancestors,
            ));
        }

        $remove = parent::remove($ancestors);

        if ($this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnSubscriptionRemove', array(
                'subscription' => &$this,
                'ancestors'    => $ancestors,
            ));
        }

        return $remove;
    }

    public function getPls()
    {
        $func = $this->PayAndSee->getExtension('subscription', 'getPls');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($this));
        }

        $pls = parent::toArray();
        if ($user = $this->getOne('User')) {
            $pls = array_merge($pls, $user->toArray('user_'));
        }
        if ($profile = $this->getOne('UserProfile')) {
            $pls = array_merge($pls, $profile->toArray('profile_'));
        }

        return $pls;
    }

    public function getClientEmails()
    {
        $func = $this->PayAndSee->getExtension('subscription', 'getClientEmails');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this));
        }

        $emails = array();
        $id = parent::get('id');
        $c = $this->xpdo->newQuery('PasSubscription');
        $c->setClassAlias('Subscription');
        $c->leftJoin('PasClient', 'Client', "Client.id = Subscription.client");
        $c->leftJoin('modUserProfile', 'UserProfile', "Client.id = UserProfile.internalKey");

        $filter = array(
            "Subscription.id" => $id,
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
        $func = $this->PayAndSee->getExtension('subscription', 'getManagerEmails');
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

        $func = $this->PayAndSee->getExtension('subscription', 'changeStatus');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this->get('id'), $status));
        }

        return $this->PayAndSee->changeStatus(__CLASS__, $this->get('id'), $status);
    }

    public function changeTerm($action = null, $term = null)
    {
        $func = $this->PayAndSee->getExtension('subscription', 'changeTerm');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($this->get('id'), $action, $term));
        }

        return $this->PayAndSee->changeTerm($this->get('id'), $action, $term);
    }

}