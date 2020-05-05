<?php
error_reporting(-1);
ini_set('display_errors', 'On');
$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/formulaire/controller/';
require_once($route . 'userController.php');
require_once($route . 'carController.php');
require_once($route . 'colorController.php');
require_once($route . 'cylinderController.php');
require_once($route . 'brandController.php');
require_once($route . 'nationController.php');
require_once($route . 'paysController.php');
require_once($route . 'adresseController.php');
require_once($route . 'typeController.php');
require_once($route . 'carController.php');
require_once($route . 'versionController.php');
require_once($route . 'adresse_socialController.php');
require_once($route . 'proprietaireController.php');
require_once($route . 'foncController.php');
require_once($route . 'modelController.php');
require_once($route.'clubController.php');


//gestion du routing
if (isset($_POST['type'])) {
  switch ($_POST['type']) {
    case 'voiture':
      carController::addCarAdmin();
      colorController::addcouleurAdmin();
      break;
    case 'modifier_owner':
      proprietaireController::updateOwner();
      break;
      case 'modifier_club':
        clubController::updateClub();
        break;
      case 'modif_model':
        modelController::UpdateModelAdmin();
        break;
      case 'Update_car_admin':
      colorController::updateColorAdmin();
      carController::updateCarAdmin();
      break;
      //route of user
    case 'inscription':
      userController::addUser();

      break;
    case 'inscriptionEntreprise':
      userController::addUserEntreprise();
      break;

    case 'connexion':
      userController::login();
      break;

    case 'deconnexion':
      userController::logout();
      break;

    case 'modifier_user':
      userController::updateUser();
      break;

    case 'modifier_user_session':
      userController::updateUserSession();
      break;

    case 'modifier_user_session_mdp':
      userController::updateUserMdp();
      break;

    case 'nationChoix':
      nationController::nationChoix();
      break;

    case 'adresseadd':
      adresseController::addAdresse();
      break;

    case 'redirection':
      foncController::redirect();
      break;

    case 'nbrpage':
      foncController::redirectnbr();
      break;

    case 'add_model':
      modelController::addModel();
      break;

      // route for brand
    case 'add_brand':
      brandController::addBrand();
      break;
    case 'supprimer_brand':
      brandController::deleteBrand();
      break;
    case 'modifier_brand':
      brandController::updateBrand();
      break;


      // route for country
    case 'addCountry':
      paysController::saveCountry();
      break;
    case 'supprimer_pays':
      paysController::deleteCountry();
      break;
    case 'modifier_pays':
      paysController::updateCountry();
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
    case 'add_type':
      typeController::addType();
      break;
    case 'supprimer_type':
      typeController::deleteType();
      break;
    case 'modifier_type':
      typeController::updateType();
      break;

      // route for cylinder
    case 'addCylinder':
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
    default:
      //dans le cas ou le type n'est pas un des type prévu => on bloque le user sur une page inutile
      echo 'route invalide !';
  }
}
