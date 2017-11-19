<?php

/**
 * App Validation
 * Aims to validate the user's informations
 */
class Validation
{
    public function areSet($args=array()){
        $res=true;
        foreach ($args as $line)
            $res&=isset($line);
        return $res;
    }

    //verify if the email is valid
    //return true if it's valid, false in other cases
    public function isCorrectMail($mail){
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
            return false;
        return true;
    }

    //verify if the arguments match to the regexp
    //returns true if it matches the regexp, false in other cases
    public function matchToRegexp($login, $password){
        $regexplog="/^[[:alnum:]]+$/";
        $regexppsw="/^([[:alnum:]]*[&#\-_\+=]*)*$/";
        $options = array('options' => array('regexp' => $regexplog));
        $options2= array('options' => array('regexp' => $regexppsw));

        if(!filter_var($login, FILTER_VALIDATE_REGEXP,$options))
            return false;
        if(!filter_var($password, FILTER_VALIDATE_REGEXP, $options2))
            return false;
        return true;
    }

    //verify the length of the arguments
    //returns true if corrects lengths, false in other cases
    public function hasCorrectLength($login, $password)
    {
        if (strlen($login) < 1 || strlen($login) > 8) {
            $error[] = "Error : Login is whether too short or too long !";
            return false;
        }
        if (strlen($password) < 1 || strlen($password) > 10) {
            $error[] = "Error : Password is whether too short or too long !";
            return false;
        }
        return true;
    }

}
