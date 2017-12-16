<?php

namespace DAL;

use Metier\Connection;
use Metier\User;
use \PDO;

class UserGateway{

    private $con;

    public function __construct(){
        $this->con= new Connection();
    }

    public function getUser($username, $password){
      try{
        $query = 'SELECT * FROM tuser WHERE username=:username AND password=:password';

        $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
        $res =  $this->con->getFirst();
        return !$res ? null : new User($res['username'],$res['password']);
      }catch(PDOException $e) {
        throw new Exception($e);
      }
    }

    public function insertUser($username, $password){
      try{
        $query='INSERT INTO tuser VALUES(:username, :password)';
        $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
        return $this->con->lastInsertId();
      }
      catch(PDOException $e){
        throw new Exception($e);
      }
    }


    public  function updateUser($username, $password){
        $query= 'UPDATE tuser SET username=:username, password=:password';
        return $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
    }

    public  function deleteUser($username){

        $query= 'DELETE FROM tuser WHERE username=:username';
        return $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR)
        ));
    }
}
