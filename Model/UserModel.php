<?php

namespace Model;

use Metier\Connection;
use Metier\Sanitize;
use DAL\UserGateway;

class UserModel{

    //chiffrer le mot de passe en base !




    public static function connection($login, $password){
        global $rep, $view;

        $login = Sanitize::stringSanitize($login);
        $password = Sanitize::stringSanitize($password);

        if(UserGateway::getUser($login) == NULL){
            require $rep . $view['register'];
        }
        $_SESSION['role']='user';
        $_SESSION['login']=$login;

        //voir partie securite --> chiffrer la session
    }

    public static function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function isUser()
    {
        if(isset($_SESSION['login']) && isset($_SESSION['password'])){
            $login = Sanitize::stringSanitize($_SESSION['login']);
            $password = Sanitize::stringSanitize($_SESSION['password']);
            return (new UserGateway())->getUser($login, $password);
        }
        else return null;
    }

    public static function getAllUsers(){
        return UserGateway::getAll();
    }

    public static function getUser($login){
        $login = Sanitize::stringSanitize($login);
        return UserGateway::getUser($login);
    }

}

