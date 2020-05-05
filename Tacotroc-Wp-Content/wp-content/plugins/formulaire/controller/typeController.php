<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Type.php');

class typeController {

  //action readAll : read all users
  public static function readType(){
    return twp_Type::getAllType();
  }

  //action created : create an user in a database
  public static function addType(){

    twp_Type::saveType($_POST['Name']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  //action delete: type in database
  public static function deleteType(){
    twp_Type::deleteType($_POST['id']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : type in database
    public static function updateType(){
      twp_Type::updateType($_POST['id'], $_POST['Name']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }
}
