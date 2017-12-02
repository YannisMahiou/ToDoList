<?php

namespace Metier;

class Sanitize
{
  //Sanitize des strings
  public static function loginSanitize($login){
      $login = filter_var($login,FILTER_SANITIZE_STRING);
      return $login;
  }

  public static function passwordSanitize($password){
      $password = filter_var($password,FILTER_SANITIZE_STRING);
      return $password;
  }

  public static function mailSanitize($mail){
      $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
      return $mail;
  }

  public static function stringSanitize($string){
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      return $string;
  }

  public static function integerSanitize($int){
      $int = filter_var($int,FILTER_SANITIZE_NUMBER_INT);
      return $int;
  }
}