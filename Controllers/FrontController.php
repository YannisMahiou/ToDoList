<?php

namespace Controllers;

use Metier\Validation;
use Metier\Sanitize;
use Model\UserModel;

/*1 : quel est le rôle de la personne connectée ? (user, admin, visitor) : lecture rôle dans la session !
 *2 : récupérer l'action en $_REQUEST
 *3 : $action existe ? sinon on va page erreur
 *      A-> non = $errorView
 *      B-> quel rôle faut-il pour cette action ?
 *      C-> rôle ok : appel du controler
 *      D-> role !OK : appel View['register'] || ErrorView
 */


//si temps : vérifier toutes les actions si possible etc
//URL rewriting : pour se passer du frontController /usr1/action1/param1/param2

class FrontController
{

    function __construct()
    {
        global $rep, $view;
        $dErrorView = array();

        $actionUser = array('disconnect', 'addList', 'removeList');

        // A FAIRE
        //   -->initialisation : session, lib, autoloader, etc

        $user = new UserModel::isUser();
        //Sanitize the action caught
        $action = Sanitize::stringSanitize($_REQUEST['action']);

        try {

            //If it's an user
            if ($user) {

                //If the action is valid
                if (Validation::isValidAction($action, $dErrorView)) {

                    //And if the action belongs to the list of User's actions
                    if (in_array($action, $actionUser)) {

                        //New UserController with the sanitized and valided $action
                        new UserController($action);
                    } else {
                        throw new \Exception("BAD REQUEST");
                    }
                }
            }
            else{

                // Case Default : it's a visitor
                new VisitorController($action);
            }
        }catch (\Exception $e) {

            $dErrorView = "Error : " . $e;
            require($rep . $view['error']);

    }
  }
}

