<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Version.php');

class versionController {

  //action readAll : read all users
  public static function readVersion(){
    return twp_Version::getAllVersion();
  }

  //action created : create an user in a database
  public static function addVersion(){
    twp_Version::saveVersion($_POST['Name']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  //action delete : version in database
  public static function deleteVersion(){
    twp_Version::deleteVersion($_POST['id']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : version in database
    public static function updateVersion(){
      twp_Version::updateVersion($_POST['id'], $_POST['Name']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }
}
