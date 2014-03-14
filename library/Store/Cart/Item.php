<?php

class Store_Cart_Item {

    private $product;
    private $quantity = 1;

    public function __construct(Store_Product $product, $quantity = 1) {
        if ($this->setProduct($product) && $this->setQuantity($quantity)) {
            
        } else {
            throw new Exception("Any parameter is invalid");
        }
    }

    public function getProduct() {
        return $this->product;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    private function setProduct($product) {
        if ($product instanceof Store_Product) {
            $this->product = $product;
            return true;
        }
        return false;
    }

    public function setQuantity($quantity) {
        if (is_numeric($quantity) && $quantity >= 1) {
            $this->quantity = (int) $quantity;
            return true;
        }
        return false;
    }
    
    public function getSubTotal(){
        return $this->getQuantity()* $this->product->getPrice();
    }

}
