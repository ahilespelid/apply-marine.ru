<?php

class myControllerUsers extends ApiInterface
{
    public $classKey = 'modUsers';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';
    public $fields = 'id,parent,pagetitle,longtitle,description,introtext,menuindex,content';
    public $searchFields = array('pagetitle','longtitle','description');
    public $filtersFields = array('id','parent','published','deleted');

    /* @inheritdoc */
    public function initialize(){
        parent::initialize();
        $this->setProperty('published', true);
        $this->setProperty('deleted:!=', true);
    }
}