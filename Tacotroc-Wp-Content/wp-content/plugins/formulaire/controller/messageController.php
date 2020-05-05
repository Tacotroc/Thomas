<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Message.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Car.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Color.php');
class messageController {

  //action  de sauvegarde du message
  public static function addmessage(
    $nompP,
    $prenomP,
    $telP,
    $mailP,
    $nomI,
    $prenomI,
    $mailI,
    $adresse,
    $codeP,
    $ville,
    $pays,
    $description,
    $id_tw_car
  ){
    twp_message::savemessage(
      $nompP,
      $prenomP,
      $telP,
      $mailP,
      $nomI,
      $prenomI,
      $mailI,
      $adresse,
      $codeP,
      $ville,
      $pays,
      $description,
      $id_tw_car
    );

  }



  public static function deleteMess(){

    $res =twp_message::getNbMessIdc($_POST['id_twp_car']);
    twp_message::deleteMessage($_POST['ide']);
    if(intval($res)<=1){
      twp_Color::deleteColorRel($_POST['id_twp_car']);
      twp_car::deletebyidMess($_POST['id_twp_car']);
      echo'supressioon du vehicule';
    }
    else {
      echo 'le vehicule concerne plusieurs messages de la bdd ';
    }


  }
  public static function envoieMess(){
    $mess=twp_message::getNbMessId($_POST['mess']);
    $res=twp_message::sendmail($mess);
    echo $res;
  }
}
