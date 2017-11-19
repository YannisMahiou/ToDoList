<?php

namespace App;

/**
 * App Autoloader
 * Allow to autoload php classes
 */
class Autoloader
{
    static function autoload($class_name){
        require 'App/' . $class_name . '.php';
    }

    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }


}