<?php

namespace Model;

use Metier\Sanitize;

public class UserModel{

    public function __construct()
    {

    }

    public function isUser()
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login = Sanitize::stringSanitize($_SESSION['login']);


        }

    }
}

