<?php

namespace controllers;

use Metier\Sanitize;
use Model\UserModel;
use Model\ListModel;
use Metier\Validation;

class VisitorController{

    //toujours tester si $user == null --> personne connectée n'est pas admin et si null --> ErrorView
    //cette variable pourra être utilisée par la vue pour faire una ffichage en fonction du role
    //si $user != NULL -> alors on affiche boutton lien suppr par exemple..
    function __construct($action)
    {
        global $rep, $view, $template;
        $errors = array();
        $actionVisitor = array('login','signin', 'addList','removeList', 'register', 'addBase');

        try {

            $action=Sanitize::stringSanitize($action);

            if(!in_array($action, $actionVisitor))
                $errors[] = "Unknown action";

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

                case 'login' :
                    $this->login();
                    break;

                case 'addBase' :
                  $this->addBase();
                  break;

                default :
                    $errors[] = "Bad request";
                    require $rep.$view['error'];
                    break;
            }
        }
        catch(\PDOException $e){
            $errors[] = "DataBase Error ! : " . $e;
            require($rep . $view['error']);
        }
        catch (\Exception $e2){
            $errors = "Error : " . $e2;
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
        require($rep.$view['register']);
    }

    private function displayAllLists(){
        global $rep, $view,$template;
        $allLists = ListModel::getAllLists();
        require($rep.$view['home']);
    }

    private function displayTasksByIdList($id_list){
        return TaskModel::getTasksByIdList($id_list);

    }

    public function addList(){

    }

    public function removeList(){

    }

    public function login() {
        global $rep,$view,$template;
        if (isset($_POST['inputUsername']) && isset($_POST['inputPassword'])){
            if (UserModel::connection($_POST['inputUsername'], $_POST['inputPassword']) == false){
              $wrong=true;
              require($rep . $view['signin']);
            }
            else
              header('Location: index.php');
        }
    }

    public function addBase(){
      global $rep, $view, $template;
        if(!empty($_POST['userName']) && !empty($_POST['password'])){
            //if the data are valid
            //if(Validation::matchToRegexp($_POST['userName'], $_POST['password'], $errors)){

              //if the user already exists
              if(UserModel::connection($_POST['userName'], $_POST['password']) == true){
                $exists = true;
                require($rep . $view['register']);
              }
              else{
                //insert the user in the database
                $userId=UserModel::insertUser($_POST['userName'], $_POST['password']);
                header('Location: index.php');
            }
          }
        //}
  }


}
