<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Country.php');

class paysController {

  //action readAll : read all users
  public static function readCountry(){
    return twp_Country::getAllCountry();
  }

  //action created : create an user in a database
  public static function saveCountry(){
    twp_Country::saveCountry($_POST['Name'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  //action : delete a country in database
  public static function deleteCountry(){
    twp_Country::deleteCountry($_POST['id'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : country in database
    public static function updateCountry(){
    $result = twp_Country::updateCountry($_POST['id'], $_POST['Name'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=3");
if($result == false){
  return $result;
}else{
  exit();

}
    }
}
