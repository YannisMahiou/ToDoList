<?php

//reçoit les appels à faire
namespace Model;

use Metier\Connection;

class TaskModel
{
    static function getTasksByIdList($id_list)  {
        return (new TaskGateway())->getTasksByIdList($id_list);
    }
}
