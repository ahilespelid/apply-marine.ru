<?php


/**
 * Get a list of PasSubscription
 */
class PasSubscriptionGetListProcessor extends modObjectGetListProcessor
{

    public $objectType = 'PasSubscription';
    public $classKey = 'PasSubscription';
    public $primaryKeyField = 'id';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'DESC';
    public $languageTopics = ['default', 'payandsee'];
    public $permission = 'payandsee_subscription_view';


    /** {@inheritDoc} */
    public function beforeQuery()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }


    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c->leftJoin('PasContent', 'Content');
        $c->leftJoin('modUser', 'User');
        $c->leftJoin('modUserProfile', 'UserProfile');
        $c->leftJoin('modResource', 'Resource', 'Content.resource = Resource.id');
        $c->leftJoin('PasStatus', 'Status', 'Status.id = PasSubscription.status AND Status.class = "PasSubscription"');


        $c->select($this->modx->getSelectColumns('PasSubscription', 'PasSubscription'));
        $c->select($this->modx->getSelectColumns('PasContent', 'Content', 'content_', ['resource', 'name'], false));
        $c->select($this->modx->getSelectColumns('modUser', 'User', 'profile_', ['username'], false));
        //$c->select($this->modx->getSelectColumns('modUserProfile', 'UserProfile', 'profile_', array('email'), false));
        $c->select($this->modx->getSelectColumns('modUserProfile', 'UserProfile', 'profile_', ['id', 'internalKey'], true));
        $c->select($this->modx->getSelectColumns('modResource', 'Resource', 'resource_', ['pagetitle'], false));
        $c->select($this->modx->getSelectColumns('PasStatus', 'Status', 'status_', [], true));


        $client = $this->getProperty('client');
        if ($client) {
            $c->where(['client' => $client]);
        }

        $content = $this->getProperty('content');
        if ($content) {
            $c->where(['content' => $content]);
        }

        $status = $this->getProperty('status');
        if ($status) {
            $c->where(['status' => $status]);
        }

        $query = $this->getProperty('query', '');
        if (!empty($query)) {
            $c->where([
                'Content.name:LIKE'            => "%{$query}%",
                'OR:User.username:LIKE'        => "%{$query}%",
                'OR:UserProfile.fullname:LIKE' => "%{$query}%",
                'OR:UserProfile.email:LIKE'    => "%{$query}%",
            ]);
        }

        return $c;
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

        $clear = ['description', 'resource_pagetitle'];
        foreach ($clear as $k) {
            if (isset($array[$k])) {
                $array[$k] = strip_tags($array[$k]);
            }
        }

        if ($this->getProperty('combo')) {
            $array = [
                'id'          => $array['id'],
                'name'        => $array['name'],
                'description' => $array['description'],
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
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive([[
                'id'   => '-',
                'name' => $this->modx->lexicon('payandsee_all'),
            ]], $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive([[
                'id'   => '-',
                'name' => $this->modx->lexicon('payandsee_no'),
            ]], $array);
        }

        return parent::outputArray($array, $count);
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


return 'PasSubscriptionGetListProcessor';