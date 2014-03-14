<?php

class Store_Controller_Action extends Zend_Controller_Action {

    public function __construct(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response, array $invokeArgs = array()) {
        parent::__construct($request, $response, $invokeArgs);
        $this->init();
    }

    public function init() {
                
    }

    public function preDispatch() {
        
        $this->view->setEncoding('UTF-8');
        
        //inclui diretorio de helpers
        $this->view->addHelperPath(realpath(ROOT_PATH .'/library/Store/View/Helper/'), 'Store_View_Helper');
        
        $objTblCategory = new Store_Db_Table_Category();
        $this->_helper->layout()->categories = $objTblCategory->getAllCategories();

        $objConfig = Zend_Registry::get("objConfig");
        $this->_helper->layout()->siteName = $objConfig->site->name;
    }

    protected function setTitle($title) {
        $this->view->title = $this->_helper->layout()->title = $title;
    }

}
