<?php

class modUserGetListProcessor extends modObjectGetListProcessor
{
    public $objectType = 'modUser';
    public $classKey = 'modUser';
    public $languageTopics = array('user');
    public $defaultSortField = 'id';
    public $permission = 'payandsee_setting_view';

    /** {@inheritDoc} */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c->leftJoin('modUserProfile', 'Profile');
        $c->select($this->modx->getSelectColumns('modUser', 'modUser', '', array('id', 'username'), false));
        $c->select($this->modx->getSelectColumns('modUserProfile', 'Profile', '', array('email'), false));

        $id = $this->getProperty('id');
        if (!empty($id) AND $this->getProperty('combo')) {
            $c->sortby("FIELD (modUser.id, {$id})", "DESC");
        }

        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                'modUser.username:LIKE'       => "%{$query}%",
                'OR:Profile.fullname:LIKE' => "%{$query}%",
                'OR:Profile.email:LIKE'    => "%{$query}%",
            ));
        }

        return $c;
    }

    /** {@inheritDoc} */
    public function getData()
    {
        $data = array();
        $limit = intval($this->getProperty('limit'));
        $start = intval($this->getProperty('start'));

        $c = $this->modx->newQuery($this->classKey);
        $c = $this->prepareQueryBeforeCount($c);
        $data['total'] = $this->modx->getCount($this->classKey, $c);
        $c = $this->prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));

        $sortClassKey = $this->getSortClassKey();
        $sortKey = $this->modx->getSelectColumns($sortClassKey, $this->getProperty('sortAlias', $sortClassKey), '',
            array($this->getProperty('sort')));
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
        if ($this->getProperty('combo')) {
            $array = array(
                'id'       => $array['id'],
                'username' => $array['username'],
                'email'    => isset($array['email']) ? $array['email'] : null,
            );
        }

        return $array;
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('create')) {
            $query = $this->getProperty('query');
            if (preg_match('#.*?@.*#', $query)) {
                $array = array_merge_recursive(array(
                    array(
                        'id'       => 0,
                        'username' => $query,
                        'email'    => $query,
                    ),
                ), $array);
            }
        }

        return parent::outputArray($array, $count);
    }

    /** {@inheritDoc} */
    public function iterate(array $data)
    {
        $list = array();
        $list = $this->beforeIteration($list);
        $this->currentIndex = 0;
        /** @var xPDOObject|modAccessibleObject $object */
        foreach ((array)$data['results'] as $array) {
            $list[] = $this->prepareArray($array);
            $this->currentIndex++;
        }
        $list = $this->afterIteration($list);

        return $list;
    }

}

return 'modUserGetListProcessor';