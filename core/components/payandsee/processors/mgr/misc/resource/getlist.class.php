<?php

class modResourceGetListProcessor extends modObjectGetListProcessor
{
    public $objectType = 'modResource';
    public $classKey = 'modResource';
    public $languageTopics = array('resource');
    public $defaultSortField = 'pagetitle';
    public $permission = 'payandsee_setting_view';

    /** {@inheritDoc} */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $id = $this->getProperty('id');
        if (!empty($id) AND $this->getProperty('combo')) {
            $c->sortby("FIELD (id, {$id})", "DESC");
        }

        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array('pagetitle:LIKE' => '%' . $query . '%'));
        }

        $templates = $this->getProperty('templates');
        if ($templates) {
            $templates = array_map('trim', explode(',', $templates));
            $c->where(array('template:IN' => $templates));
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
                'id'        => $array['id'],
                'pagetitle' => $array['pagetitle'],
            );
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
        foreach ((array)$data['results'] as $array) {
            $list[] = $this->prepareArray($array);
            $this->currentIndex++;
        }
        $list = $this->afterIteration($list);

        return $list;
    }

}

return 'modResourceGetListProcessor';