<?php

class Store_Product {

    private $productId = null;
    private $name;
    private $description = null;
    private $price;
    private $imageURL = null;
    private $active;
    private $categories = array();

    public function __construct($name, $price, $active, $imageURL = null, $description = null, $productId = null, array $categories = array()) {
        if ($this->setName($name) &&
                $this->setDescription($description) &&
                $this->setPrice($price) &&
                $this->setImageURL($imageURL) &&
                $this->setActive($active)) {
            if (!is_null($productId))
                if (!$this->setProductId($productId))
                    throw new Exception("Any parameter is invalid");
            if (count($categories) > 0) {
                if (!$this->setCategories($categories))
                    throw new Exception("Any parameter is invalid");
            }
        }else {
            throw new Exception("Any parameter is invalid");
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getActive() {
        return $this->active;
    }

    public function getImageURL() {
        return $this->imageURL;
    }
    
    public function getProductId() {
        return $this->productId;
    }

    public function getCategories() {
        return $this->categories;
    }

    
    public function setName($name) {
        if (strlen($name) > 3) {
            $this->name = $name;
            return true;
        }
        return false;
    }

    public function setDescription($description) {
        $this->description = $description;
        return true;
    }

    public function setImageURL($imageURL) {
        $this->imageURL = $imageURL;
        return true;
    }

    public function setPrice($price) {
        if (is_numeric($price)) {
            $this->price = (float) $price;
            return true;
        }
        return false;
    }

    public function setActive($active) {
        if (is_bool($active)) {
            $this->active = $active;
            return true;
        }
        return false;
    }

    private function setProductId($productId) {
        if (is_numeric($productId)) {
            $this->productId = $productId;
            return true;
        }
        return false;
    }

    public function setCategories(array $categories) {
        $oldCategories = $this->categories;
        $this->categories = array();
        foreach ($categories as $category) {
            if (!$this->addCategory($category)) {
                $this->categories = $oldCategories;
                return false;
            }
        }
        return true;
    }

    public function addCategory($category) {
        if ($category instanceof Store_Category) {
            $this->categories[] = $category;
            return true;
        }
        return false;
    }

    public function hasImage() {
        return ($this->getImageURL() != null);
    }

}
