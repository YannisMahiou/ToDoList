<?php

namespace DAL;

use \Metier\Connection;
use \Metier\TaskList;
use \PDO;

class ListGateway{

    private $con;

    public function __construct(){
        $this->con= new Connection();
    }

    private function getInstances(array $results)
    {
        $instc = [];
        foreach ($results as $list)
            $instc[] = new TaskList($list['id_list'], $list['name']);
        return $instc;
    }

    public function getAll(){
        try{
            $query = 'SELECT * FROM tlist';
            $this->con->executeQuery($query);

            return $this->con->getResults();
        }catch(\PDOException $e){

            $pdoErrors[] = $e->getMessage();
        }
    }

    public function getListByName($name)
    {
        try{
            $query = 'SELECT * FROM tlist WHERE name=:name';
            $this->con->executeQuery($query,
                array(':name' => array($name, PDO::PARAM_STR)));
            $results = $this->con->getResults();

            return $this->getInstances($results);
        }catch(\PDOException $e){
            $pdoErrors[] = $e->getMessage();
        }
    }

    public function insertList($id_list, $name)
    {
        try {
            $query = 'INSERT INTO tlist(id_list, name) VALUES(:id_list, :name)';
            $this->con->executeQuery($query, array(
                ':id_list' => array($id_list, PDO::PARAM_INT),
                ':name' => array($name, \PDO::PARAM_STR),
            ));

            return $this->con->lastInsertId();
        } catch (\PDOException $e) {
            $pdoErrors[] = $e->getMessage();
        }
    }

    public function updateList($id_list, $name)
    {

        try {
            $query = 'UPDATE tlist SET id_list=:id_list, name=:name)';
            $this->con->executeQuery($query, array(
                ':id_list' => array($id_list, PDO::PARAM_INT),
                ':name' => array($name, PDO::PARAM_STR),
            ));
        } catch (\PDOException $e) {
            $pdoErrors[] = $e->getMessage();
        }
    }

    public function deleteList($id_list){

        try {
            $query = 'DELETE FROM tlist WHERE id_list=:id_list';
            return $this->con->executeQuery($query, array(
                ':id_list' => array($id_list, PDO::PARAM_INT)));
        } catch (\PDOException $e) {
            $pdoErrors[] = $e->getMessage();
        }

    }
}