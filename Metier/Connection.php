<?php

namespace Metier;

use \PDO;
//This class aims to connect to a DB
//No prints & no errors caught


class Connection extends \PDO
{
    private $stmt;
    private static $_instance;

    public function __construct(){
        global $dsn, $login, $password;
        parent::__construct($dsn, $login, $password);
        $this->id = uniqid();
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /***@param string $query
       *@param array $parameters *
       *@return bool 'true' on success, 'false' otherwise
    */
    public function executeQuery($query, array $parameters=[]){
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResults() {
        return $this->stmt->fetchAll();
    }

    public function getFirst() {
        return $this->stmt->fetch();
    }

}
