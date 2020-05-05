<?php
error_reporting(-1);
ini_set('display_errors', 'On');
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/controller/';
require_once($route.'clubController.php');
require_once($route.'brandController.php');
require_once($route.'colorController.php');
require_once($route.'paysController.php');
require_once($route.'cylinderController.php');
require_once($route.'museeController.php');
require_once($route.'versionController.php');
require_once($route.'typeController.php');
require_once($route.'proprietaireController.php');
require_once($route.'modelController.php');
require_once($route.'userController.php');
require_once($route.'messageController.php');
require_once($route.'carController.php');
//require_once($route.'commentController.php');



//gestion des routings
if (isset($_POST['type'])){
  switch ($_POST['type']){
        // route for club
    case 'start':
    clubController::pagination();
    break;
    case 'club':
    clubController::addClub();
    break;
    case 'supprimer_club':
    clubController::deleteClub();
    break;
    case 'modifier_club':
    clubController::updateClub();
    break;
        // route for brand
    case 'brand':
    brandController::addBrand();
    break;
    case 'supprimer_brand':
    brandController::deleteBrand();
    break;
    case 'modifier_brand':
    brandController::updateBrand();
    break;
        // route for color
    case 'color':
    colorController::addColor();
    break;
    case 'supprimer_color':
    colorController::deleteColor();
    break;
    case 'modifier_color':
    colorController::updateColor();
    break;
        // route for country
    case 'pays':
    paysController::addCountry();
    break;
    case 'supprimer_pays':
    paysController::deleteCountry();
    break;
    case 'modifier_pays':
    paysController::updateCountry();
    break;
      // route for cylinder
    case 'cylinder':
    cylinderController::addCylinder();
    break;
    case 'supprimer_cylinder':
    cylinderController::deleteCylinder();
    break;
    case 'modifier_cylinder':
    cylinderController::updateCylinder();
    break;
      // route for museum
    case 'musee':
    museeController::addMuseum();
    break;
    case 'supprimer_musee':
    museeController::deleteMuseum();
    break;
    case 'modifier_musee':
    museeController::updateMuseum();
    break;
        // route for version
    case 'addversion':
    versionController::addVersion();
    break;
    case 'supprimer_version':
    versionController::deleteVersion();
    break;
    case 'modifier_version':
    versionController::updateVersion();
    break;
    //route for type
    case 'type':
    typeController::addType();
    break;
    case 'supprimer_type':
    typeController::deleteType();
    break;
    case 'modifier_type':
    typeController::updateType();
    break;
    //route for owner
    case 'owner':
    proprietaireController::addOwner();
    break;
    case 'supprimer_owner':
    proprietaireController::deleteOwner();
    break;
    case 'modifier_owner':
    proprietaireController::updateOwner();
    break;
    //route for model
    case 'model':
    modelController::addModel();
    break;
    case 'supprimer_model':
    modelController::deleteModel();
    break;
    case 'modifier_model':
    modelController::updateModel();
    break;
    //route for user
    case 'supprimer_user':
    userController::deleteUser();
    break;
    case 'modifier_user':
    userController::updateUser();
    break;
    //route for car
    case 'supprimer_car':
    carController::deleteCar();
    break;

    default:
    //dans le cas ou le type n'est pas un des type prévu => on bloque le user sur une page inutile
    echo'route invalide !';
  }
}
