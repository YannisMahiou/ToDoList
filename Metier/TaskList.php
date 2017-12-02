<?php

namespace Metier;

class TaskList
{
    private $id_list;
    private $name;

    public function __construct($id_list, $name){
        $this->id_list = $id_list;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdList()
    {
        return $this->id_list;
    }

    /**
     * @param mixed $id_list
     */
    public function setIdList($id_list)
    {
        $this->id_list = $id_list;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}