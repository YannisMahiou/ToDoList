<?php

// Autoload the classes from the Model
require_once 'Config/Autoloader.php';
require_once 'Config/Config.php';
\Config\Autoloader::autoLoad();


//Call FrontController
$controler = new \Controllers\FrontController();




?>