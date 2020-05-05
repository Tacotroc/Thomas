<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Brand.php');
 //$url = universalFunction::redirection();

class brandController {

  //action readAll : read all users
  public static function readBrand(){
    twp_Brand::showBrand();

    // header("Status: 301 Moved Permanently", false, 301);
    // header("Location:http://tacotroc.net/wp-admin/admin.php?page=add_brand");
    // exit();
    //return twp_Brand::getAllBrand();
  }

  //action created : create an user in a database
  public static function addBrand(){
    twp_Brand::saveBrand($_POST['Name']);
     header("Status: 301 Moved Permanently", false, 301);
     header("Location:".$_POST['url']."&reussit=1");
     exit();
  }

  //action delete : brand in database
  public static function deleteBrand(){
    twp_Brand::deleteBrand($_POST['id'],$_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=2");
    exit();
  }

//action update : brand in database
  public static function updateBrand(){
    $newName = strtoupper($_POST['newName']);
    twp_Brand::updateBrand($_POST['idModifBrand'],$newName,$_POST['url']);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=3");
    exit();
  }
  public static function AllMyBrand(){
    twp_Brand::getAllBrand();
  }
}
