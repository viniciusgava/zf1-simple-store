<?php

class Store_Cart {

    private static $instance;
    private $cartItens = array();

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance) && is_null(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    public function addProduct(Store_Product $product, $qty = 1) {
        foreach ($this->cartItens as &$carItem) {
            if ($carItem->getProduct() == $product) {
                $carItem->setQuantity($carItem->getQuantity() + $qty);
                return true;
            }
        }
        $this->cartItens[] = new Store_Cart_Item($product, $qty);
        return true;
    }

    public function removeProductByProductId($productId) {
        foreach ($this->cartItens as $keyItem => $item) {
            if ($item->getProduct()->getProductId() == $productId) {
                unset($this->cartItens[$keyItem]);
            }
        }
        $this->cartItens = array_values($this->cartItens);
        return true;
    }

    public function updateProductQuantityByProductId($productId, $qty) {
        if ($qty < 0)
            $qty = 0;
        if ($qty == 0)
            return $this->removeProductByProductId($productId);

        foreach ($this->cartItens as &$carItem) {
            if ($carItem->getProduct()->getProductId() == $productId) {
                $carItem->setQuantity($qty);
                return true;
            }
        }
        return false;
    }

    public function getItens() {
        return $this->cartItens;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->cartItens as $carItem) {
            $total += $carItem->getSubTotal();
        }
        return $total;
    }

}
