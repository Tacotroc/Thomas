<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_User.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Adresse_Social.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Adress.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Adresse_Social.php');
session_start();
class userController {

  //action readAll : read all users
  public static function readAll(){
    return twp_User::getAllUser();
  }

  // action delete : user in database
  public static function deleteUser(){
    twp_Adress::deleteByID_user($_POST['id']);
    twp_Adresse_Social::deleteByID_user($_POST['id']);
    twp_User::deleteUser($_POST['id']);
  }

  public static function addUserEntreprise(){

  twp_User::SaveEntreprise($_POST['e'],$_POST['f'],$_POST['a'],$_POST['g'],$_POST['Passwordo'],$_POST['d']);
  $createuser = twp_User::getUser($_POST['a']);
  foreach ($createuser as  $value)
  {
    $idco = $value->id;
  }

  twp_Adresse_Social::setAdress($_POST['b1'],$_POST['b2'],$_POST['b3'],$_POST['b4'],$_POST['b5'],$idco);
  twp_Adress::setAdressone($_POST['c1'],$_POST['c2'],$_POST['c3'],$_POST['c4'],$_POST['c5'],$idco);

  header("Status: 301 Moved Permanently", false, 301);
    header("Location:http://tacotroc.net/sinscrire" );
  exit();


  }

  //action created : create an user in a database
  public static function addUser(){
    twp_User::saveUser($_POST['Last_Name'], $_POST['First_Name'], $_POST['Pseudo'], $_POST['Mail'], $_POST['Phone'], $_POST['Password'],
    $_POST['Token'], $_POST['Date_Creation'], $_POST['Internet_Protocol'],$_POST['Nation']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  //action update : brand in database
    public static function updateUser()
    {
      twp_User::updateUser($_POST['id'], $_POST['Last_Name'], $_POST['First_Name'], $_POST['Pseudo'], $_POST['Mail']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }


      //action update : brand in database
      public static function updateUserSession()
      {

        $idCo = unserialize($_SESSION['User']);


        twp_User::updateUserSession($idCo->getId(),$_POST['Last_Name'],$_POST['First_Name'], $_POST['Pseudo'], $_POST['Mail'],$_POST['Nation'],$_POST['Nom_E'],$_POST['Siret']);
        $idCo->setLastName($_POST['Last_Name']);
        $idCo->setFirstName($_POST['First_Name']);
        $idCo->setPseudo($_POST['Pseudo']);
        $idCo->setMail($_POST['Mail']);
        $idCo->setNation($_POST['Nation']);
        $idCo->setNomEntreprise($_POST['Nom_E']);
        $idCo->setSiret($_POST['Siret']);

        $_SESSION['User']= serialize($idCo);
        }

        public static function updateUserMdp()
        {twp_User::updateUserSessionMdp( $_POST['Password']);}


  public static function login(){
    twp_User::login_session($_POST['Pseudo'], $_POST['Password']);
    // header("Status: 301 Moved Permanently", false, 301);
    // header("Location:http://tacotroc.lul");
    // exit();
  }


    public static function login2(){
    echo  twp_User::login_session2($_POST['Pseudo'], $_POST['Password']);
      // header("Status: 301 Moved Permanently", false, 301);
      // header("Location:http://tacotroc.lul");
      // exit();
    }

  public static function logout(){
    twp_User::logout_session();
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:http://tacotroc.net");
    exit();
  }
}
