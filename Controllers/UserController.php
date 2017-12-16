<?php

namespace Controllers;

use Metier\Sanitize;
use Model\ListModel;
use Model\UserModel;
use Metier\Validation;

//classe de $_SESSION :

class UserController
{

    //toujours tester si $user == null --> personne connectée n'est pas admin et si null --> ErrorView
    //cette variable pourra être utilisée par la vue pour faire una ffichage en fonction du role
    //si $user != NULL -> alors on affiche boutton lien suppr par exemple..
    function __construct($action)
    {
        global $rep, $view, $template;
        $errors = array();
        $actionUser = array('signout', 'addList', 'removeList', 'signin');


        try {

            $action = Sanitize::stringSanitize($action);


            if(!in_array($action, $actionUser))
                $errors[] = "This action isn't a User action ";

            switch ($action) {

                case NULL :
                    $this->displayAllLists();
                    break;

                case 'signout' :
                    $this->disconnect();
                    break;

                case 'addList' :
                    $this->addList();

                default :
                    $errors[] = 'BAD REQUEST';
                    require($rep.$view['error']);
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


    private function disconnect(){
        global $rep, $view, $template;
        UserModel::disconnect();
        $this->displayAllLists();
    }

    private function displayAllLists(){
        global $rep, $view,$template;
        $allLists = ListModel::getAllLists();
        require($rep.$view['home']);
    }

    private function addList()
    {
    }

}
