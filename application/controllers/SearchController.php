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
        
        $category = false;
        
        //filter by category slug
        $slugCategory = $this->getParam("slugcategory",false);        
        if($slugCategory){
            $objTblCategory = new Store_Db_Table_Category();
            $category = $objTblCategory->getCategoryBySlug($slugCategory);
            if($category instanceof Store_Category){
                $this->objSearch->setFilterByCategoryId($category->getCategoryId());   
                $this->_helper->layout()->selectedCategory = $category->getCategoryId();
            }else{
                $this->_redirect('/search');
            }
        } 
        
        $q = $this->getParam("q");
        if(!is_null($q) && $q!="" && strlen($q)>=2){
            $this->_helper->layout()->q = $q;
            $this->objSearch->setFilterByTerm($q);            
        }
        
        $this->view->result = $this->objSearch->search(1, 30, $paginator);
        $this->view->paginator = $paginator;
        
    }

}
