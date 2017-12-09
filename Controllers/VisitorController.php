<?php

namespace controllers;

use Metier\Sanitize;
use Model\UserModel;
use Model\ListModel;

class VisitorController{

    //toujours tester si $user == null --> personne connectée n'est pas admin et si null --> ErrorView
    //cette variable pourra être utilisée par la vue pour faire una ffichage en fonction du role
    //si $user != NULL -> alors on affiche boutton lien suppr par exemple..
    function __construct($action)
    {
        global $rep, $view, $template;
        $dErrorView = array();
        $actionVisitor = array('signin', 'addList','removeList', 'register');

        try {

            $action=Sanitize::stringSanitize($action);

            if(!in_array($action, $actionVisitor))
                $dErrorView[] = "Unknown action";

            switch ($action) {

                case NULL :
                    $this->displayAllLists();
                    break;

                case 'signin' :
                    $this->connection();
                    break;

                case 'register' :
                    $this->register();
                    break;

                case 'addlist' :
                    $this->addList();
                    break;

                case 'removelist' :
                    $this->removeList();
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

    private function connection(){
        global $rep, $view, $template;
        require $rep.$view['signin'];
    }

    private function register(){
        global $rep,$view,$template;
        if(isset($_POST['inputUsername']) && isset($_POST['inputPassword'])){
            $user=UserModel::connection($_POST['inputUsername'], $_POST['inputPassword']);
            if($user == null) {
                require($rep.$view['register']);
            }
            else
                header('Location: index.php');
        }
    }

    private function displayAllLists(){
        global $rep, $view,$template;
        $allLists = ListModel::getAllLists();
        require($rep.$view['home']);
    }

    public function addList(){

    }

    public function removeList(){

    }


}




