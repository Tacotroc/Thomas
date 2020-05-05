<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Cylinder.php');

class cylinderController {

  //action readAll : read all users
  public static function readCylinder(){
    return twp_Cylinder::getAllCylinder();
  }

  //action created : create an user in a database
  public static function addCylinder(){
    twp_Cylinder::saveCylinder($_POST['Cylinder'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();

  }

    //action delete  : cylinder in database
  public static function deleteCylinder(){
    twp_Cylinder::deleteCylinder($_POST['id'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : cylinder  in database
    public static function updateCylinder(){
      twp_Cylinder::updateCylinder($_POST['id'], $_POST['Name'], $_POST['url']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }
}
