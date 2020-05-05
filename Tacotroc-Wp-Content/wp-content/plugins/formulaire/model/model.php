<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/configuration/conf.php');

class Model
{
  public static $pdo;

  public static function Init ()
  {
    $hostname = conf::getHostname ();
    $database = conf::getDatabase ();
    $login = conf::getLogin ();
    $password = conf::getPassword();
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
Model::Init();
