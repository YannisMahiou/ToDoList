<?php

namespace Metier;

class Sanitize
{
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