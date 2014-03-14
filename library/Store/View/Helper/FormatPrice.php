<?php

class Store_View_Helper_FormatPrice extends Zend_View_Helper_Abstract
{    
    public function formatPrice($price){
        $objConfig = Zend_Registry::get("objConfig");
        return $objConfig->site->currency->symbol.' '.number_format($price,2,$objConfig->site->currency->decimalSeparator,$objConfig->site->currency->thousandSeparator);               
    }
}
