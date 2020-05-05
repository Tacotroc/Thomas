<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Car.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/controller/colorController.php');
class carController {

  //action readAll : read all users
  public static function addCar(){
    return twp_Car::saveCar();
  }

  public static function recupImmatCar(){
    return twp_Car::GetAllCarImmat();
  }

  public static function updateCarAdmin(){
    twp_Car::UpdateCarAdmin($_POST["envoie_id"],$_POST["envoie_club"],$_POST["envoie_musée"],$_POST["envoie_pays"],$_POST["envoie_propriétaire"],$idtSerie,$_POST["envoie_cylindre"],$_POST["envoie_type"],$_POST["envoie_version"],$_POST["envoie_brand_model"],$_POST["envoie_annee"]);
    header("Status: 301 Moved Permanently", false, 301);
    header("Location:".$_POST['url']."&reussit=1");
    exit();
  }

  public static function filtrage(){
    $str='SELECT distinct c.id, Immatriculation, Comment, Details_Color_1, Details_Color_2, Restoration, id_twp_User, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Serie, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club FROM twp_Car c,rel_car_color r, twp_Color col WHERE c.id=r.id  and r.id_twp_Color=col.id ';
    if(  $_POST['filter']!=null){
      $str.=" and Immatriculation like '%".$_POST['filter']."%'";
    }
    if(  $_POST['filter2']!=null){
      $str.=" and Years like '%".$_POST['filter2']."%'";
    }
    if(  $_POST['filter3']!=null){
      $str.=" and id_twp_User in (SELECT id from twp_User WHERE CONCAT(Last_Name, First_Name, Pseudo, Mail,Phone)   like '%".$_POST['filter3']."%')";
    }
    if(  $_POST['filter4']!=null){
      $str.=" and r.id_twp_Color in (SELECT id from twp_Color WHERE Name  like '%".$_POST['filter4']."%')";
    }
    if(  $_POST['filter5']!=null){
      $str.=" and r.id_twp_Color in (SELECT r.id from twp_Color  WHERE  Name  like '%".$_POST['filter4']."%')";
    }
    if(  $_POST['filter6']!=null){
      $str.=" and id_twp_Model in (SELECT id from twp_Model WHERE id_twp_Brand in(SELECT id from twp_Brand WHERE Name like '%".$_POST['filter6']."%'))";
    }
    if(  $_POST['filter7']!=null){
      $str.=" and id_twp_Model in (SELECT id from twp_Model WHERE  Name like '%".$_POST['filter7']."%')";
    }
    if(  $_POST['filter8']!=null){
      $str.=" and id_twp_Version in (SELECT id from twp_Version WHERE  Name like '%".$_POST['filter8']."%')";
    }
    if(  $_POST['filter9']!=null){
      $str.=" and id_twp_Type in (SELECT id from twp_Type WHERE  Name like '%".$_POST['filter9']."%')";
    }
    if(  $_POST['filter10']!=null){
      $str.=" and id_twp_Cylinder in (SELECT id from twp_Cylinder WHERE  Cylinder like '%".$_POST['filter10']."%')";
    }
    if(  $_POST['filter11']!=null){
      $str.=" and id_twp_Serie in (SELECT id from twp_Serie WHERE  Name like '%".$_POST['filter11']."%')";
    }
    if(  $_POST['filter12']!=null){
      $str.=" and id_twp_Owner in (SELECT id from twp_Owner WHERE CONCAT(Last_Name,First_Name,Compagny,Siret,Compagny_Name,Phone)   like '%".$_POST['filter3']."%')";
    }
    if(  $_POST['filter13']!=null){
      $str.=" and id_twp_Country in (SELECT id from twp_Country  WHERE  Name like '%".$_POST['filter13']."%')";
    }
    if(  $_POST['filter14']!=null){
      $str.=" and id_twp_Museum in (SELECT id from twp_Museum  WHERE  Name like '%".$_POST['filter14']."%')";
    }
    if(  $_POST['filter15']!=null){
      $str.=" and id_twp_Club in (SELECT id from twp_Club  WHERE  Name like '%".$_POST['filter15']."%')";
    }
    $id= twp_Car::getAllCarByIdtest4($str);

    return $id;
  }

  public static function recupInfoCar(){
    $str="SELECT c.id, c.Immatriculation, c.Comment, c.Restoration,c.Years,col.Name as id_twp_Color ";
    $str1=" FROM twp_Car c, rel_car_color co , twp_Color col";
    $str2=" WHERE 1 and c.id=co.id  and col.id in(co.id_twp_Color,null)";
    if( $_POST['user']!=null && $_POST['user']!=0){
      $str.=",u.Last_Name, u.First_Name, u.Pseudo, u.Mail, u.Phone";
      $str1.=", twp_User u";
      $str2.=" and c.id_twp_User=u.id ";
    }
    if( $_POST['model']!=null && $_POST['model']!=0){
      $str.=",m.Name as Model,b.Name as Brand";
      $str1.=", twp_Model m ,twp_Brand b";
      $str2.=" and c.id_twp_Model=m.id and m.id_twp_Brand=b.id ";
    }
    if( $_POST['version']!=null && $_POST['version']!=0){
      $str.=",v.Name as Version";
      $str1.=", twp_Version v";
      $str2.=" and  c.id_twp_Version=v.id ";
    }
    if( $_POST['type']!=null && $_POST['type']!=0){
      $str.=",t.Name as Type";
      $str1.=", twp_Type t";
      $str2.=" and  c.id_twp_Type=t.id ";
    }
    if( $_POST['cylindre']!=null && $_POST['cylindre']!=0){
      $str.=",Cylinder";
      $str1.=", twp_Cylinder cy";
      $str2.=" and  c.id_twp_Cylinder=cy.id ";
    }
    if( $_POST['serie']!=null && $_POST['serie']!=0){
      $str.=",s.Name as Serie";
      $str1.=", twp_Serie s";
      $str2.=" and  c.id_twp_Serie=s.id ";
    }
    if( $_POST['owner']!=null && $_POST['owner']!=0){
      $str.=",o.Last_Name as nom, o.First_Name as prenom , o.Phone as tel";
      $str1.=", twp_Owner o";
      $str2.=" and  c.id_twp_Owner=o.id ";
    }
    if( $_POST['musee']!=null && $_POST['musee']!=0){
      $str.=",mu.Name as Museum";
      $str1.=", twp_Museum mu";
      $str2.=" and  c.id_twp_Museum=mu.id ";
    }
    if( $_POST['club']!=null && $_POST['club']!=0){
      $str.=",cl.Name as Club";
      $str1.=", twp_Club cl";
      $str2.=" and  c.id_twp_Club=cl.id ";
    }
    if( $_POST['pays']!=null && $_POST['pays']!=0){
      $str.=",p.Name as Country ";
      $str1.=", twp_Country p";
      $str2.=" and  c.id_twp_Country=p.id ";
    }
    $str2.=" and c.id=".$_POST['id'];
    $str.=$str1.$str2;
   $id= twp_Car::getAllCarByIdtest5($str);
    return $id;
  //  var_dump($str);
  }


  public static function addCarAdmin(){
    return twp_Car::saveCarAdmin(
      $_POST['idcar'],
      $_POST['Immatriculate'],
      $_POST['Annee'],
      $_POST['id_twp_Model'],
      $_POST['id_twp_Version'],
      $_POST['id_twp_Type'],
      $_POST['id_twp_Cylinder'],
      $_POST['id_twp_Owner'],
      $_POST['id_twp_Country'],
      $_POST['id_twp_Museum'],
      $_POST['id_twp_Club']
    );
  }
  public static function updateCar(){
    twp_Car::updatecar(
      $_POST['id'],
      $_POST['immatv'],
      $_POST['years'],
      $_POST['idm'],
      $_POST['idv'],
      $_POST['idt'],
      $_POST['idcy'],
      $_POST['ids'],
      $_POST['ido'],
      $_POST['idp'],
      $_POST['idmu'],
      $_POST['idcl'],
      $_POST['commentaire'],
      $_POST['idu'],
      $_POST['restauration']);
      twp_Color::updateColorRel(
        $_POST['id'],
        $_POST['couleur1'],
        $_POST['idc1'],
        $_POST['couleur2'],
        $_POST['idc2']);
      }



      public static function readCars(){
        $id= twp_Car::getAllCarByIdtest3($_POST['id']);
        // $car=twp_Car::getCarFinal($_POST['id']);
        return $id;
      }

      //function delete car
      public static function deleteCar(){
        twp_color::deleteColorREl($_POST['id_twp_car']);
        twp_Car::deleteCar2($_POST['id_twp_car']);
        exit();
      }
      //methode qui verifie l'existence du vehicule en bdd , l'ajoute si necessaire et renvoie son id
      public static function recupIdcar( $Immatriculate,$id_twp_Vintage,$id_twp_Model,$id_twp_Version,$id_twp_Type,$couleur1,$couleur2){
        $verif1=twp_Car::verifCarAll(
          $Immatriculate,
          $id_twp_Vintage,
          $id_twp_Model,
          $id_twp_Version,
          $id_twp_Type,
          $couleur1,
          $couleur2
        );

        $verif2=twp_Car::getCarByImmat(
          $Immatriculate
        );



        if($verif2==[]){
          $idr=twp_Car::saveCarVol($Immatriculate,$id_twp_Vintage, $id_twp_Model, $id_twp_Version,$id_twp_Type, $couleur1, $couleur2 );
          $idd= $idr[0];
          $idd2= $idr[0];
          colorController::addcouleurAdmin2($idd->id,$couleur1,$couleur2);
          echo $idd2->id;
        }
        else{
          if ($verif1==$verif2 ) {
            $idd= $verif2[0];

            echo $idd->id;
          }
          else{
            echo "erreur" ;
          }

        }

      }


    }
