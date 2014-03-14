ZF1 Simple Store
=======================

Introduction
------------
Simple store using ZF1

Installation
------------
Go to project directory and use composer to install dependences

    curl -s https://getcomposer.org/installer | php
    php composer.phar install

Go to "docs" directory and execute "install.sql" in your mysql.

Go to "application/configs/application.ini" and configure the information to the database.

    db.config.host = 
    db.config.username = 
    db.config.password = 
    db.config.dbname = simplestore
    

Remember of create a virtualhost or use this command in project directory to run(php 5.4 >).

    php -S 127.0.0.1:8888
    
Information for tests
---------------------
coming soon!