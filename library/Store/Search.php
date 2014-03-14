<?php

class Store_Search {

    protected $arrFilterCategoryId = array();
    protected $arrFilterProductId = array();
    protected $term = null;

    /**
     *
     * @var Store_Db_Table_Product
     */
    protected $objTblProduct;

    public function __construct() {
        $this->objTblProduct = new Store_Db_Table_Product();
    }

    public function setFilterByCategoryId($categoryId) {
        if (is_numeric($categoryId)){
            $this->arrFilterCategoryId = array(intval($categoryId));
            return true;
        }
        return false;
    }

    public function resetFilterByCategoryId() {
        $this->arrFilterCategoryId = array();
    }

    public function setFilterByTerm($term) {
        if (strlen($term) >= 2) {
            $this->term = $term;
            return true;
        }
        return false;
    }

    public function setFilterByProductId($productId) {
        if (is_numeric($productId)){
            $this->arrFilterProductId = array(intval($productId));
            return true;
        }
        return false;
    }

    public function search($currentPage = 1, $itemCountPerPage = 30, &$paginator) {
        $select = $this->objTblProduct->select()
                ->from(array("p" => "product"), new Zend_Db_Expr("SQL_CALC_FOUND_ROWS p.*"));

        $select->setIntegrityCheck(false);

        $select->where("p.active = ?", 1);
        $select->joinInner(array("cp" => "category_product"), "p.product_id = cp.product_id", array("category_id" => new Zend_Db_Expr("GROUP_CONCAT(cp.category_id)")));
        $select->joinInner(array("c" => "category"), "c.category_id = cp.category_id", array("category_name" => new Zend_Db_Expr("GROUP_CONCAT(c.name)"), "category_slug" => new Zend_Db_Expr("GROUP_CONCAT(c.slug)")));
        $select->where("c.active = ?", 1);

        //search by term
        if (!is_null($this->term)) {
            $term = $this->term;
            if (strpos($term, " ") !== false) {
                $term = str_replace(" ", "%", $term) . "%";
            } else {
                $term = $term . "%";
            }
            $select->where("p.name LIKE ? OR p.description LIKE ?", $term);
        }

        //filter by category
        if (count($this->arrFilterCategoryId) > 0) {
            $select->where("c.category_id IN(?)", $this->arrFilterCategoryId);
        }
        
        //filter by category
        if (count($this->arrFilterProductId) > 0) {
            $select->where("p.product_id IN(?)", $this->arrFilterProductId);
        }
        
        $select->group("p.product_id");

        //paginator
        $select->limit($itemCountPerPage, ($currentPage - 1) * $itemCountPerPage);
        $results = $this->objTblProduct->fetchAll($select);
        $totalRows = $this->objTblProduct->getAdapter()->fetchOne('SELECT FOUND_ROWS()');
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Null($totalRows));
        $paginator->setItemCountPerPage($itemCountPerPage);
        $paginator->setCurrentPageNumber($currentPage);

        $return = array();
        //process return                
        foreach ($results as $result) {
            try {
                $categoriesId = explode(",", $result->category_id);
                $categoriesName = explode(",", $result->category_name);
                $categoriesSlug = explode(",", $result->category_slug);

                $categories = array();

                foreach ($categoriesId as $catKey => $catId) {
                    $categories[] = new Store_Category($categoriesName[$catKey], $categoriesSlug[$catKey], true, $catId);
                }

                $return[] = new Store_Product($result->name, $result->price, true, $result->imageURL, $result->description, $result->product_id, $categories);
            } catch (Exception $e) {
                continue;
            }
        }
        return $return;
    }

}
