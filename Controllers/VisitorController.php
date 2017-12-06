<?php

namespace controllers;

class VisitorController{

    //toujours tester si $user == null --> personne connectée n'est pas admin et si null --> ErrorView
    //cette variable pourra être utilisée par la vue pour faire una ffichage en fonction du role
    //si $user != NULL -> alors on affiche boutton lien suppr par exemple..
    function __construct($action)
    {
        global $rep, $view;
        $dErrorView = array();
        $actionVisitor = array('signin');


        //session_start();

        try {

            $action = $_REQUEST['action'];
            if(!in_array($action, $actionVisitor))
                $dErrorView[] = "This action isn't a Visitor action ";

            switch ($action) {

                case NULL :
                    require $rep.$view['home'];
                    break;

                case 'connect' :
                    $this->connection();
                    break;

                case 'disconnect' :
                    $this->deconnection();
                    break;

                case 'lists' :
                    $result = $user->getAllUsers();
                    require $rep.$view['home'];
                    break;

                default :
                    $dErrorView[] = "Bad request";
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

    }

    public function deconnection(){

    }
}




