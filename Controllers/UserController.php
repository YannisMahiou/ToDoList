<?php

namespace Controllers;

use Model\UserModel;

public class UserController
{

    function __construct()
    {
        global $rep, $views;
        $dErrorView = array();
        $actionUser = array("connect", "disconnect");

        //$user = new UserModel();

        session_start();

        try {
            $action = $_REQUEST('action');
            foreach($actionUser as $usr) {
                if ($usr != $action)
                    $dErrorView[] = "That action isn't a User action ";
            }

            switch ($action) {

                case NULL :
                    //appel à la home
                    break;

                case 'connect' :
                    $this->connection();
                    break;

                case 'disconnect' :
                    $this->deconnection();
                    break;

                case
                default :
                    $dErrorView[] = "Bad request";
                    require($rep . $views['error']);
                    break;
            }
        }
        catch(\PDOException $e){
            $dErrorView[] = "DataBase Error ! : " . $e;
            require($rep . $views['error']);
        }
        catch (\Exception $e2){
            $dErrorView = "Error : " . $e2;
            require($rep . $views['error']);
        }
        exit(0);
    }

    public function connection(){

    }

    public function deconnection(){

    }

}




