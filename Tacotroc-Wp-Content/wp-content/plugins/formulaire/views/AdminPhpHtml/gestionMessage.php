<?php

$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Message.php');
require_once($route.'/entity/twp_Car.php');
require_once($route.'/model/model.php');
require_once($route.'/controller/brandController.php');
require_once($route.'/entity/twp_Car.php');
require_once($route.'/entity/twp_Model.php');
require_once($route.'/entity/twp_Color.php');
require_once($route.'/entity/twp_Serie.php');
require_once($route.'/entity/twp_Type.php');
require_once($route.'/entity/twp_Version.php');
require_once($route.'/entity/twp_Brand.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- redirectin to route  -->
<?php
$url=universalFunction::redirection();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>GestionMessage</title>
</head>

<body>


  <?php
  $messageT = twp_message::getAllMessage();
  $messageF=[];
  ?>


  <h1 class="titre">Recherche par filtre</h1>

  <input type="hidden" id="verif" value=false>

  <p class="ligne"><input id="myInput" type="text"  class="champ_input" placeholder="minimun 3 caractère ...."></p>
  <div id="test">

    <table class="table" border="1px" id="table">

      <thead class="thead-dark">
        <tr>
          <th scope="col">date</th>
          <th scope="col">Anonceur</th>
          <th scope="col">Propietaire</th>
          <th scope="col">Localisation</th>
          <th scope="col">Vehicule</th>
          <th scope="col">validation</th>
          <th scope="col">refus</th>
        </tr>
      </thead>


      <?php foreach($messageT as $mess): ?>

        <tbody id="recherche">
          <tr>
            <td>
              <?= $mess->datev; ?>
              <p> <strong>  </strong></p>
            </td>
            <td>
              <p> <strong>Nom: </strong> <?= $mess->nomI; ?></p>
              <p>   <strong>Prenom: </strong> <?= $mess->prenomI; ?></p>
              <p>   <strong>Mail: </strong> <?= $mess->mailI; ?></p>
            </td>
            <td>
              <p>   <strong>Nom: </strong> <?= $mess->prenomP; ?>
                <p><strong>Prenom: </strong><?= $mess->nomP; ?></p>
                <p><strong>Mail: </strong><?= $mess->mailP; ?></p>
                <p><strong>Telephone: </strong><?= $mess->telP; ?></p>
              </td>
              <td>
                <p> <strong>Adresse: </strong> <?= $mess->adresse; ?></p>
                <p> <strong>Ville: </strong> <?= $mess->ville; ?></p>
                <p> <strong>Code Postal: </strong> <?= $mess->codeP; ?></p>
                <p> <strong>Pays: </strong>   <?= $mess->pays; ?></p>
                <p> <strong>precision: </strong> <?= $mess->description; ?></p>

              </td>

              <td>


                <?php
                $article=twp_car::getAllCarByIdtest2($mess->id_tw_car);
                ?>

                <h5><z>
                  <p><strong>Immatriculation: </strong> <?php echo $article[0]->Immatriculation ?></p>
                  <p><strong>Model: </strong><?php  $article0 = twp_Model::getAllModelWithId();    twp_Car::getCarInfos($article0,$article[0]->id_twp_Model,'Model');?></p>
                  <p><strong>Année</strong> <?php echo $article[0]->Years ?> </p>
                  <p><strong>Couleurs:  </strong> <?php  $article1 = twp_Color::getAllColor() ;twp_Car::getCarInfos($article1,$article[0]->Details_Color_1,'')?> , <?php $article2 = twp_Color::getAllColor() ;twp_Car::getCarInfos($article2,$article[0]->Details_Color_2,'Color')?></p>
                  <p><strong>Version </strong>: <?php  $article5 = twp_Version::getAllVersion()  ;twp_Car::getCarInfos($article5,$article[0]->id_twp_Version,'')?></p>
                  <p><strong>Type: </strong> <?php  $article6 = twp_Type::getAllType() ;twp_Car::getCarInfos($article6,$article[0]->id_twp_Type,'')?></p>


                </td>
                <td>
                  <div id="envoieMessage">

                    <input type="button" class="bouton_envoie" value="envoie" name="envoie message"  id="<?= $mess->id?>" onclick="envoiMess( this)">
                  </div>
                </td>
                <td>
                  <div id="<?= $mess->id;?>" >
                    <input type="hidden" name="id_twp_car" value="<?= $mess->id_tw_car?>">
                    <input type="hidden" name="id" value="<?= $mess->id;?>">
                    <input type="hidden" name="url" value="<?php echo $url; ?>">
                    <input type="button" class="btn btn-danger" value="Supprimer" name="<?= $mess->id;?>" onclick="suppresionmess(this)">
                  </div>
                </td>

              </tr>
            </tbody>
          <?php endforeach; ?>
        </table>
      </div>



      <br><br>

      <div id="test2">


        <hr>
        <h1 class="titre">Liste des signalement de vol </h1>

        <?php FonctionCommune::nombreparpage(); ?>
        <div id="rechargement">
          <?php $message = twp_message::getAllMessageLIMIT(5);?>

          <table class="table" border="1px" id="table">

            <thead class="thead-dark">
              <tr>
                <th scope="col">date</th>
                <th scope="col">Anonceur</th>
                <th scope="col">Propietaire</th>
                <th scope="col">Localisation</th>
                <th scope="col">Vehicule</th>
                <th scope="col">validation</th>
                <th scope="col">refus</th>
              </tr>
            </thead>
            <?php foreach($message as $mess): ?>

              <tbody>
                <tr>
                  <td>
                    <?= $mess->datev; ?>
                    <p> <strong>  </strong></p>
                  </td>
                  <td>
                    <p> <strong>Nom: </strong> <?= $mess->nomI; ?></p>
                    <p>   <strong>Prenom: </strong> <?= $mess->prenomI; ?></p>
                    <p>   <strong>Mail: </strong> <?= $mess->mailI; ?></p>
                  </td>
                  <td>
                    <p>   <strong>Nom: </strong> <?= $mess->prenomP; ?>
                      <p><strong>Prenom: </strong><?= $mess->nomP; ?></p>
                      <p><strong>Mail: </strong><?= $mess->mailP; ?></p>
                      <p><strong>Telephone: </strong><?= $mess->telP; ?></p>
                    </td>
                    <td>
                      <p> <strong>Adresse: </strong> <?= $mess->adresse; ?></p>
                      <p> <strong>Ville: </strong> <?= $mess->ville; ?></p>
                      <p> <strong>Code Postal: </strong> <?= $mess->codeP; ?></p>
                      <p> <strong>Pays: </strong> <?php if ($mess->pays!="pays"): ?>
                        <?= $mess->pays; ?></p>
                      <?php else: ?>
                        non defini</p>
                      <?php endif; ?>
                      <p> <strong>precision: </strong> <?= $mess->description; ?></p>

                    </td>

                    <td>


                      <?php
                      $article=twp_car::getAllCarByIdtest2($mess->id_tw_car);

                      ?>

                      <h5><z>
                        <p><strong>Immatriculation: </strong> <?php echo $article[0]->Immatriculation ?></p>
                        <p><strong>Model: </strong><?php  $article0 = twp_Model::getAllModelWithId();    twp_Car::getCarInfos($article0,$article[0]->id_twp_Model,'Model');?></p>
                        <p><strong>Année</strong> <?php echo $article[0]->Years ?> </p>
                        <p><strong>Couleurs:  </strong> <?php  $article1 = twp_Color::getAllColor() ;twp_Car::getCarInfos($article1,$article[0]->Details_Color_1,'')?> , <?php $article2 = twp_Color::getAllColor() ;twp_Car::getCarInfos($article2,$article[0]->Details_Color_2,'Color')?></p>
                        <p><strong>Version </strong>: <?php  $article5 = twp_Version::getAllVersion()  ;twp_Car::getCarInfos($article5,$article[0]->id_twp_Version,'')?></p>
                        <p><strong>Type: </strong> <?php  $article6 = twp_Type::getAllType() ;twp_Car::getCarInfos($article6,$article[0]->id_twp_Type,'')?></p>


                      </td>
                      <td>
                        <div id="envoieMessage">

                          <input type="button" class="bouton_envoie" value="envoie" name="envoie message"  id="<?= $mess->id?>" onclick="envoiMess( this)">
                        </div>
                      </td>
                      <td>
                        <div id="<?= $mess->id;?>" >
                          <input type="hidden" name="id_twp_car" value="<?= $mess->id_tw_car?>">
                          <input type="hidden" name="id" value="<?= $mess->id;?>">
                          <input type="hidden" name="url" value="<?php echo $url; ?>">
                          <input type="button" class="btn btn-danger" value="Supprimer" name="<?= $mess->id;?>" onclick="suppresionmess(this)">
                        </div></td>

                      </tr>
                    </tbody>
                  <?php endforeach; ?>
                </table>
              </div>
              <!-- affichage pagination --->
              <?php
              if (!isset($_GET['start'])){
                $next = 1;
              }
              else{
                $next = $_GET['start'];
              }
              $suivant = $next + 1;
              $precedent = $next - 1;?>
              <div id="pagination">
                <?php  if($next==1){
                  echo " ";
                }
                else {
                  echo'<a href="'.$url.'&start='.$precedent.'" class="previous">&laquo; Previous</a>';
                }  ?>
                <?php $numlinks= universalFunction::pagination($url,5);?>

                <?php if ($next==$numlinks) {
                  echo " ";
                }
                else {
                  echo'<a href="'.$url.'&start='.$suivant.'" class="next">Next &raquo;</a>';
                }?>
              </div>
            </div>
              <?php FonctionCommune::selectpage(); ?>


          </body>
          </html>
