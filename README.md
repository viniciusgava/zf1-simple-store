ZF1 Simple Store
=======================

**⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️**

**⚠️⚠️⚠️⚠️⚠️⚠️ PROJECT ARCHIVE ⚠️⚠️⚠️⚠️⚠️⚠️**

**⚠️⚠️⚠️⚠️⚠️ NO LONGER MAINTAINED ⚠️⚠️⚠️⚠️**


**⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️**



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
For test project, you can use information for tests.

Go to "docs" directory and execute "information4tests.sql" in your mysql.

Go to "docs/imagestests" directory and copy all images to "/public/images/products"


