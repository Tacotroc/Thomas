<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Model.php');

class foncController {
  public static function redirect(){
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&start=".$_POST['choix_page']);
    exit();
  }

  public static function redirectnbr(){
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&affichage=".$_POST['choix_nbr_page']);
    exit();
  }

}
