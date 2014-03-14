<?php

class Store_Form_Order extends Zend_Form{
    public function init() {        
        
        $this->setAction('');
        
        $this->setMethod('post');
        
        
        $name = $this->createElement('text', 'name', array('label' => 'Name'))
        ->addValidators(array(
            array('stringLength', true, array(1, 50)),
        ))
        ->setRequired(true);
        
        $email = $this->createElement('text', 'email', array('label' => 'E-mail'))
        ->addValidators(array(
            array('stringLength', true, array(1, 255)),
            array('EmailAddress', true)
        ))
        ->setRequired(true);
        
        $phone = $this->createElement('text', 'phone', array('label' => 'Phone number'))
        ->addValidators(array(
            array('stringLength', true, array(1, 20)),
        ))
        ->setRequired(true);
        
        $streetaddress = $this->createElement('text', 'streetaddress', array('label' => 'Street Address'))
        ->addValidators(array(
            array('stringLength', true, array(1, 300)),
        ))
        ->setRequired(true);
        
        $city = $this->createElement('text', 'city', array('label' => 'City'))
        ->addValidators(array(
            array('stringLength', true, array(1, 20)),
        ))
        ->setRequired(true);
        
        $state = $this->createElement('text', 'state', array('label' => 'State/Province'))
        ->addValidators(array(
            array('stringLength', true, array(1, 20)),
        ))
        ->setRequired(true);
        
        $country = $this->createElement('text', 'country', array('label' => 'Country'))
        ->addValidators(array(
            array('stringLength', true, array(1, 20)),
        ))
        ->setRequired(true);
        
        $postalcode = $this->createElement('text', 'postalcode', array('label' => 'Postal Code'))
        ->addValidators(array(
            array('stringLength', true, array(1, 15)),
        ))
        ->setRequired(true);
        
        $obs = $this->createElement('text', 'obs', array('label' => 'Note / Additional Information'))
        ->addValidators(array(
            array('stringLength', true, array(0, 350)),
        ));
        
        $this->addElement($name);
        $this->addElement($email);
        $this->addElement($phone);
        $this->addElement($streetaddress);
        $this->addElement($city);
        $this->addElement($state);
        $this->addElement($country);
        $this->addElement($postalcode);
        $this->addElement($obs);
        
        
        
        $this->addElement('submit', 'makeorder', array('label' => 'Make my order'));
        
    }
}
