<?php

namespace Model;
use DAL\ListGateway;
use Metier\Connection;

public class ListModel{


    public function getAllLists($page) : array {
        return (new ListGateway(new Connection()))->getAll($page);
    }

    public function getListById($id) : {
        return (new ListGateway(new Connection()))->getListById($id);

    }
}

