<?php

class Controller_Action extends Zend_Controller_Action {

    protected function setTitle($title) {
        $this->_helper->layout()->title = $title;
        
    }

}
