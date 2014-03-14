<?php

//start session
Zend_Session::start();

$objFrontController = Zend_Controller_Front::getInstance();
$objFrontController->throwExceptions(true);
$objFrontController->setControllerDirectory(realpath(APPLICATION_PATH . '/controllers/'));

$objConfig = new Zend_Config_Ini(APPLICATION_PATH . "/configs/application.ini", APPLICATION_ENV);

Zend_Registry::set('objConfig', $objConfig);

$objDb = Zend_Db::factory($objConfig->db->adapter, $objConfig->db->config->toArray());
$objDb->query('SET NAMES UTF8');
Zend_Db_Table_Abstract::setDefaultAdapter($objDb);

if (APPLICATION_ENV == 'development') {
    $objFirebugDBProfiler = new Zend_Db_Profiler_Firebug('All queries');
    $objFirebugDBProfiler->setEnabled(true);
    $objDb->setProfiler($objFirebugDBProfiler);
}

//Zend layout
$layout = Zend_Layout::startMvc();
$layout->setLayout('default');
$layout->setLayoutPath(realpath(APPLICATION_PATH . '/layouts/scripts/'));


//dispatch
$objFrontController->dispatch();
