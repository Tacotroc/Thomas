<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Model.php');

class modelController {

  //action readAll : read all users
  public static function readModel(){
    return twp_Model::getAllModel();
    return twp_Model::getAll2Model();

  }

  public static function recupModel($n){
    return twp_Model::getAllModelByIdCar($n);
  }


  public static function UpdateModelAdmin(){
    twp_Model::updateModelAdmin($_POST["model_id"],$_POST["new_model"],$_POST["new_brand"]);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
  }

  //action created : create an user in a database
  // public static function addModel(){
  //   twp_Model::saveModel($_POST['Name'], $_POST['id_twp_Brand'],$_POST['url']);
  //   header("Status: 301 Moved Permanently", false, 301);
  //   header("Location:".$_POST['url']."&reussit=1");
  //   exit();
  // }
  // action created : create an user in a database
  public static function addModel(){
    twp_Model::saveModel($_POST['model_name'], $_POST['brand_id']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  //action delete : model join add brand
  public static function deleteModel(){
    twp_Model::deleteModel($_POST['id_rel'],$_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }
  public static function readModel3(){
  return twp_Model::getAllModelWithId();
    // header("Status: 301 Moved Permanently", false, 301);
    // header("Location:http://tacotroc.net/wp-admin/admin.php?page=add_model");
    // exit();
  }

  //action update : model in database
    public static function updateModel(){
      twp_Model::updateModel($_POST['id'], $_POST['Name'], $_POST['id_twp_Brand'],$_POST['url']);
      header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url']."&reussit=3");
      exit();
    }
}
