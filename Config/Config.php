<?php

namespace Config;

//Project Directory
$rep=__DIR__.'/../';


//DataBase informations
$dsn='mysql:host=localhost;dbname=app;charset=utf8';
$login='root';
$password='';


//Database connection  IUT
//$dsn="mysql:host=hina;dbname=app";
//$login="yamahiou";
//$password="yamahiou";


//Views
$view['error']='Views/errorView.php';
$view['register']='Views/register.php';
$view['home']='Views/home.php';
$view['signin']='Views/signin.php';
$view['404']='Views/404.php';

//Templates
$template['head']='Views/templates/head.php';
$template['header']='Views/templates/header.php';
$template['footer']='Views/templates/footer.php';



