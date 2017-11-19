<?php

//This class aims to connect to a DB
//No prints, no errors caught here
class Connection extends PDO
{
    private $stmt;

    public function __construct($dsn, $login, $password){
        parent::__construct($dsn, $login, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /***@param string $query
       *@param array $parameters *
       *@return bool 'true' on success, 'false' otherwise
    */
    public function executeQuery($query, array $parameters=[]){
        $this->stmt = parent::prepare($query); //prepare the query
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults(){
        return $this->stmt->fetchAll();
    }

}
