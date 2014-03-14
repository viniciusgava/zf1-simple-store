<?php

class Store_Order {

    private $cart;
    private $name;
    private $email;
    private $phone;
    private $streetAdress;
    private $city;
    private $state;
    private $country;
    private $postalcode;
    private $obs;

    /**
     *
     * @var Store_Db_Table_Order
     */
    private $objTblOrder;

    /**
     *
     * @var Store_Db_Table_OrderItem
     */
    private $objTblOrderItem;

    function __construct(Store_Cart $cart, $name, $email, $phone, $streetAdress, $city, $state, $country, $postalcode, $obs = null) {
        if ($this->setCart($cart) &&
                $this->setName($name) &&
                $this->setEmail($email) &&
                $this->setPhone($phone) &&
                $this->setStreetAdress($streetAdress) &&
                $this->setCity($city) &&
                $this->setState($state) &&
                $this->setCountry($country) &&
                $this->setPostalcode($postalcode) &&
                $this->setObs($obs)) {
            $this->objTblOrder = new Store_Db_Table_Order();
            $this->objTblOrderItem = new Store_Db_Table_OrderItem();
        } else {
            throw new Exception("Any parameter is invalid");
        }
    }

    /**
     * 
     * @return Store_Cart
     */
    public function getCart() {
        return $this->cart;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getStreetAdress() {
        return $this->streetAdress;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getPostalcode() {
        return $this->postalcode;
    }

    public function getObs() {
        return $this->obs;
    }

    public function setCart($cart) {
        if ($cart instanceof Store_Cart) {
            $this->cart = $cart;
            return true;
        }
        return false;
    }

    public function setName($name) {
        if (strlen($name) > 1) {
            $this->name = $name;
            return true;
        }
        return false;
    }

    public function setEmail($email) {
        if (strlen($email) > 1) {
            $this->email = $email;
            return true;
        }
        return false;
    }

    public function setPhone($phone) {
        if (strlen($phone) > 1) {
            $this->phone = $phone;
            return true;
        }
        return false;
    }

    public function setStreetAdress($streetAdress) {
        if (strlen($streetAdress) > 1) {
            $this->streetAdress = $streetAdress;
            return true;
        }
        return false;
    }

    public function setCity($city) {
        if (strlen($city) > 1) {
            $this->city = $city;
            return true;
        }
        return false;
    }

    public function setState($state) {
        if (strlen($state) > 1) {
            $this->state = $state;
            return true;
        }
        return false;
    }

    public function setCountry($country) {
        if (strlen($country) > 1) {
            $this->country = $country;
            return true;
        }
        return false;
    }

    public function setPostalcode($postalcode) {
        if (strlen($postalcode) > 1) {
            $this->postalcode = $postalcode;
            return true;
        }
        return false;
    }

    public function setObs($obs) {
        $this->obs = $obs;
        return true;
    }

    public function makeOrder() {
        try {
            $this->objTblOrder->getAdapter()->beginTransaction();
            $order = $this->objTblOrder->createRow();
            $order->name = $this->getName();
            $order->email = $this->getEmail();
            $order->phone = $this->getPhone();
            $order->street_address = $this->getStreetAdress();
            $order->city = $this->getCity();
            $order->state = $this->getState();
            $order->country = $this->getCountry();
            $order->postalcode = $this->getPostalcode();
            $order->obs = $this->getObs();
            $order->total_order_itens = count($this->getCart()->getItens());
            $order->total_price = $this->getCart()->getTotal();
            $idOrder = $order->save();

            foreach ($this->getCart()->getItens() as $item) {
                $itemOrder = $this->objTblOrderItem->createRow();
                $itemOrder->order_id = $idOrder;
                $itemOrder->product_id = $item->getProduct()->getProductId();
                $itemOrder->name = $item->getProduct()->getName();
                $itemOrder->price = $item->getProduct()->getPrice();
                $itemOrder->quantity = $item->getQuantity();
                $itemOrder->save();
            }
            $this->objTblOrder->getAdapter()->commit();
            return true;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }

}
