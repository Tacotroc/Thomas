<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Club.php');

class clubController {

  //action readAll : read all users
  public static function readClub(){
    return twp_Club::getAllClub();
  }

  //action created : create an user in a database
  public static function addClub(){
    twp_Club::saveClub($_POST['Name']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  // action delete : club in database
  public static function deleteClub(){
    twp_Club::deleteClub($_POST['id']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : brand in database
    public static function updateClub(){
      twp_Club::updateClub($_POST['hidden_id'], $_POST['input_New_Nom']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }
      public static function pagination(){
       twp_Club::pagination();
       //header("Status: 301 Moved Permanently", false, 301);
       //header("Location:http://tacotroc.net/wp-admin/admin.php?page=add_club");
       //exit();
      }

}
