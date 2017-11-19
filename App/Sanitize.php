<?php

class Sanitize
{
  //Sanitize des strings
  public function loginSanitize($login){
      $login = filter_var($login,FILTER_SANITIZE_STRING);
      return $login;
  }

  public function passwordSanitize($password)
  {
      $password = filter_var($password,FILTER_SANITIZE_STRING);
      return $password;
  }

  public function mailSanitize($mail){
      $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
      return $mail;
  }


  //Sanitize de l'emai
  //Sanitize des nombres (âge ?...)
  //
}