<?php

class ProductController extends Store_Controller_Action {

    /**
     *
     * @var Store_Search
     */
    private $objSearch;

    function init() {

        $this->objSearch = new Store_Search();
    }

    public function showAction() {
        $id = $this->getParam('id');

        $result = null;

        if ($this->objSearch->setFilterByProductId($id)) {
            $result = $this->objSearch->search(1, 1, $paginator);
            if (count($result) > 0) {
                $result = current($result);
            }
        }

        if ($result instanceof Store_Product) {
            $this->view->result = $result;
            $this->setTitle($result->getName());
        } else {
            $this->_redirect('/');
        }
    }

}
