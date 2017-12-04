<?php

// Autoload the classes from the Model
require_once(__DIR__.'/Config/Autoloader.php');
require_once(__DIR__.'Config/Config.php');
\Config\Autoloader::autoLoad();

//Call FrontController
$controller = new \Controllers\FrontController();


//Initialization of the connection
$db = new\Metier\Connection($dsn, $login, $password);


?>