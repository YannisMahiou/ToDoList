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

    public function getIdList()
    {
        return $this->id_list;
    }

    public function getName()
    {
        return $this->name;
    }


}