<?php

//start session
Zend_Session::start();

$objFrontController = Zend_Controller_Front::getInstance();
$objFrontController->throwExceptions(true);
$objFrontController->setControllerDirectory(realpath(APPLICATION_PATH.'/controllers/'));

require_once 'controllers/IndexController.php';

//Zend layout
$layout = Zend_Layout::startMvc();
$layout->setLayout('default');
$layout->setLayoutPath(realpath(APPLICATION_PATH.'/layouts/scripts/'));


//dispatch
$objFrontController->dispatch();
