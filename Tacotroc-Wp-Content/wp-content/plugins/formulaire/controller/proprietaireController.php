<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Owner.php');

class proprietaireController {

  //action readAll : read all users
  public static function readProprietaire(){

    return twp_Owner::getAllProprietaire();
  }

  //action created : create an user in a database
  public static function addOwner(){
    twp_Owner::saveOwner($_POST['Last_Name'], $_POST['First_Name'], $_POST['Compagny'], $_POST['Siret'], $_POST['Compagny_Name'], $_POST['Phone'] );
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
  //  exit();
  }

  //action delete : owner
  public static function deleteOwner(){
    twp_Owner::deleteOwner($_POST['id']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  //action update : brand in database
    public static function updateOwner(){
      twp_Owner::updateOwner($_POST['id'], $_POST['Last_Name'], $_POST['First_Name'], $_POST['Compagny'], $_POST['Siret'], $_POST['Compagny_Name'], $_POST['Phone']);
      header("Status: 301 Moved Permanently", false, 301);
      echo $_POST['Compagny'];
      exit();
    }
}
