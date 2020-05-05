<?php
error_reporting(-1);
ini_set('display_errors', 'On');
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');
require_once($route.'/entity/universalFunction.php');


class FonctionCommune
{
  public static function nombreparpage(){
    $url=universalFunction::redirection();
    if(isset($_GET['affichage'])){
      $valeurParPage = $_GET['affichage'];
    }
    else {
      $valeurParPage = 25;
    }
    echo '<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="nbrparpage" enctype="application/x-www-form-urlencoded">';
    echo '<input type="hidden" name="type" value="nbrpage">';
    echo '<input type="hidden" name="url" value="'.$url.'">';
    echo'<p>Nombre d\'élément par page :<select name="choix_nbr_page" id="selecteur_nbr">';
    if ($valeurParPage == 5){
      echo '<option value="5" selected>5</option>';
    }
    else {
      echo '<option value="5">5</option>';
    }
    if ($valeurParPage == 10){
      echo '<option value="10" selected>10</option>';
    }
    else {
      echo '<option value="10">10</option>';
    }
    if ($valeurParPage == 15){
      echo '<option value="15" selected>15</option>';
    }
    else {
      echo '<option value="15">15</option>';
    }
    if ($valeurParPage == 25){
      echo '<option value="25" selected>25</option>';
    }
    else {
      echo '<option value="25">25</option>';
    }
    if ($valeurParPage == 50){
      echo '<option value="50" selected>50</option>';
    }
    else {
      echo '<option value="50">50</option>';
    }
    if ($valeurParPage == 100){
      echo '<option value="100" selected>100</option>';
    }
    else {
      echo '<option value="100">100</option>';
    }
    echo '</select></p>';
    echo '<input type="submit"></input>';
    echo '</form>';
  }

  public static function selectpage(){
    $scroll = 0;
    if(isset($_GET['affichage'])){
      $valeurParPage = $_GET['affichage'];
    }
    else {
      $valeurParPage = 25;
    }
    $startscroll = 1;
    $endscroll= $valeurParPage;
    $page=1;
    $url=universalFunction::redirection();
    switch ($_GET['page']) {
      case 'add_brand':
      $requete_nom='SELECT Name FROM twp_Brand';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Brand');
      break;
      case 'add_club':
      $requete_nom='SELECT Name FROM twp_Club ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Club');
      break;
      case 'add_model':
      $requete_nom='SELECT Name FROM twp_Model ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Model');
      break;
      case 'add_type':
      $requete_nom='SELECT Name FROM twp_Type ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Type');
      break;
      case 'add_country':
      $requete_nom='SELECT Name FROM twp_Country ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Country');
      break;
      case 'add_color':
      $requete_nom='SELECT Name FROM twp_Color ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Color');
      break;
      case 'add_version':
      $requete_nom='SELECT Name FROM twp_Version ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Version');
      break;
      case 'add_museum':
      $requete_nom='SELECT Name FROM twp_Museum ORDER BY Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Museum');
      break;
      case 'add_cylinder':
      $requete_nom='SELECT Cylinder as Name FROM twp_Cylinder ORDER BY Cylinder';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Cylinder');
      break;
      case 'add_owner':
      $requete_nom='SELECT Last_Name as Name FROM twp_Owner ORDER BY Last_Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Owner');
      break;
      case 'add_vintage':
      $requete_nom='SELECT Name FROM twp_Vintage';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Vintage');
      break;
      case 'add_user':
      $requete_nom='SELECT Last_Name as Name FROM twp_User ORDER BY Last_Name';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_User');
      break;
      case 'view_car':
      $requete_nom='SELECT Immatriculation as Name FROM twp_Car ORDER BY id DESC';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Car');
      break;
      case 'add_message':
      $requete_nom='SELECT dateV as Name FROM twp_Message ORDER BY id DESC';
      $requete_nombre=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Car');
      break;
      default:
      echo "Pagination Non-définie";}
      $requete_nombre->execute();
      $tableau_valeur=$requete_nombre->fetch();
      $nombreValeur=$tableau_valeur[0];
      $rep = Model::$pdo->query($requete_nom);
      $rep->setFetchMode (PDO::FETCH_OBJ);
      $tableau_nom=$rep->fetchAll();
      echo '<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="redirection" enctype="application/x-www-form-urlencoded">';
      echo'<select name="choix_page" id="selecteur_page">';
      while ($scroll < $nombreValeur){
        // echo '<option>Page '.$page.' = '.$tableau_nom[$startscroll-1].' - '.$tableau_nom[$endscroll-1].'</option>';
        if ($page == $_GET['start']){
          echo '<option value='.$page.' selected>Page '.$page.' = '.$tableau_nom[$startscroll-1]->Name.' - '.$tableau_nom[$endscroll-1]->Name.'</option>';
        }
        else {
          echo '<option value='.$page.'>Page '.$page.' = '.$tableau_nom[$startscroll-1]->Name.' - '.$tableau_nom[$endscroll-1]->Name.'</option>';
        }
        $startscroll+=$valeurParPage;
        $scroll+=$valeurParPage;
        $endscroll+=$valeurParPage;
        if($endscroll> $nombreValeur){
          $endscroll = $nombreValeur;
        }
        $page+=1;
      }
      echo '<input type="hidden" name="type" value="redirection">';
      echo '<input type="hidden" name="url" value="'.$url.'">';
      echo '</select>';
      echo '<input type="submit"></input>';
      echo '</form>';
    }
  }
