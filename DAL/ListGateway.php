<?php

namespace DAL;

class ListGateway{

    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    private function getInstances(array $results){
        $instc = [];
        foreach($results as $task)
            $instc[] = new List($task['id_task'], $task['title'], $task['content'], $task['date']);
        return $instc;
    }

    public function getAll(){
        $query = 'SELECT * FROM tlist';

        $this->con->executeQuery($query);

        return $this->con->getResults();
    }

    public function getTask($id_task)
    {
        $query = 'SELECT * FROM ttache WHERE id_tache=:id_task';

        $this->con->executeQuery($query,':id_task' => array($id_task, PDO::PARAM_INT));
        $results = $this->con->getResults();
        return $this->getInstances($results);
    }


    public function insertTask($id_task, $title, $content, $date)
    {
        $query='INSERT INTO ttask(id_tache, title, content, date) VALUES(:$id_task, :$title, :$content, :$date)';

        $this->con->executeQuery($con, array(
            ':id_task' => array($id_task, PDO::PARAM_INT),
            ':title' => array($title, PDO::PARAM_STR),
            ':content' => array($content, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
    }

    public function updateTask($id_task, $title, $content, $date)
    {
        $query='UPDATE ttache SET id_tache=:id_task, title=:title, content=:content, date=:date)';

        $this->con->executeQuery($con, array(
            ':id_task' => array($id_task, PDO::PARAM_INT),
            ':title' => array($title, PDO::PARAM_STR),
            ':content' => array($content, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR)
        ));
    }

    public function deleteUser($id_task){

        $query='DELETE FROM ttache WHERE id_tache=:id_task';

        return $this->con->executeQuery($query, array(
            ':id_task' => array($id_task, PDO::PARAM_INT)
        ));

    }




}