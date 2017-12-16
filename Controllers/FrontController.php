<?php

namespace Controllers;

use Metier\Validation;
use Metier\Sanitize;

/*1 : quel est le rôle de la personne connectée ? (user, admin, visitor) : lecture rôle dans la session !
 *2 : récupérer l'action en $_REQUEST
 *3 : $action existe ? sinon on va page erreur
 *      A-> non = $errorView
 *      B-> quel rôle faut-il pour cette action ?
 *      C-> rôle ok : appel du controler
 *      D-> role !OK : appel Viewss['register'] || ErrorView
 */


//si temps : vérifier toutes les actions si possible etc
//URL rewriting : pour se passer du frontController /usr1/action1/param1/param2

error_reporting(E_ALL & ~E_NOTICE);

class FrontController
{

    function __construct()
    {
        global $rep, $view, $template;
        $errors = array();

        $actionUser = array('signout', 'addList', 'removeList', 'createList');

        try {

            $user = \Model\UserModel::isUser();

            //Sanitize the action caught
            $action = Sanitize::stringSanitize($_REQUEST['action']);

            //If it's an user
            if ($user) {

                //If the action is valid
                if (Validation::isValidAction($action, $errors)) {

                    //And if the action belongs to the list of User's actions
                    if (in_array($action, $actionUser)) {

                        //New UserController with the sanitized and valided $action
                        new UserController($action);
                    }

                }
            }
            else{

                // Call the visitorController with the action
                new VisitorController($action);
            }
        }catch (\Exception $e) {

            $errors = "Error : " . $e;
            require($rep.$view['error']);

    }
  }
}
