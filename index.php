<?php

// Autoload the classes from the Model
require_once 'Config/Autoloader.php';
require_once 'Config/Config.php';
\Config\Autoloader::register();


$title='MDRMDR';
$content='Content de la tache MDRMDR !!';
$date= new DateTime();
$date_format=$date->format('Y-m-d H:i:s');


$query = 'INSERT INTO ttache( title, content, date) VALUES (:title,:content,:date)';


$con = new Connection($dsn, $login, $password);

$con->executeQuery($query,array(
  ':title' => array($title,PDO::PARAM_STR),
  ':content' => array($content,PDO::PARAM_STR),
  ':date' => array($date_format,PDO::PARAM_STR)
));
