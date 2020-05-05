<?php
/**
* Plugin Name:Formulaire
* Description: plugging of form
* Version: 0.1
* Author: TWOP
* Author URI: tacotroc.com
*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Creating the add to menu function
function add_Menu()
{
  $page = 'formulaire';
  $menu = 'formulaire';
  $capability = 'edit_pages';
  $slug = 'formulaire';
  $function =  'form_Car';
  $icon = '';
  $position = 80;
  if(is_admin()){
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway', false );
    add_menu_page($page, $menu, $capability, $slug, $function, $icon, $position);
  }
}
function form_Car()
{
  wp_enqueue_script('jqueryAlternatif', 'https://code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_enqueue_style('AdminCarcss',plugin_dir_url( __FILE__ ).'views/Css/AdminCar.css');
    wp_enqueue_script('AdminCar',plugin_dir_url( __FILE__ ).'views/Js/AdminCar.js');
    wp_localize_script('AdminCar','ajaxurl',admin_url("admin-ajax.php"));
    require_once ('views/AdminPhpHtml/AdminCar.php');
    wp_enqueue_script('Masterjs',plugin_dir_url( __FILE__ ).'views/Js/masterjs.js');
  }
  add_action("admin_menu", "add_Menu", 10);

  function load_pop_up(){
    wp_enqueue_script('JqueryLR', 'https://code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_script("JqueryUI",'https://code.jquery.com/ui/1.12.0-rc.1/jquery-ui.js');
    wp_enqueue_script('Pop_Up',plugin_dir_url( __FILE__ ).'views/Js/Pop_Up.js');
  }
  // add_action("admin_init","load_pop_up",2);
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function getAll()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Car.php');
    require_once($route.'/entity/twp_Brand.php');
    require_once($route.'/entity/twp_Model.php');
    require_once($route.'/entity/twp_Country.php');
    require_once($route.'/entity/twp_Color.php');
    require_once($route.'/entity/twp_Version.php');
    require_once($route.'/entity/twp_Type.php');
    require_once($route.'/entity/twp_Cylinder.php');
    require_once($route.'/entity/twp_Owner.php');
    require_once($route.'/entity/twp_Museum.php');
    require_once($route.'/entity/twp_Version.php');
    require_once($route.'/entity/twp_Club.php');
    require_once($route.'/entity/twp_User.php');
    require_once($route.'/entity/twp_Serie.php');

    $arr = array(
      'ID' => twp_car::getAllId(),
      'Immatriculate' => twp_Car::getAllCarAdmin(),
      'Marque' => twp_Brand::getAllBrand(),
      'Model' => twp_Model::getAllModelConcact(),
      'Pays' => twp_Country::getAllCountry(),
      'Couleur' => twp_Color::getAllColor(),
      'Version' => twp_Version::getAllVersion(),
      'Type' => twp_Type::getAllType(),
      'Cylindrée' => twp_Cylinder::getAllCylinderConcact(),
      'Propriétaire' => twp_Owner::getAllOwnerNameConcact(),
      'Musée' => twp_Museum::getAllMuseum(),
      'Club' => twp_Club::getAllClub(),
      'Cars'=>twp_Car::getAllCar(),
      'Utilisateur'=>twp_User::getAllUser2(),
      'Serie'=>twp_Serie:: getAllSerie()
    );
    echo json_encode($arr);
    die();
  }
  add_action("wp_ajax_getAll","getAll");
  add_action("wp_ajax_nopriv_getAll","getAll");

  function getAllOwner()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Owner.php');


    $arr = twp_Owner::getTerm();

    echo json_encode($arr);
    die();
  }
  add_action("wp_ajax_getAllOwner","getAllOwner");
  add_action("wp_ajax_nopriv_getAllOwner","getAllOwner");

  function getAllrel(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Color.php');

    $arr = array(
      "Rel" => twp_Color::getallrel()
    );
    echo json_encode($arr);
    die();
  }
  add_action("wp_ajax_getAllrel","getAllrel");
  add_action("wp_ajax_nopriv_getAllrel","getAllrel");
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function getOwnerId()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Owner.php');
    $arr = twp_Owner::getOwnerById($_POST['id']);
    echo json_encode($arr);
    die();
  }
  add_action("wp_ajax_getOwnerId","getOwnerId");
  add_action("wp_ajax_nopriv_getOwnerIdr","getOwnerId");
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function recupIdCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $id = carController::recupIdcar($_POST['Immatriculate'],$_POST['id_twp_Vintage'],$_POST['id_twp_Model'],$_POST['id_twp_Version'],$_POST['id_twp_Type'],$_POST['couleur1'],$_POST['couleur2']);
    echo $id;
    die();
  }
  add_action("wp_ajax_recupIdCar","recupIdCar");
  add_action("wp_ajax_nopriv_recupIdCar","recupIdCar");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function recupCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $id = carController::readCars();
    echo json_encode($id[0]);
    die();
  }
  add_action("wp_ajax_recupCar","recupCar");
  add_action("wp_ajax_nopriv_recupCar","recupCar");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function recupInfoCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $id = carController::recupInfoCar();
    echo json_encode($id);
    die();
  }
  add_action("wp_ajax_recupInfoCar","recupInfoCar");
  add_action("wp_ajax_nopriv_recupInfoCar","recupInfoCar");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function getAllCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Car.php');
    $id = twp_Car::getAllCar2();
    echo json_encode($id);
    die();
  }
  add_action("wp_ajax_getAllCar","getAllCar");
  add_action("wp_ajax_nopriv_getAllCar","getAllCar");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  function filtrage(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $id = carController::filtrage();
    echo json_encode($id);
    die();
  }
  add_action("wp_ajax_filtrage","filtrage");
  add_action("wp_ajax_nopriv_filtrage","filtrage");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function recupModelByIdCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/modelController.php');
    $id=modelController::recupModel($_POST['id_twp_Brand']);
    echo json_encode($id);
    die();
  }
  add_action("wp_ajax_recupModelByIdCar","recupModelByIdCar");
  add_action("wp_ajax_nopriv_recupModelByIdCar","recupModelByIdCar");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function remplissageBDD(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Color.php');
    $id=twp_Color::recupIdUnique();
    echo json_encode($id);
    die();
  }
  add_action("wp_ajax_remplissageBDD","remplissageBDD");
  add_action("wp_ajax_nopriv_remplissageBDD","remplissageBDD");






  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function modifCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $id=carController::updateCar();
    echo $id;
    die();
  }
  add_action("wp_ajax_modifCar","modifCar");
  add_action("wp_ajax_nopriv_modifCar","modifCar");





  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function saveMess(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/messageController.php');
    messageController::addmessage(
      $_POST['nomP'],
      $_POST['prenomP'],
      $_POST['telP'],
      $_POST['mailP'],
      $_POST['nomI'],
      $_POST['prenomI'],
      $_POST['mailI'],
      $_POST['adresse'],
      $_POST['codeP'],
      $_POST['ville'],
      $_POST['pays'],
      $_POST['precision'],
      $_POST['idcar']
    );
    die();
  }
  add_action("wp_ajax_saveMess","saveMess");
  add_action("wp_ajax_nopriv_saveMess","saveMess");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function connexion(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/userController.php');
    $rep=userController::login();
    echo $rep;
    die();
  }
  add_action("wp_ajax_connexion","connexion");
  add_action("wp_ajax_nopriv_connexion","connexion");


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function deleteMess(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/messageController.php');
    $res=messageController::deleteMess();
    echo $res;
    die();
  }
  add_action("wp_ajax_deleteMess","deleteMess");
  add_action("wp_ajax_nopriv_deleteMess","deleteMess");

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function envoieMess(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/messageController.php');
    $res=messageController::envoieMess();
    echo $res;
    die();
  }
  add_action("wp_ajax_envoieMess","envoieMess");
  add_action("wp_ajax_nopriv_envoieMess","envoieMess");


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function deleteCar(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $res=carController::deleteCar();
    echo $res;
    die();
  }
  add_action("wp_ajax_deleteCar","deleteCar");
  add_action("wp_ajax_nopriv_deleteCar","deleteCar");
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  function getAllUser()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_user.php');
    $arr = twp_user::getAllUser();
    echo json_encode($arr);
    die();
  }
  add_action("wp_ajax_getAllUser","getAllUser");
  add_action("wp_ajax_nopriv_getAllUser","getAllUser");
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_brand()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Brand';
    $menu_title ='Gestion Marque';
    $capability ='edit_pages';
    $menu_slug ='add_brand';
    $function ='form_brand';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_brand()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Brand',plugin_dir_url( __FILE__ ).'views/Js/Brand.js');
    wp_localize_script('Brand','ajaxurl',admin_url("admin-ajax.php"));



    require_once ('views/AdminPhpHtml/addBrand.php');
  }

  add_action("wp_ajax_getAllBrand","getAllBrand");
  add_action("wp_ajax_nopriv_getAllBrand","getAllBrand");

  function getAllBrand(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Brand.php');
    $arr = twp_Brand::getAllBrand();
    echo json_encode($arr);
    die();
  }

  add_action('admin_menu','add_submenu_brand',11);


  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_Gestion_Car_2()
  {
    $parent_slug ='formulaire';
    $page_title ='Gestion Car';
    $menu_title ='Gestion Car';
    $capability ='edit_pages';
    $menu_slug ='gestion_car';
    $function ='gestion_car_2';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function gestion_car_2()
  {
    load_pop_up();
    wp_enqueue_script('JS_Gestion_Car',plugin_dir_url( __FILE__ ).'views/Js/Gestion_Car.js');
    wp_localize_script('JS_Gestion_Car','ajaxurl',admin_url("admin-ajax.php"));
    require_once ('views/AdminPhpHtml/GestionCar.php');
  }
  add_action('admin_menu','add_submenu_Gestion_Car_2',11);

  function Recup_Immat(){
    $route=$_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/carController.php');
    $immat=carController::recupImmatCar();
    echo $immat;
    die();
  }
  add_action("wp_ajax_Recup_Immat","envoieMess");
  add_action("wp_ajax_nopriv_Recup_Immat","envoieMess");

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_model()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Model';
    $menu_title ='Gestion Model';
    $capability ='edit_pages';
    $menu_slug ='add_model';
    $function ='form_Model';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Model()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_enqueue_script('Modeljs',plugin_dir_url( __FILE__ ).'views/Js/Model.js');
    wp_localize_script('Modeljs','ajaxurl',admin_url("admin-ajax.php"));
    require_once ('views/AdminPhpHtml/addModel.php');
  }
  add_action('admin_menu','add_submenu_model',12);

  function getModelBrand()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Brand.php');
    require_once($route.'/entity/twp_Model.php');

    $arr = array(
      'Marque' => twp_Brand::getAllBrand(),
      'Model' => twp_Model::getAllModelConcact(),
    );
    echo json_encode($arr);
    die();
  }
  add_action("wp_ajax_getModelBrand","getModelBrand");
  add_action("wp_ajax_nopriv_getModelBrand","getModelBrand");




  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_listCar()
  {
    $parent_slug ='formulaire';
    $page_title ='List Car';
    $menu_title ='liste Car';
    $capability ='edit_pages';
    $menu_slug ='list_car';
    $function ='test_Car';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function test_Car()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_localize_script('carJsTest','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('listcJs',plugin_dir_url( __FILE__ ).'views/Js/listcar.js');
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    require_once ('views/AdminPhpHtml/listCar.php');
  }
  add_action('admin_menu','add_submenu_listCar',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_message()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Message';
    $menu_title ='Gestion Message';
    $capability ='edit_pages';
    $menu_slug ='add_message';
    $function ='form_Message';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Message()
  {
    wp_enqueue_script('jqueryRegisterM', 'https://code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_script('jquerymoblie','https://code.jquery.com/mobile/1.5.0-rc1/jquery.mobile-1.5.0-rc1.min.js');
    wp_localize_script('AdminCar','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    require_once ('views/AdminPhpHtml/gestionMessage.php');
    wp_enqueue_script('Messagejs',plugin_dir_url( __FILE__ ).'views/Js/AdminMessage.js');
  }
  add_action('admin_menu','add_submenu_message',12);

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // function add_submenu_viewCar()
  // {
  //   $parent_slug ='formulaire';
  //   $page_title ='View Car';
  //   $menu_title ='Gestion Car';
  //   $capability ='edit_pages';
  //   $menu_slug ='view_car';
  //   $function ='form_Car2';
  //   add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  // }
  // function form_Car2()
  // {
  //   wp_enqueue_script('jqueryRegisterMc', 'https://code.jquery.com/jquery-3.4.1.min.js');
  //   wp_enqueue_script('jqueryAlternatift', 'https://code.jquery.com/ui/1.12.0/jquery-ui.min.js');
  //     wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
  //     wp_localize_script('AdminCar','ajaxurl',admin_url("admin-ajax.php"));
  //     wp_enqueue_script('carJs',plugin_dir_url( __FILE__ ).'views/Js/SupE.js');
  //     require_once ('views/AdminPhpHtml/viewCar.php');
  //   }
  //   add_action('admin_menu','add_submenu_viewCar',12);



  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_country()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Country';
    $menu_title ='Gestion Country';
    $capability ='edit_pages';
    $menu_slug ='add_country';
    $function ='form_Country';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Country()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Country',plugin_dir_url( __FILE__ ).'views/Js/Country.js');
    wp_localize_script('Country','ajaxurl',admin_url("admin-ajax.php"));
    require_once ('views/AdminPhpHtml/addCountry.php');
  }

  add_action("wp_ajax_getAllCountry","getAllCountry");
  add_action("wp_ajax_nopriv_getAllCountry","getAllCountry");

  function getAllCountry(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Country.php');
    $arr = twp_Country::getAllCountry();
    echo json_encode($arr);
    die();
  }
  add_action('admin_menu','add_submenu_country',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_color()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Color';
    $menu_title ='Gestion Couleur';
    $capability ='edit_pages';
    $menu_slug ='add_color';
    $function ='form_Color';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Color()
  {
    load_pop_up();
    wp_enqueue_script('ColorJS',plugin_dir_url( __FILE__ ).'views/Js/Color.js');
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Color',plugin_dir_url( __FILE__ ).'views/Js/Color.js');
    wp_localize_script('Color','ajaxurl',admin_url("admin-ajax.php"));

    require_once ('views/AdminPhpHtml/addColor.php');
  }
  add_action("wp_ajax_getAllColor","getAllColor");
  add_action("wp_ajax_nopriv_getAllColor","getAllColor");
  function getAllColor(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Color.php');
    $arr = twp_Color::getAllColor();
    echo json_encode($arr);
    die();
  }
  add_action('admin_menu','add_submenu_color',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_version()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Version';
    $menu_title ='Gestion Version';
    $capability ='edit_pages';
    $menu_slug ='add_version';
    $function ='form_Version';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Version()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Version',plugin_dir_url( __FILE__ ).'views/Js/Version.js');
    wp_localize_script('Version','ajaxurl',admin_url("admin-ajax.php"));


    require_once ('views/AdminPhpHtml/addVersion.php');
  }

  add_action("wp_ajax_getAllVersion","getAllVersion");
  add_action("wp_ajax_nopriv_getAllVersion","getAllVersion");
  function getAllVersion(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Version.php');
    $arr = twp_Version::getAllVersion();
    echo json_encode($arr);
    die();
  }

  add_action('admin_menu','add_submenu_version',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_type()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Type';
    $menu_title ='Gestion Type';
    $capability ='edit_pages';
    $menu_slug ='add_type';
    $function ='form_Type';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Type()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Type',plugin_dir_url( __FILE__ ).'views/Js/Type.js');
    wp_localize_script('Type','ajaxurl',admin_url("admin-ajax.php"));

    require_once ('views/AdminPhpHtml/addType.php');
  }

  add_action("wp_ajax_getAllType","getAllType");
  add_action("wp_ajax_nopriv_getAllType","getAllType");

  function getAllType(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Type.php');
    $arr = twp_Type::getAllType();
    echo json_encode($arr);
    die();
  }
  add_action('admin_menu','add_submenu_type',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_cylinder()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Cylinder';
    $menu_title ='Gestion Cylindrée';
    $capability ='edit_pages';
    $menu_slug ='add_cylinder';
    $function ='form_Cylinder';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Cylinder()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Cylinder',plugin_dir_url( __FILE__ ).'views/Js/Cylinder.js');
    wp_localize_script('Cylinder','ajaxurl',admin_url("admin-ajax.php"));

    require_once ('views/AdminPhpHtml/addCylinder.php');
  }
  add_action("wp_ajax_getAllCylinder","getAllCylinder");
  add_action("wp_ajax_nopriv_getAllCylinder","getAllCylinder");

  function getAllCylinder(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Cylinder.php');
    $arr = twp_Cylinder::getAllCylinder();
    echo json_encode($arr);
    die();
  }

  add_action('admin_menu','add_submenu_cylinder',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_owner()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Owner';
    $menu_title ='Gestion Propriétaire';
    $capability ='edit_pages';
    $menu_slug ='add_owner';
    $function ='form_Owner';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Owner()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_script('myaccountOwner',plugin_dir_url( __FILE__ ).'views/Js/Owner.js');
    wp_localize_script('myaccountOwner','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    require_once ('views/AdminPhpHtml/addOwner.php');
  }
  add_action('admin_menu','add_submenu_owner',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_museum()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Museum';
    $menu_title ='Gestion Musée';
    $capability ='edit_pages';
    $menu_slug ='add_museum';
    $function ='form_Museum';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Museum()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_script('FonctionCommune',plugin_dir_url( __FILE__ ).'views/Js/FonctionCommune.js');
    wp_localize_script('FonctionCommune','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_script('Museum',plugin_dir_url( __FILE__ ).'views/Js/Museum.js');
    wp_localize_script('Museum','ajaxurl',admin_url("admin-ajax.php"));
    require_once ('views/AdminPhpHtml/addMuseum.php');
  }
  add_action("wp_ajax_getAllMuseum","getAllMuseum");
  add_action("wp_ajax_nopriv_getAllMuseum","getAllMuseum");

  function getAllMuseum(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_Museum.php');
    $arr = twp_Museum::getAllMuseum();
    echo json_encode($arr);
    die();
  }
  add_action('admin_menu','add_submenu_museum',12);
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function add_submenu_club()
  {
    $parent_slug ='formulaire';
    $page_title ='Add Club';
    $menu_title ='Gestion Club';
    $capability ='edit_pages';
    $menu_slug ='add_club';
    $function ='form_Club';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_Club()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_script('ClubJs',plugin_dir_url( __FILE__ ).'views/Js/Club.js');
    wp_localize_script('ClubJs','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    require_once ('views/AdminPhpHtml/addClub.php');
  }
  add_action('admin_menu','add_submenu_club',12);

  function getallclub(){
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/controller/clubController.php');
    $liste=clubController::readClub();
    echo json_encode($liste);
    die();
  }
  add_action("wp_ajax_getallclub","getallclub");
  add_action("wp_ajax_nopriv_getallclub","getallclub");
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function add_submenu_user()
  {
    $parent_slug ='formulaire';
    $page_title ='Add User';
    $menu_title ='Gestion User';
    $capability ='edit_pages';
    $menu_slug ='add_user';
    $function ='form_User';
    add_submenu_page($parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function);
  }
  function form_User()
  {
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('google','https://fonts.googleapis.com/css?family=Raleway');
    require_once ('views/AdminPhpHtml/addUser.php');
  }
  add_action('admin_menu','add_submenu_user',13);


  function add_shortcode_registration()
  {
    load_pop_up();
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('registercss',plugin_dir_url( __FILE__ ).'views/Css/register.css');
    wp_enqueue_script('registerJs',plugin_dir_url( __FILE__ ).'views/Js/register.js');
    wp_localize_script('registerJs','ajaxurl',admin_url("admin-ajax.php"));
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway', false );
    require_once ('views/Html/Registration.php');
    wp_enqueue_script('masterJs',plugin_dir_url( __FILE__ ).'views/Js/masterjs.js');
  }

  add_shortcode('form_add_registration','add_shortcode_registration');

  function launchtest()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_User.php');
    $ma_variable = twp_User::testSaveUser($_POST['last_name'],$_POST['first_name'],$_POST['pseudo'],$_POST['mail'],$_POST['pass1'],$_POST['pass2'],$_POST['nation']);
    echo $ma_variable;
    die();
  }
  add_action("wp_ajax_launchtest","launchtest");
  add_action("wp_ajax_nopriv_launchtest","launchtest");

  function launchtestModif()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_User.php');
    $ma_variable = twp_User::testSaveUserModif($_POST['last_name'],$_POST['first_name'],$_POST['pseudo'],$_POST['mail'],$_POST['nation'],$_POST['nom_entreprise'],$_POST['adresse_social'],$_POST['adresse_filiale'],$_POST['siret']);  //,$_POST['pass1'],$_POST['pass2'],$_POST['nation']);
    echo $ma_variable;
    die();
  }
  add_action("wp_ajax_launchtestModif","launchtestModif");
  add_action("wp_ajax_nopriv_launchtestModif","launchtestModif");

  function launchtestModifMdp()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_User.php');
    $ma_variable = twp_User::testSaveUserModifMdp($_POST['pass']);
    echo $ma_variable;
    die();
  }
  add_action("wp_ajax_launchtestModifMdp","launchtestModifMdp");
  add_action("wp_ajax_nopriv_launchtestModifMdp","launchtestModifMdp");

  function launchtestModifMdpValide()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_User.php');
    $ma_variable = twp_User::testSaveUserModifMdpValide($_POST['pass1'],$_POST['pass2']);
    echo $ma_variable;
    die();
  }
  add_action("wp_ajax_launchtestModifMdpValide","launchtestModifMdpValide");
  add_action("wp_ajax_nopriv_launchtestModifMdpValide","launchtestModifMdpValide");

  function launchtestEntreprise()
  {
    $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
    require_once($route.'/entity/twp_User.php');
    $ma_variable = twp_User::testSaveEntreprise($_POST['nomE'],$_POST['nomC'],$_POST['prenomC'],$_POST['phone'],$_POST['siret'],$_POST['pass1'],$_POST['pass2']);
    echo $ma_variable;
    die();
  }
  add_action("wp_ajax_launchtestEntreprise","launchtestEntreprise");
  add_action("wp_ajax_nopriv_launchtestEntreprise","launchtestEntreprise");




  function add_shortcode_login()
  {
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway', false );
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_script('AdminCar',plugin_dir_url( __FILE__ ).'views/Js/masterjs.js');
    require('views/Html/Login.php');
  }
  add_shortcode('form_add_login','add_shortcode_login');


  function add_shortcode_logout()
  {
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway', false );
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_script('AdminCar',plugin_dir_url( __FILE__ ).'views/Js/masterjs.js');
    require('views/Html/Logout.php');
  }
  add_shortcode('logout','add_shortcode_logout');

  //gestion of my Accoum
  function add_my_account()
  {
    //wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('myaccount',plugin_dir_url( __FILE__ ).'views/Css/myAccount.css');
    require('views/AdminPhpHtml/myAccount.php');
  }
  add_shortcode('myAccount','add_my_account');



  //gestion of party information of myaccount
  function add_information()
  {
    wp_enqueue_script('jqueryMonCompte', 'https://code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('myaccount',plugin_dir_url( __FILE__ ).'views/Css/myAccount.css');
    wp_enqueue_script('myaccountInfo',plugin_dir_url( __FILE__ ).'views/Js/test.js');
    wp_localize_script('myaccountInfo','ajaxurl',admin_url("admin-ajax.php"));
    require('views/AdminPhpHtml/information.php');
  }
  add_shortcode('information','add_information');


  //gestion of party information of myaccount
  function test_test()
  {
    //wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
    wp_enqueue_style('myaccount',plugin_dir_url( __FILE__ ).'views/Css/myAccount.css');
    require('views/AdminPhpHtml/test_test.php');
  }
  add_shortcode('test_test','test_test');

  // formulaire carsteal
  function add_formulaire_vol(){
    //  wp_enqueue_script('icon','https://kit.fontawesome.com/1d36ad2924.js');

    wp_enqueue_script('jqueryAlternatif', 'https://code.jquery.com/jquery-3.4.1.min.js');
      wp_enqueue_style('masterCSS',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
      wp_enqueue_style('stealCSS',plugin_dir_url( __FILE__ ).'views/Css/steal.css');
      wp_enqueue_script('popupJs',plugin_dir_url( __FILE__ ).'views/Js/popup.js');
      wp_enqueue_script('masterJs',plugin_dir_url( __FILE__ ).'views/Js/masterjs.js');
      wp_enqueue_script('StealJs',plugin_dir_url( __FILE__ ).'views/Js/StealCar.js');
      wp_localize_script('StealJs','ajaxurl',admin_url("admin-ajax.php"));
      require('views/Html/CarSteal.php');
    }
    add_shortcode('formulaire_vol','add_formulaire_vol');

    //gestion of party car of myaccount
    function car_Of_Account()
    {
      //wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
      wp_enqueue_style('myaccount',plugin_dir_url( __FILE__ ).'views/Css/myAccount.css');
      require('views/AdminPhpHtml/carOfAccount.php');
    }
    add_shortcode('carOfAccount','car_Of_Account');

    function adresse_Of_Account()
    {
      //wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
      wp_enqueue_script('jqueryAdresse', 'https://code.jquery.com/jquery-3.4.1.min.js');
      wp_enqueue_style('myaccount',plugin_dir_url( __FILE__ ).'views/Css/myAccount.css');
      wp_enqueue_script('myaccountInfo',plugin_dir_url( __FILE__ ).'views/Js/Adresse.js');
      wp_localize_script('myaccountInfo','ajaxurl',admin_url("admin-ajax.php"));
      require('views/AdminPhpHtml/adresse.php');
    }
    add_shortcode('adresseaccount','adresse_Of_Account');



    //gestion of party comment of myaccount
    function comment_account()
    {
      //wp_enqueue_style('mastercss',plugin_dir_url( __FILE__ ).'views/Css/mastercss.css');
      wp_enqueue_style('myaccount',plugin_dir_url( __FILE__ ).'views/Css/myAccount.css');
      require('views/AdminPhpHtml/comment.php');
    }
    add_shortcode('comment','comment_account');



    function add_shortcode_cookie()
    {
      require('views/Html/Cookie.php');
    }
    add_shortcode('cookie','add_shortcode_cookie');


    function monprefixe_session_start()
    {
      if (! session_id())
      {
        @session_start();
      }
    }
    add_action( 'init', 'monprefixe_session_start', 1 );


    function redirection(){
      // header("Status: 301 Moved Permanently", false, 301);
      header("Location:".$_POST['url_new']);
      echo $_POST['url_new'];
      // header("Location: http://www.redirect.to.url.com/");
    }
    add_action("wp_ajax_redirection","redirection");
    add_action("wp_ajax_nopriv_redirection","redirection");
