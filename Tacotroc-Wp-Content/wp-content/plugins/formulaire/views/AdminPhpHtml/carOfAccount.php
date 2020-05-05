<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/controller/brandController.php');
require_once($route.'/entity/twp_Car.php');
require_once($route.'/entity/twp_Model.php');
require_once($route.'/entity/twp_Color.php');
require_once($route.'/entity/twp_Cylinder.php');
require_once($route.'/entity/twp_Country.php');
require_once($route.'/entity/twp_Club.php');
require_once($route.'/entity/twp_Museum.php');
require_once($route.'/entity/twp_Serie.php');
require_once($route.'/entity/twp_Type.php');
require_once($route.'/entity/twp_Version.php');
require_once($route.'/entity/twp_User.php');
require_once($route.'/entity/twp_Brand.php');
require_once($route.'/model/model.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../Css/myAccount.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />


  <!--inclusion of navbar-->
  <?php require('myAccount.php')?>


  <title>Mon-compte</title>
</head>
<body class="voitures">
  <h2><p>Mes voitures</p></h2>
  <div class="info_voitures">

    <?php $articles = twp_Car::getAllCarByIdtest(unserialize($_SESSION['User'])->getId());foreach ($articles as $article): ?>


      <div class="formulaire" id="myColor" >
          <article>

          <div class="containerVoiture">


            <div class="colVoiture">

              <h5><z><p><strong>Model: </strong><?php  $article0 = twp_Model::getAllModelWithId(); twp_Car::getCarInfos($article0,$article->id_twp_Model,'Model')?></p>

                <p><strong>Immatriculation: </strong> <?php echo $article->Immatriculation ?></p>
                <p><strong>Commentaire:  </strong><?php echo $article->Comment ?></p>
                <p><strong>Année</strong> <?php echo $article->Years ?> </p>
                <p><strong>Couleurs:  </strong> <?php  $article1 = twp_Color::getAllColor() ;twp_Car::getCarInfos($article1,$article->Details_Color_1,'')?> , <?php $article2 = twp_Color::getAllColor() ;twp_Car::getCarInfos($article2,$article->Details_Color_2,'Color')?></p>
                <p><strong>Restoration: </strong> <?php echo $article->Restoration  ?></p>
                <p><strong>Utilisateur:  </strong> <?php  $article3 = twp_User::getAllUser();twp_Car::getCarInfos($article3,$article->id_twp_User,'User')?></p>

                <p><strong>Version </strong>: <?php  $article5 = twp_Version::getAllVersion()  ;twp_Car::getCarInfos($article5,$article->id_twp_Version,'')?></p>
                <p><strong>Type: </strong> <?php  $article6 = twp_Type::getAllType() ;twp_Car::getCarInfos($article6,$article->id_twp_Type,'')?></p>
                <p><strong>Cylindre: </strong> <?php  $article7 = twp_Cylinder::getAllCylinder() ;twp_Car::getCarInfos($article7,$article->id_twp_Cylinder,'Cylinder')?></p>
                <p><strong>Pays:  </strong><?php  $article8 = twp_Country::getAllCountry() ;twp_Car::getCarInfos($article8,$article->id_twp_Country,'')?></p>
                <p><strong>Museum:  </strong> <?php  $article9 = twp_Museum::getAllMuseum();twp_Car::getCarInfos($article9,$article->id_twp_Museum,'')?></p>
                <p><strong>Club:  </strong> <?php  $article10 = twp_Club::getAllClub() ;twp_Car::getCarInfos($article10,$article->id_twp_Club,'')?></p></z></h5>
              </div>
              <div class="colVoitureImg">
                <div class="img_voitures">
                  <img src="https://previews.123rf.com/images/iulian0507/iulian05071610/iulian0507161000160/63900900-tr%C3%A8s-belle-voiture-ancienne-avec-une-vue-de-l-int%C3%A9rieur-au-festival-de-voitures-anciennes.jpg" width:"100" height:"100">
                </div>
              </div>

            </div>


          </article>
        </div>
      </br>
    <?php endforeach ?>





  </div>

</body>
</html>
