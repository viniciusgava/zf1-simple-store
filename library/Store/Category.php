<?php

class Store_Category {

    private $categoryId;
    private $name;
    private $slug;
    private $active;

    function __construct($name, $slug, $active, $categoryId = null) {
        if ($this->setName($name) &&
                $this->setSlug($slug) && 
                $this->setActive($active)) {
            if (!is_null($categoryId)) {
                if (!$this->setCategoryId($categoryId)) {
                    throw new Exception("Any parameter is invalid");
                }
            }
        }else{
            throw new Exception("Any parameter is invalid");
        }
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function getName() {
        return $this->name;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        if (is_bool($active)) {
            $this->active = $active;
            return true;
        }
        return false;
    }

    public function setCategoryId($categoryId) {
        if (is_numeric($categoryId)) {
            $this->categoryId = $categoryId;
            return true;
        }
        return false;
    }

    public function setName($name) {
        if (strlen($name) > 3) {
            $this->name = $name;
            return true;
        }
        return false;
    }

    public function setSlug($slug) {
        if (preg_match("%[a-z_-]{1,}%", $slug) === 1) {
            $this->slug = $slug;
            return true;
        }
        return false;
    }

}
