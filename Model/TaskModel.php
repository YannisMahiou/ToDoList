<?php

//reçoit les appels à faire
namespace Model;

use Metier\Connection;

class TaskModel
{

    public function __construct()
    {
        $dal = new TaskGateway(Connection $con);
    }

?>