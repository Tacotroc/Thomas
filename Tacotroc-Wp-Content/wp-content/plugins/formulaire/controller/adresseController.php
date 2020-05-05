<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Adress.php');

class adresseController {





  public static function addAdresse(){


  twp_Adress::setAdress($_POST['a'],$_POST['b'],$_POST['d'],$_POST['c'],$_POST['e'],$_POST['val']);
  header("Status: 301 Moved Permanently", false, 301);
header("Location:");
  exit();


  }


}
