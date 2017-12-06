<?php

namespace Controllers;

use Metier\Sanitize;
use Model\UserModel;
use Metier\Validation;

class UserController
{

    //toujours tester si $user == null --> personne connectée n'est pas admin et si null --> ErrorView
    //cette variable pourra être utilisée par la vue pour faire una ffichage en fonction du role
    //si $user != NULL -> alors on affiche boutton lien suppr par exemple..
    function __construct($action)
    {
        global $rep, $view;
        $errors = array();
        $actionUser = array('lists','home','connect', 'disconnect');

        $user = new UserModel();

        //session_start();

        try {

            $action = Sanitize::stringSanitize($action);


            if(!in_array($action, $actionUser))
                $errors[] = "This action isn't a User action ";

            switch ($action) {

                case NULL :
                    $this->displayAllLists();
                    break;

                case 'signin' :
                    $this->connection();
                    break;

                case 'signout' :
                    $this->deconnection();
                    break;

                case 'register' :
                    $result = $user->getAllUsers();
                    break;

                default :
                    $errors[] = "BAD REQUEST";
                    require $rep.$view['error'];
                    break;
            }
        }
        catch(\PDOException $e){
            $dErrorView[] = "DataBase Error ! : " . $e;
            require($rep . $view['error']);
        }
        catch (\Exception $e2){
            $dErrorView = "Error : " . $e2;
            require($rep . $view['error']);
        }
        exit(0);
    }

    public function connection(){
        global $rep, $view;
        require $rep.$view['signin'];
    }


    public function deconnection(){
        global $rep, $view;

    }

    public function displayAllLists(){
        global $rep, $view;
        $page = Sanitize::integerSanitize($_GET['page']);
        $all = UserModel::
    }
}



//méthode conenction : vérifie en abse si l'user existe (login//mdp dans table tuser)
//méthode déconenction : détruit conenction
//is admin = lire dans session pour trouve rrôle de la personne connectée


