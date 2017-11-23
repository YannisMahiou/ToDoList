<?php

class UserGateway{

    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    private function getInstances(array $results){
        $instc = [];
        foreach($results as $user){
            $instc[] = new User($user['Username'], $user['Password']);
        }
        return $instc;
    }

    public function getAll(){
        $query = 'SELECT * FROM tuser';

        $this->con->executeQuery($query);

        return $this->con->getResults();
    }

    public function getUser($username, $password)
    {
        $query = 'SELECT * FROM TUser WHERE Username=:username AND Password=:Password';

        $this->con->executeQuery($query, array(
            ':Username' => array($username, PDO::PARAM_STR),
            ':Password' => array($password, PDO::PARAM_STR)

        ));
        $results = $this->con->getResults();
        return $this->getInstances($results);
    }


    public function insertUser($username, $password)
    {
        $query = 'INSERT INTO tuser VALUES(:Username,:Password)';

        $this->con->executeQuery($con, array(
            ':Username' => array($username, PDO::PARAM_STR),
            ':Password' => array($password, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
    }

    public function updateUser($username, $password)
    {
        $query='UPDATE tuser SET Username=:Username, Password=:Password)';

        $this->con->executeQuery($con, array(
            ':Username' => array($username, PDO::PARAM_STR),
            ':Password' => array($password, PDO::PARAM_STR)
        ));
    }

    public function deleteUser($username){

        $query='DELETE FROM tuser WHERE Username=:Username';

        return $this->con->executeQuery($query, array(
           ':Username' => array($username, PDO::PARAM_STR)
        ));

    }




}