<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Color.php');

class colorController {

  //action readAll : read all users
  public static function readColor(){
    return twp_Color::getAllColor();
  }

  //action created : create an user in a database
  public static function addColor(){
    twp_Color::saveColor($_POST['Name'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();

  }

  public static function updateColorAdmin(){
    twp_Color::updateColorAdmin($_POST["envoie_id"],$_POST["envoie_couleur_1"],$_POST["old_couleur_1"],$_POST["envoie_couleur_2"],$_POST["old_couleur_2"]);
  }

  //action delete :  color in database
  public static function deleteColor(){
    twp_Color::deleteColor($_POST['id']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

  public static function addcouleurAdmin(){
    twp_Color::saveColorAdmin($_POST['idcar'],$_POST['Couleur1'],$_POST['Couleur2']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }


  public static function addcouleurAdmin2($idd,$c1,$c2){
    if( $c1 == $c2 ){
      twp_Color::saveColorAdmin($idd,$c1,null);

    }else {
      twp_Color::saveColorAdmin($idd,$c1,$c2);
    }
  }
  //action update: color in database
  public static function updateColor(){
    twp_Color::updateColor($_POST['id'], $_POST['Name'], $_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=3");
    exit();
  }
}
