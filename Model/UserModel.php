<?php

namespace Model;

use Metier\Sanitize;
use DAL\UserGateway;
use Metier\User;

class UserModel{


     static function connection($login, $password){
        $login = Sanitize::stringSanitize($login);
        $password = Sanitize::stringSanitize($password);

        $user = (new UserGateway())->getUser($login, hash("sha512",$password));
        if($user == null)
            return null;

        session_start();

        $_SESSION['username']=$user->getUsername();
        $_SESSION['password']=$user->getPassword();
        $_SESSION['sessionID']=password_hash(session_id(), PASSWORD_DEFAULT);
     }

     static function disconnect(){
        session_unset();
        session_destroy();
        $_SESSION = array();
     }

     static function isUser(){
        if(isset($_SESSION['login']) && isset($_SESSION['password'])){
            $login = Sanitize::stringSanitize($_SESSION['login']);
            $password = Sanitize::stringSanitize($_SESSION['password']);
            return (new User($login, $password));
        }
        return null;
     }

     static function getUser($login, $password){
        $login = Sanitize::stringSanitize($login);
        return (new UserGateway())->getUser($login, $password);
     }

}

