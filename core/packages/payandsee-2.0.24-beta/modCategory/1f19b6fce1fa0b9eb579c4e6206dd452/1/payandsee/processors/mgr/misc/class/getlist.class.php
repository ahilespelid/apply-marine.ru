<?php

class PayAndSeeClassGetListProcessor extends modObjectProcessor
{
    public $objectType = 'PasStatus';
    public $classKey = 'PasStatus';
    public $languageTopics = array('payandsee');
    public $permission = 'payandsee_setting_view';

    /** {@inheritDoc} */
    public function process()
    {
        $query = $this->getProperty('query');

        $c = $this->modx->newQuery($this->classKey);
        $c->sortby('class', 'ASC');
        $c->select('class as name, class as id');
        $c->groupby('class');
        $c->limit(0);
        if (!empty($query)) {
            $c->where(array('class:LIKE' => "%{$query}%"));
        }

        $array = array();
        if ($c->prepare() && $c->stmt->execute()) {
            while ($row = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                $row['name'] = $this->modx->lexicon("payandsee_class_" . strtolower($row['name']));
                $array[] = $row;
            }
        }

        return $this->outputArray($array);
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive(array(array(
                'id'   => '-',
                'name' => $this->modx->lexicon('payandsee_all'),
            )), $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive(array(array(
                'id'   => '-',
                'name' => $this->modx->lexicon('payandsee_no'),
            )), $array);
        }

        return parent::outputArray($array, $count);
    }

}

return 'PayAndSeeClassGetListProcessor';