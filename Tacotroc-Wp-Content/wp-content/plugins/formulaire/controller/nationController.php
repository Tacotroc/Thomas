<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Nationality.php');

class nationController {

  //action readAll : read all users
  public static function readNation(){
    return twp_Museum::getAllNationality();
  }


}
