<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Museum.php');

class museeController {

  //action readAll : read all users
  public static function readMusee(){
    return twp_Museum::getAllMusee();
  }

  //action created : create an user in a database
  public static function addMuseum(){
    twp_Museum::saveMuseum($_POST['Name'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();

  }

    //action update : museum  in database
  public static function deleteMuseum(){
    twp_Museum::deleteMuseum($_POST['id'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : museum  in database
    public static function updateMuseum(){
      twp_Museum::updateMuseum($_POST['id'], $_POST['Name'], $_POST['url']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }
}
