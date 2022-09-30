<?php

/**
 * Get a list of PasStatus
 */
class PasStatusGetListProcessor extends modObjectGetListProcessor
{
    public $objectType = 'PasStatus';
    public $classKey = 'PasStatus';
    public $defaultSortField = 'rank';
    public $defaultSortDirection = 'ASC';
    public $languageTopics = array('default', 'payandsee');
    public $permission = 'payandsee_status_view';

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
        $combo = $this->getProperty('combo');
        if ($combo) {
            $c->where(array('active' => true));
        }

        $class = $this->getProperty('class');
        if (strlen($class) > 1) {
            $c->where(array('class' => $class));
        }

        $query = trim($this->getProperty('query'));
        if ($query) {
            $c->where(array(
                'name:LIKE'           => "%{$query}%",
                'OR:description:LIKE' => "%{$query}%",
            ));
        }

        return $c;
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive(array(array(
                'id'   => 0,
                'name' => $this->modx->lexicon('payandsee_all'),
            )), $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive(array(array(
                'id'   => 0,
                'name' => $this->modx->lexicon('payandsee_no'),
            )), $array);
        }

        return parent::outputArray($array, $count);
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
        $icon = 'icon';

        if ($this->getProperty('combo')) {
            $array = array(
                'id'          => $array['id'],
                'name'        => $array['name'],
                'description' => $array['description'],
            );
        } else {
            $array['actions'] = array();

            // Edit
            $array['actions'][] = array(
                'cls'    => '',
                'icon'   => "$icon $icon-edit green",
                'title'  => $this->modx->lexicon('payandsee_action_update'),
                'action' => 'update',
                'button' => true,
                'menu'   => true,
            );

            if ($array['editable']) {
                // sep
                $array['actions'][] = array(
                    'cls'    => '',
                    'icon'   => '',
                    'title'  => '',
                    'action' => 'sep',
                    'button' => false,
                    'menu'   => true,
                );

                if (!$array['active']) {
                    $array['actions'][] = array(
                        'cls'    => '',
                        'icon'   => "$icon $icon-toggle-off red",
                        'title'  => $this->modx->lexicon('payandsee_action_turnon'),
                        'action' => 'active',
                        'button' => true,
                        'menu'   => true,
                    );
                } else {
                    $array['actions'][] = array(
                        'cls'    => '',
                        'icon'   => "$icon $icon-toggle-on green",
                        'title'  => $this->modx->lexicon('payandsee_action_turnoff'),
                        'action' => 'inactive',
                        'button' => true,
                        'menu'   => true,
                    );
                }

                // sep
                $array['actions'][] = array(
                    'cls'    => '',
                    'icon'   => '',
                    'title'  => '',
                    'action' => 'sep',
                    'button' => false,
                    'menu'   => true,
                );
                // Remove
                $array['actions'][] = array(
                    'cls'    => '',
                    'icon'   => "$icon $icon-trash-o red",
                    'title'  => $this->modx->lexicon('payandsee_action_remove'),
                    'action' => 'remove',
                    'button' => true,
                    'menu'   => true,
                );
            }

        }

        return $array;
    }

    /** {@inheritDoc} */
    public function iterate(array $data)
    {
        $list = array();
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

return 'PasStatusGetListProcessor';