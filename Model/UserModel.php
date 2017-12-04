<?php

namespace Model;

use Metier\Connection;
use Metier\Sanitize;
use DAL\UserGateway;

class UserModel{

    //chiffrer le mot de passe en base !


    public function __construct()
    {

    }


    public function connection($login, $password){
        $login = Sanitize::stringSanitize($login);
        $password = Sanitize::stringSanitize($password);

        
        //appel DAL pour vérif login et mdp dans la BD
        //ajout dans la sessiosn
        //$SESSION['login']='admin' && $SESSION['login']=$login ..
        //chiffrer la session
    }

    public function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isUser()
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'] && isset($_SESSION['anneeDeN']))){
            $login = Sanitize::stringSanitize($_SESSION['login']);
            $role = Sanitize::stringSanitize($_SESSION['role']);
            $anneDeN = Sanitize::integerSanitize($_SESSION['anneeDeN']);
            return new \Metier\User($login, $role, $anneDeN);
        }
        else return null;
    }

    public function getAllUsers(){
        $dal = new UserGateway(new Connection($dsn, $login, $password));
        $all = $dal->getAll();
        return $all;
    }

    public function getUser($log){
        $login = Sanitize::stringSanitize($log);
        $dal = new UserGateway(new Connection($dsn, $login, $password));
        $usr = $dal->getUser($log);
        return $usr;
    }

    public function



}

