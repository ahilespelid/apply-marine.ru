<?php


/**
 * Get a list of PasClient
 */
class PasClientGetListProcessor extends modObjectGetListProcessor
{

    public $objectType = 'PasClient';
    public $classKey = 'PasClient';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'DESC';
    public $languageTopics = ['default', 'payandsee'];
    public $permission = 'payandsee_client_view';


    /** {@inheritDoc} */
    public function beforeQuery()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }


    /**
     * @param xPDOQuery $c
     *
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {

        $c->leftJoin('modUser', 'User');
        $c->leftJoin('modUserProfile', 'UserProfile');
        $c->leftJoin('PasStatus', 'Status', 'Status.id = PasClient.status AND Status.class = "PasClient"');

        $c->select($this->modx->getSelectColumns('PasClient', 'PasClient'));
        $c->select($this->modx->getSelectColumns('modUser', 'User', '', ['username'], false));
        $c->select($this->modx->getSelectColumns('modUserProfile', 'UserProfile', 'profile_', ['id', 'internalKey'], true));
        $c->select($this->modx->getSelectColumns('PasStatus', 'Status', 'status_', [], true));

        $status = $this->getProperty('status');
        if ($status) {
            $c->where(['status' => $status]);
        }

        $query = $this->getProperty('query', '');
        if (!empty($query)) {
            $c->where([
                'User.username:LIKE'           => "%{$query}%",
                'OR:UserProfile.fullname:LIKE' => "%{$query}%",
                'OR:UserProfile.email:LIKE'    => "%{$query}%",
            ]);
        }

        return $c;
    }


    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive([[
                'id'       => 0,
                'username' => $this->modx->lexicon('payandsee_all'),
            ]], $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive([[
                'id'       => 0,
                'username' => $this->modx->lexicon('payandsee_no'),
            ]], $array);
        }

        return parent::outputArray($array, $count);
    }


    /** {@inheritDoc} */
    public function getData()
    {
        $data = [];
        $limit = intval($this->getProperty('limit'));
        $start = intval($this->getProperty('start'));

        $c = $this->modx->newQuery($this->classKey);
        $c = $this->prepareQueryBeforeCount($c);
        $data['total'] = $this->modx->getCount($this->classKey, $c);
        $c = $this->prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));

        $sortClassKey = $this->getSortClassKey();
        $sortKey = $this->modx->getSelectColumns($sortClassKey, $this->getProperty('sortAlias', $sortClassKey), '',
            [$this->getProperty('sort')]);
        if (empty($sortKey)) {
            $sortKey = $this->getProperty('sort');
        }
        $c->sortby($sortKey, $this->getProperty('dir'));
        if ($limit > 0) {
            $c->limit($limit, $start);
        }

        if ($c->prepare() AND $c->stmt->execute()) {
            $data['results'] = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $data;
    }


    /** {@inheritDoc} */
    public function prepareArray(array $array)
    {
        $icon = 'icon';

        $clear = ['description', 'profile_email'];
        foreach ($clear as $k) {
            if (isset($array[$k])) {
                $array[$k] = strip_tags($array[$k]);
            }
        }

        if ($this->getProperty('combo')) {
            $array = [
                'id'       => $array['id'],
                'username' => @$array['username'],
                'email'    => @$array['profile_email'],
            ];
        } else {

            $array['actions'] = [];

            // Edit
            $array['actions'][] = [
                'cls'    => '',
                'icon'   => "$icon $icon-edit green",
                'title'  => $this->modx->lexicon('payandsee_action_update'),
                'action' => 'update',
                'button' => true,
                'menu'   => true,
            ];

            // sep
            $array['actions'][] = [
                'cls'    => '',
                'icon'   => '',
                'title'  => '',
                'action' => 'sep',
                'button' => false,
                'menu'   => true,
            ];

            switch ($array['status']) {
                case 1:
                case 3:
                    $array['actions'][] = [
                        'cls'    => '',
                        'icon'   => "$icon $icon-toggle-off red",
                        'title'  => $this->modx->lexicon('payandsee_action_active'),
                        'action' => 'active',
                        'button' => true,
                        'menu'   => true,
                    ];
                    break;
                default:
                    $array['actions'][] = [
                        'cls'    => '',
                        'icon'   => "$icon $icon-toggle-on green",
                        'title'  => $this->modx->lexicon('payandsee_action_inactive'),
                        'action' => 'inactive',
                        'button' => true,
                        'menu'   => true,
                    ];
                    break;
            }

            // sep
            $array['actions'][] = [
                'cls'    => '',
                'icon'   => '',
                'title'  => '',
                'action' => 'sep',
                'button' => false,
                'menu'   => true,
            ];
            // Remove
            $array['actions'][] = [
                'cls'    => '',
                'icon'   => "$icon $icon-trash-o red",
                'title'  => $this->modx->lexicon('payandsee_action_remove'),
                'action' => 'remove',
                'button' => true,
                'menu'   => true,
            ];
        }

        return $array;
    }


    /** {@inheritDoc} */
    public function iterate(array $data)
    {
        $list = [];
        $list = $this->beforeIteration($list);
        $this->currentIndex = 0;
        /** @var xPDOObject|modAccessibleObject $object */
        foreach ($data['results'] as $array) {
            $list[] = $this->prepareArray($array);
            $this->currentIndex++;
        }
        $list = $this->afterIteration($list);

        return $list;
    }

}


return 'PasClientGetListProcessor';