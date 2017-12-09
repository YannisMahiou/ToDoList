<?php

namespace Model;

use DAL\ListGateway ;

class ListModel{


    static function getAllLists()  {
        return (new ListGateway())->getAll();
    }

    static function getListByName($name){
        return (new ListGateway())->getListByName($name);
    }
}

