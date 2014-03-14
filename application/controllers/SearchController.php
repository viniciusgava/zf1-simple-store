<?php

class SearchController extends Store_Controller_Action{

    /**
     *
     * @var Store_Search
     */
    private $objSearch;

    function init() {

        $this->objSearch = new Store_Search();
        
    }
    
    function indexAction(){
        
        $this->objSearch->setFilterByCategoryId(2);
        $result = $this->objSearch->search(1, 30, $paginator);
        
        echo '<pre>';
        print_r($result);
        print_r($paginator);
        echo '</pre>';
        die();
        
    }

}
