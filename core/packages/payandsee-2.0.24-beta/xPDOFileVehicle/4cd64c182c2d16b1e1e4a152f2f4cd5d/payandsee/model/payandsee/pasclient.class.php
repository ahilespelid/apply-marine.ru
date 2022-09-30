<?php


class PasClient extends xPDOObject
{
    /** @var  PayAndSee $PayAndSee */
    public $PayAndSee;

    public function __construct(xPDO $xpdo)
    {
        parent::__construct($xpdo);
        $this->PayAndSee = $this->xpdo->getService('PayAndSee');
    }

    public static function load(xPDO & $xpdo, $className, $criteria, $cacheFlag = true)
    {
        /* @var $instance PasClient */
        $instance = parent::load($xpdo, 'PasClient', $criteria, $cacheFlag);
        if (!is_object($instance) OR !($instance instanceof $className)) {
            if (is_numeric($criteria) OR (is_array($criteria) AND !empty($criteria['id']))) {
                $id = is_numeric($criteria) ? $criteria : $criteria['id'];
                /** @var modUser $user */
                if ($user = $xpdo->getObject('modUser', (int)$id)) {
                    $instance = $xpdo->newObject('PasClient');
                    $instance->set('id', $id);

                    if ($instance->save()) {
                        $groups = $xpdo->getOption('payandsee_client_groups', null);
                        $groups = array_map('trim', explode(',', $groups));
                        foreach ($groups as $group) {
                            $user->joinGroup($group);
                        }

                        $status = $instance->get('status');
                        if (empty($status) OR $instance->isDirty('status')) {
                            // Set status "new"
                            $instance->changeStatus($status ? $status : 1);
                        }
                    }
                }
            }
        }

        return $instance;
    }

    public function save($cacheFlag = null)
    {
        $isNew = $this->isNew();

        if ($this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnClientBeforeSave', array(
                'mode'      => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'client'    => &$this,
                'cacheFlag' => $cacheFlag,
            ));
        }

        $saved = parent:: save($cacheFlag);

        if ($saved AND $this->xpdo instanceof modX) {
            $this->xpdo->invokeEvent('PasOnClientSave', array(
                'mode'      => $isNew ? modSystemEvent::MODE_NEW : modSystemEvent::MODE_UPD,
                'client'    => &$this,
                'cacheFlag' => $cacheFlag,
            ));
        }

        return $saved;
    }

    public function getPls()
    {
        $func = $this->PayAndSee->getExtension('client', 'getPls');
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

    public function getUserId($email = '', $data = array())
    {
        if (empty($email) AND $user = $this->getOne('User')) {
            return $user->get('id');
        } else if (!empty($email)) {
            return $this->PayAndSee->getUserId($email, $data);
        }

        return false;
    }

    public function getClientEmails()
    {
        $func = $this->PayAndSee->getExtension('client', 'getClientEmails');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this));
        }

        $emails = array();
        if ($profile = $this->getOne('UserProfile')) {
            if ($emails = $profile->get('email')) {
                $emails = array($emails);
            }
        }

        return $emails;
    }

    public function getManagerEmails()
    {
        $func = $this->PayAndSee->getExtension('client', 'getManagerEmails');
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

    public function getClientLang($email = null)
    {
        if (!($this->xpdo instanceof modX)) return false;

        $func = $this->PayAndSee->getExtension('client', 'getClientLang');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this));
        }

        /** @var modUser $user */
        if (!empty($email)) {
            $c = $this->xpdo->newQuery('modUser');
            $c->innerJoin('modUserProfile', 'modUserProfile', 'modUser.id = modUserProfile.internalKey');
            $c->where(array('modUserProfile.email' => $email));
            $user = $this->xpdo->getObject('modUser', $c);
        } else {
            $user = $this->getOne('User');
        }

        if ($user) {
            $lang = $this->PayAndSee->getUserCultureKey($user->get('id'));
        }

        return !empty($lang) ? $lang : false;
    }

    public function changeStatus($status = 0)
    {
        $func = $this->PayAndSee->getExtension('client', 'changeStatus');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array(__CLASS__, $this->get('id'), $status));
        }

        return $this->PayAndSee->changeStatus(__CLASS__, $this->get('id'), $status);
    }

    public function changeSubscription($content = 0, $term = null, $action = "plus")
    {
        $func = $this->PayAndSee->getExtension('client', 'changeSubscription');
        if ($func AND is_callable($func)) {
            return call_user_func_array($func, array($this->get('id'), $content, $term, $action));
        }

        return $this->PayAndSee->changeSubscription($this->get('id'), $content, $term, $action);
    }

}