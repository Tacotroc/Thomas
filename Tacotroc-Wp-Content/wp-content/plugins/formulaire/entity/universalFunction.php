<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');


class universalFunction
{
  //function message success
  public static function messageSucces($var){
     echo '<p style="text-align:center; font-size:20px; color:green; border:solid 1px green; background-color:#E8FBCB;margin-left:35%; margin-right:35%; margin-top:1%;">';
    if ($var==1) {
     echo "AJOUTER AVEC SUCCESS ! ";
    }
    else if ($var==2) {
      echo "SUPPRIMER AVEC SUCCES !";
    }
    else if ($var==3) {
      echo "MODIFIER AVEC SUCCES !";
    }
       echo "</p>";
  }

  //redirect to route
  public static function redirection(){
   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){

     $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   }
    else{

      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
      return $url;
  }

  //function pagination
   public static function pagination($url,$numberpage){
  // $numberpage=25;
   $points_avant=0;
   $points_apres=0;
   //Une connexion SQL doit être ouverte avant cette ligne...
   //Nous récupérons le contenu de la requête dans $retour_total
    switch ($_GET['page']) {
    case 'add_brand':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Brand');
    break;
    case 'add_club':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Club');
    break;
    case 'add_model':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Model');
    break;
    case 'add_type':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Type');
    break;
    case 'add_country':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Country');
    break;
    case 'add_color':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Color');
    break;
    case 'add_version':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Version');
    break;
    case 'add_museum':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Museum');
    break;
    case 'add_cylinder':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Cylinder');
    break;
    case 'add_owner':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Owner');
    break;
    case 'add_vintage':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Vintage');
    break;
    case 'add_user':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_User');
    break;
    case 'view_car':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Car');
    break;
    case 'add_message':
    $pagination=Model::$pdo->prepare('SELECT COUNT(id) FROM twp_Message');
    break;
    default:
    echo "oup's il y'a un problème !";}
   $pagination->execute(); //On range retour sous la forme d'un tableau.
   $row =$pagination->fetch();
   //echo "le nombre de ligne est ".$row[0].'<br>';
   $numrecords = $row[0];
   $numlinks = ceil($numrecords/$numberpage);
   if (!isset($_GET['start'])) {
     $page = 1;
   }
   else {
     $page = $_GET['start'];
   }
   $start = $page * $numberpage;
   echo '<p style="text-align:center; font-size:20px;">';
   for($i = 1; $i<=$numlinks; $i++){
     if($i<($page-2))
     {
       if($points_avant==0){
         echo"...";
         $points_avant=1;
       }
     }
     else if($i>($page+2)){
       if($points_apres==0){
         echo"...";
         $points_apres=1;
       }
     }
     else{
       if($i== $page){
            echo '<span style="color:red; border:1px solid red;">'.$i.'</span>';
       }
       else {
            echo '<a href="'.$url.'&start='.$i.'">'.$i.' </a>';
       }
     }
   }
   echo "</p>";
   return $numlinks;
 }
}
