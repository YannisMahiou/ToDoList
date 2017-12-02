<?php

namespace DAL;

use \Metier\Connection;
use \Metier\TaskList;

class ListGateway{

    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    private function getInstances(array $results){
        $instc = [];
        foreach($results as $list)
            $instc[] = new TaskList($list['id_list'], $list['name']);
        return $instc;
    }

    public function getAll(){
        $query = 'SELECT * FROM tlist';

        $this->con->executeQuery($query);

        return $this->con->getResults();
    }

    public function getList($id_list)
    {
        $query = 'SELECT * FROM tlist WHERE id_list=:id_list';

        $this->con->executeQuery($query,':id_list' => array($id_list, \PDO::PARAM_INT));
        $results = $this->con->getResults();
        return $this->getInstances($results);
    }

    public function insertList($id_list, $name)
    {
        $query='INSERT INTO tlist(id_list, name) VALUES(:id_list, :name)';

        $this->con->executeQuery($query, array(
            ':id_list' => array($id_list, \PDO::PARAM_INT),
            ':name' => array($name, \PDO::PARAM_STR),
        ));

        return $this->con->lastInsertId();
    }

    public function updateList($id_list, $name)
    {
        $query='UPDATE tlist SET id_list=:id_list, name=:name)';

        $this->con->executeQuery($query, array(
            ':id_list' => array($id_list, \PDO::PARAM_INT),
            ':name' => array($name, \PDO::PARAM_STR),
        ));
    }

    public function deleteList($id_list){

        $query='DELETE FROM tlist WHERE id_list=:id_list';

        return $this->con->executeQuery($query, array(
            ':id_list' => array($id_list, \PDO::PARAM_INT)
        ));

    }
}