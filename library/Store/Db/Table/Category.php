<?php

class Store_Db_Table_Category extends Store_Db_Table_Abstract {

    protected $_name = "category";
    protected $_primary = "category_id";

    public function getAllCategories($onlyActive = true) {
        $select = $this->select();
        if ($onlyActive) {
            $select->where("active = ?", 1);
        }
        $results = $this->fetchAll($select);
        $return = array();
        foreach ($results as $result) {
            $return[] = new Store_Category($result->name, $result->slug, ($result->active == '1'), $result->category_id);
        }
        return $return;
    }

}
