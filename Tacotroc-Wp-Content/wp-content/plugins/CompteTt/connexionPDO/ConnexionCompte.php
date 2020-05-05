<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/CompteTt/configuration/conf.php');

class ConnexionCompte
{
  public static $pdo;

  public static function Init ()
  {
    $hostname = Config::getHostname ();
    $database = Config::getDatabase ();
    $login = Config::getLogin ();
    $password = Config::getPassword();
    try{
      self::$pdo = new PDO("mysql:host=$hostname;dbname=$database",$login,$password,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

      // on active le mode affichage des erreurs et le lancement d'exception en cas d'erreur
      self ::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch (PDOException $e){
      echo $e->getMessage ();//affiche un message d'erreur
      die();
    }
  }
}


ConnexionCompte::Init();
