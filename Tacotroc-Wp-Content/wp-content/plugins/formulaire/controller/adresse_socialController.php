<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Adresse_Social.php');

class adresse_socialController {





  public static function addAdresse(){


  twp_Adress::setAdress($_POST['b1'],$_POST['b2'],$_POST['b3'],$_POST['b4'],$_POST['b5']);
  header("Status: 301 Moved Permanently", false, 301);

  exit();


  }


}
