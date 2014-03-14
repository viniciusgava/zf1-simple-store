<?php

class Store_Controller_Action extends Zend_Controller_Action {

    public function __construct(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response, array $invokeArgs = array()) {
        parent::__construct($request, $response, $invokeArgs);
        $this->init();
    }

    public function init() {
        
    }

    public function preDispatch() {
        $objTblCategory = new Store_Db_Table_Category();
        $this->_helper->layout()->categories = $objTblCategory->getAllCategories();

        $objConfig = Zend_Registry::get("objConfig");
        $this->_helper->layout()->siteName = $objConfig->site->name;
    }

    protected function setTitle($title) {
        $this->_helper->layout()->title = $title;
    }

}
