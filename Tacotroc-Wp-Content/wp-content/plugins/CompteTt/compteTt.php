<?php

/**
 * Plugin Name: CompteTt
 * Description: Mise en place d'un système de compte et d'inscription. Gestion des utilisateurs et de leur compte. Ajout, modification, suppression, modération.
 * Author: Thomas Fortrie
 * Version: 1.0.0
 */

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . "/controller/verifConnexionController.php");
// require_once($route . "/entity/twp_user_compte.php");



////////////////////////////////////////////////////////////////////////////////////////
// Démarrage de la Session
add_action('init', 'session_start_compte', 1);

function session_start_compte()
{
  if (!session_id()) {
    session_start();
  } else {
    session_start();
  }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Creating the add to menu function
function add_Menu_Compte()
{
  $page = 'compteTt';
  $menu = 'Comptes';
  $capability = 'edit_pages';
  $slug = 'compte';
  $function =  'adminCompte';
  $icon = 'dashicons-smiley';
  $position = 80;
  if (is_admin()) {

    add_menu_page($page, $menu, $capability, $slug, $function, $icon, $position);
  }
}
function adminCompte()
{
  wp_enqueue_style('compteCss', plugin_dir_url(__FILE__) . 'views/css/adminCompte.css');
  wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'views/js/jquery-3.4.1.min.js');
  wp_enqueue_script('btnConnectedJs', plugin_dir_url(__FILE__) . 'views/js/adminCompteJs.js');
  require_once('views/html/adminCompte.php');
}
add_action("admin_menu", "add_Menu_Compte", 10);

////////////////////////////////////////////////////////////////////////////
// Short Code Bouton MON COMPTE
add_shortcode('btnMonCompte', 'boutonMonCompte');

function boutonMonCompte()
{
  if (
    isset($_SESSION['connected']) &&
    $_SESSION['connected'] == "ok" &&
    $_SESSION['nom']
  ) {
    wp_enqueue_style('btnConnectedCss', plugin_dir_url(__FILE__) . 'views/css/btnConnected.css');
    wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'views/js/jquery-3.4.1.min.js');
    wp_enqueue_script('btnConnectedJs', plugin_dir_url(__FILE__) . 'views/js/btnConnected.js');
    wp_localize_script('btnConnected', 'ajaxurl', admin_url("admin-ajax.php"));

    require_once 'views/html/btnMonCompteConnected.php';
  } else {
    wp_enqueue_style('btnCss', plugin_dir_url(__FILE__) . 'views/css/btnCss.css');
    wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'views/js/jquery-3.4.1.min.js');
    wp_enqueue_script('btnCss', plugin_dir_url(__FILE__) . 'views/js/btnCss.js');
    wp_localize_script('btnCss', 'ajaxurl', admin_url("admin-ajax.php"));
    require_once 'views/html/btnMonCompte.php';
  }
}

////////////////////////////////////////////////////////////////////////
// SHORT CODE PAGE MON COMPTE

add_shortcode('myAccountPage', 'myAccountPageFunction');

function myAccountPageFunction()
{
  wp_enqueue_style('myAccountPageCss', plugin_dir_url(__FILE__) . 'views/css/MyAccountPageCss.css');
  wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'views/js/jquery-3.4.1.min.js');
  wp_enqueue_script('jQueryValidate', plugin_dir_url(__FILE__) . 'views/js/jquery.validate.min.js');
  wp_enqueue_script('myAccountPageJs', plugin_dir_url(__FILE__) . 'views/js/myAccountPageJs.js');
  wp_localize_script('myAccountPageJs','ajaxurl',admin_url("admin-ajax.php"));

  require_once 'views/html/myAccountPage.php';
}

////////////////////////////////////////////////////////////////////////
add_shortcode('activationPage', 'activationPageFunction');

function activationPageFunction()
{
  wp_enqueue_style('activationPageCss', plugin_dir_url( __FILE__) . 'views/css/activationPageCss.css');
  wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'views/js/jquery-3.4.1.min.js');  
  wp_enqueue_script('jQueryValidate', plugin_dir_url(__FILE__) . 'views/js/jquery.validate.min.js');
  wp_enqueue_script('activationPageJs', plugin_dir_url(__FILE__) . 'views/js/activationPageJs.js');

  require_once 'views/html/activation.php';
}






////////////////////////////////////////////////////////////////////////
// Short code formulaire d'inciption

add_shortcode('formInscription', 'page_formulaire_inscription');

function page_formulaire_inscription()
{

  wp_enqueue_style('formInscriptionCss', plugin_dir_url(__FILE__) . 'views/css/formInscriptionCss.css');
  wp_enqueue_script('jQuery', plugin_dir_url(__FILE__) . 'views/js/jquery-3.4.1.min.js');
  wp_enqueue_script('jQueryValidate', plugin_dir_url(__FILE__) . 'views/js/jquery.validate.min.js');
  wp_enqueue_script('formInscriptionJs', plugin_dir_url(__FILE__) . 'views/js/formInscriptionJs.js');


  require_once 'views/html/formInscription.php';
}



/////////////////////////////////////////////////////////
// Utilisation du HOOK WP_HEAD

add_action('wp_head', 'includeAccountSystemHeader');

function includeAccountSystemHeader()
{
  boutonMonCompte();
}


//////////////////////////////////////////////////
// Vérification de la connexion
function areYouConnected()
{
  if ($_SESSION['connected'] && $_SESSION['connected'] == true) {
  }
}





// APPEL AJAX POUR RECUPERER LES USERS EXISTANTS
add_action("wp_ajax_getExisting", "getExisting");
add_action("wp_ajax_nopriv_getExisting", "getExisting");

function getExisting()
{
  $route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
  require_once($route . '/entity/twp_user_compte.php');
  $arr = Compte_User::getExistingAccount();
  echo json_encode($arr);
  
}


// APPEL AJAX POUR RECUPERER LES USERS SELON CRITERES
add_action("wp_ajax_getUserBySearch", "getUserBySearch");
add_action("wp_ajax_nopriv_getUserBySearch", "getUserBySearch");

function getUserBySearch()
{
  // $arr = [];
  $route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
  require_once($route . '/entity/Compte_User.php');
  $temp = Compte_User::getAccountBySearch($_POST['input'], $_POST['searchCritere']);
  
  echo json_encode($temp);
  die();
  
}
// APPEL AJAX POUR RECUPERER LES USERS SELON CRITERES
add_action("wp_ajax_searchImmat", "searchImmat");
add_action("wp_ajax_nopriv_searchImmat", "searchImmat");

function searchImmat()
{
  // $arr = [];
  $route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
  require_once($route . '/entity/Compte_User.php');
  $temp = Compte_User::searchImmat($_POST['immatInput']);
  
  echo json_encode($temp);
  die();
  
}

// APPEL AJAX POUR DELETE UN USER SELON SON ID
add_action("wp_ajax_deleteUserById", "deleteUserById");
add_action("wp_ajax_nopriv_deleteUserById", "deleteUserById");

function deleteUserById()
{
  $route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
  require_once($route . '/entity/Compte_User.php');
  $temp = Compte_User::deleteAccountById($_POST['userIdToDelete']);
  
  echo json_encode($temp);
  die();
  
}

  
  
// }
