<?php

namespace Controllers;

use Model\UserModel;

public class FrontController
{

    function __construct()
    {
        global $rep, $view;

        $actionUser = array("disconnect", "addList", "removeList");
        $actionVisitor = array("connect", "register", "consultList", "addTask", "deleteTask", "completTask");

        $user = new UserModel();

        try{

            if(!$user.isUser())
                exit(1);
            $action = $_GET('action');
            foreach($actionUser as $act) {
                if ($action == $act){
                    if ($user == NULL){
                        require($rep . $view['register']);
                    else
                        $user = new UserController();
                    }
                }
                else{


                }

            }








        }
}

/*
session_start();

$dViewError = array ();

    //TEST SI PERSONNE = user

    //TEST SI PERSONNE = admin

try{
$action=$_REQUEST['action'];

switch($action) {

case NULL:
$this->Reinit();
break;

case "validationFormulaire":
$this->ValidationFormulaire($dViewError);
break;

default:
$dErrorView[] =	"Erreur d'appel php";
require ($rep.$vues['vuephp1']);
break;
}

} catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
        exit(0);
    }


    function Reinit() {
        global $rep,$vues;

        $dVue = array (
            'nom' => "",
            'age' => 0,
        );
        require ($rep.$vues['vuephp1']);
    }

    function ValidationFormulaire(array $dVueEreur) {
        global $rep,$vues;


        //si exception, ca remonte !!!
        $login=$_POST['login']; // txtNom = nom du champ texte dans le formulaire
        $password=$_POST['password'];
        \config\Validation::matchToRegexp($login,$password,$dVueEreur);

        $model = new \Model\Simplemodel();
        $data=$model->get_data();

        $dVue = array (
            'nom' => $nom,
            'age' => $age,
            'data' => $data,
        );
        require ($rep.$vues['vuephp1']);
    }
*/