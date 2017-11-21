<?php

// Autoload the classes in App directory
require 'Config/Autoloader.php';
\Config\Autoloader::register();


$title='tâche 2';
$content='Content de la tache 2 !!';
$date= new DateTime();
$date_format=$date->format('Y-m-d H:i:s');


$query = 'INSERT INTO tache( title, content, date) VALUES (:title,:content,:date)';

$con = new Connection($dsn, $login, $password);

$con->executeQuery($query,array(
  ':title' => array($title,PDO::PARAM_STR),
  ':content' => array($content,PDO::PARAM_STR),
  ':date' => array($date_format,PDO::PARAM_STR)
));
