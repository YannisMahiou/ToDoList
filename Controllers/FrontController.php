<?php

namespace Controllers;

use Model\UserModel;

//récupère l'action
//la teste/nettoye/valide
//en fn de l'action : il appelle le bon controller (user // visitor // admin)
//
//Algo :
//initialisation : lien avec le model, session, lib, autoloader, etc
//1 : quel est le rôle de la personne connectée ? (user, admin, visitor) : lecture rôle dans la session !
//2 : récupérer l'action en GET/POST
//3 : $action existe ? sinon on va page erreur
//      A-> non = $errorView
//      B-> quel rôle faut-il pour cette action ?
//      A-> rôle ok : appel du controler
//      A-> role !OK : appel View['register'] || ErrorView


//si temps : vérifier toutes les actions si possible etc
//URL rewriting : pour se passer du frontController /usr1/action1/param1/param2

class FrontController
{

    function __construct()
    {
        global $rep, $view;

        $actionUser = array("disconnect", "addList", "removeList");
        $actionVisitor = array("connect", "register", "consultList", "addTask", "deleteTask", "completTask");
        //$actionAdmin

        $user = new UserModel();



        try {
            if (!$user->isUser())
                exit(1);
            $action = $_REQUEST('action');
            foreach ($actionUser as $act) {
                if ($action == $act) {
                    if ($user == NULL) {
                        require($rep . $view['register']);
                    } else {
                        $user = new UserController();
                    }
                }


                //c'est un user et que c'est uen action user)
                //appel de UserController
                //on valide l'action is au lieu de le faire dans le UserController
            }
        }catch(\Exception $e){
             $dErrorView = "Error : " . $e;
             require($rep . $view['error']);

            }
        }



        //méthode conenction : vérifie en abse si l'user existe (login//mdp dans table tuser)
        //méthode déconenction : détruit conenction
        //is admin = lire dans session pour trouve rrôle de la personne connectée

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