<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/CompteTt/connexionPDO/ConnexionCompte.php');


class CompteTt_twp_user {

private $id;
private $pseudo;
private $mdp;
private $mail;
private $phone;
private $addressip;
private $pays;
private $natio;
private $pro; 
private $entreprise;
private $siret;
private $noncontact;


    //function for select all user in data base
  public static function getAllUser()
  {
    $query = 'SELECT * FROM twp_user ORDER BY Last_Name';
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getNameColumn($nameTable){
    $query = "SELECT column_name FROM information_schema.columns WHERE table_name='$nameTable'";
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj = $rep->fetchAll();
    return $tab_obj;
  }

  public static function addNewUserCompte($id,$pseudo,$mdp,$mail,$phone,$addressip,$pays,$natio,$pro,$entreprise,$siret,$noncontact){
    echo ("enregistré !!!");
  }

}