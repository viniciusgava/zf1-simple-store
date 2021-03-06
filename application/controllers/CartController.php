<?php

class CartController extends Store_Controller_Action {

    /**
     *
     * @var Store_Search
     */
    private $objSearch;

    /**
     *
     * @var Store_Cart 
     */
    private $cart;

    function init() {

        $this->objSearch = new Store_Search();

        if (isset($_SESSION['cart'])) {
            $this->cart = unserialize($_SESSION['cart']);
        } else {
            $this->cart = Store_Cart::getInstance();
        }
    }

    private function saveCartInSession() {
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function indexAction() {
        $this->setTitle("Cart");
        $this->view->cart = $this->cart;
        
        $formOrder = new Store_Form_Order();
        $this->view->formOrder = $formOrder;
        
        if($this->getRequest()->isPost()){
            if($formOrder->isValid($_POST)){
                $order = new Store_Order($this->cart, $formOrder->name->getValue(), $formOrder->email->getValue(), $formOrder->phone->getValue(), $formOrder->streetaddress->getValue(), $formOrder->city->getValue(), $formOrder->state->getValue(), $formOrder->country->getValue(), $formOrder->postalcode->getValue(), $formOrder->obs->getValue());
                if($order->makeOrder()){
                    $this->cart->clearCar();
                    $this->saveCartInSession();         
                    $this->_redirect('/cart/done');
                }
            }
        }
        
    }
    
    public function doneAction(){
        
    }

    public function removeAction() {
        $id = $this->getParam('id');

        if (is_numeric($id))
            $this->cart->removeProductByProductId($id);

        $this->saveCartInSession();
        $this->_redirect('/cart');
    }

    public function updateQuantityAction() {
        $id = $this->getParam('id');
        $qty = $this->getParam("qty");
        if (is_numeric($id) && is_numeric($qty)) {
            $this->cart->updateProductQuantityByProductId($id, $qty);            
        }

        $this->saveCartInSession();
        $this->_redirect('/cart');
    }

    public function addAction() {
        $id = $this->getParam('id');

        $qty = $this->getParam('qty', 1);
        if (!is_numeric($qty) || $qty <= 0)
            $qty = 1;

        $result = null;

        if ($this->objSearch->setFilterByProductId($id)) {
            $result = $this->objSearch->search(1, 1, $paginator);
            if (count($result) > 0) {
                $result = current($result);
            }
        }

        if ($result instanceof Store_Product) {
            $this->cart->addProduct($result, $qty);
        }

        $this->saveCartInSession();
        $this->_redirect('/cart');
    }

}
