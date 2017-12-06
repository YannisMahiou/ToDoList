<?php

namespace Metier;

/**
 * App Validation
 * Aims to validate the user's informations
 */
class Validation
{
    public static function areSet($args=array(), array &$dErrorView){
        $res=true;
        foreach ($args as $line)
            $res&=isset($line);
        return $res;
    }

    //verify if the email is valid
    //return true if it's valid, false in other cases
    public static function isCorrectMail($mail, array &$dErrorView){
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $dErrorView[] = 'Validation : the mail is not valid';
            return false;
        }
        return true;
    }

    //verify if the arguments match to the regexp
    //returns true if it matches the regexp, false in other cases
    public static function matchToRegexp($login, $password, array &$dErrorView){
        $regexplog="/^[[:alnum:]]+$/";
        $regexppsw="/^([[:alnum:]]*[&#\-_\+=]*)*$/";
        $options = array('options' => array('regexp' => $regexplog));
        $options2= array('options' => array('regexp' => $regexppsw));

        if(!filter_var($login, FILTER_VALIDATE_REGEXP,$options)) {
            $dErrorView[] = 'Validation : the login do not have the expected form';
            return false;
        }
        if(!filter_var($password, FILTER_VALIDATE_REGEXP, $options2)){
            $dErrorView[] = 'Validation : the password do not have the expected form';
            return false;
        }
        return true;
    }

    //verify the length of the arguments
    //returns true if corrects lengths, false in other cases
    public static function hasCorrectLength($login, $password, array &$dErrorView)
    {
        if (strlen($login) < 1 || strlen($login) > 8) {
            $dErrorView[] = "Validation : Login is whether too short or too long !";
            return false;
        }
        if (strlen($password) < 1 || strlen($password) > 10) {
            $dErrorView[] = "Validation : Password is whether too short or too long !";
            return false;
        }
        return true;
    }

   public static function isValidAction($action, array &$dErrorView)
   {
       if ($action = $_GET['action'] ?? 'no') {
           $dErrorView[] = "Error : the action is not valid";
           return false;
       }
       return true;
   }

}
