<?php

namespace Model;

use Metier\Sanitize;
use DAL\UserGateway;
use Metier\User;

class UserModel{


     static function connection($login, $password){
        $login = Sanitize::stringSanitize($login); // plutot dans la calsse sani
        $password = Sanitize::stringSanitize($password);

        $user = (new UserGateway())->getUser($login, hash("sha512",$password));

        if($user == null)
            return false;

        session_start();
        $_SESSION['login']=$user->getUsername();
        $_SESSION['sessionID']=password_hash(session_id(), PASSWORD_DEFAULT);
        return true;
     }

     static function disconnect(){
        session_unset();
        session_destroy();
        $_SESSION = array();
     }

     static function isUser(){
        if(isset($_SESSION['login']) && isset($_SESSION['sessionID'])){
            $login = Sanitize::stringSanitize($_SESSION['login']);
            $password = Sanitize::integerSanitize($_SESSION['sessionID']);
            return (new User($login, $password));
        }
        return null;
     }

     static function getUser($login, $password){
        $login = Sanitize::stringSanitize($login);
        $password = Sanitize::stringSanitize($password);
        return (new UserGateway())->getUser($login, $password);
     }

     static function insertUser($login, $password){
       $login = Sanitize::stringSanitize($login);
       $password = Sanitize::stringSanitize($password);

       return (new UserGateway())->insertUser($login, hash("sha512",$password));
     }
}
