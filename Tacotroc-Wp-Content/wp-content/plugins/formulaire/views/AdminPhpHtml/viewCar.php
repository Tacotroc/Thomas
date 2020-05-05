<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Car.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/twp_Brand.php');
require_once($route.'/entity/twp_Model.php');
require_once($route.'/entity/twp_User.php');
require_once($route.'/entity/twp_Version.php');
require_once($route.'/entity/twp_Type.php');
require_once($route.'/entity/twp_Cylinder.php');
require_once($route.'/entity/twp_Owner.php');
require_once($route.'/entity/twp_Country.php');
require_once($route.'/entity/twp_Museum.php');
require_once($route.'/entity/twp_Club.php');
require_once($route.'/entity/twp_Serie.php');
require_once($route.'/entity/twp_Color.php');
require_once($route.'/entity/FonctionCommune.php');
//require_once($route.'/entity/twp_Serie.php');
?>
<!-- redirection des pages -->
<?php  $url=universalFunction::redirection();

// affichage message success
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
}
else {
  echo " ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>view car </title>
</head>
<body>
  <div id="rechargement">
    <?php $car = twp_Car::getAllCarLIMIT();
    $article0 = twp_Model::getAllModelWithIdOderByBrand();
    $article1 = twp_Color::getAllColor();
    $article5 = twp_Version::getAllVersion()  ;
    $article6 = twp_Type::getAllType() ;
    $article7 = twp_Cylinder::getAllCylinder() ;
    $article8 = twp_Country::getAllCountry() ;
    $article9 = twp_Museum::getAllMuseum();
    $article10 = twp_Club::getAllClub() ;
    $article11=twp_Owner:: getAllOwnerName();
    $article12=twp_Serie:: getAllSerie();
    $article13=twp_User:: getAllUser();
    ?>


    <div class="formulaire" >

      <form method="POST" name="modifform"  id="form" enctype="application/x-www-form-urlencoded">
        <div id="choix vehicule">


          <h1 class="titre">choix du véhicule à modifier </h1>

          <p class="ligne"> <input  class="champ_input" name="id" id="inputImmatV" placeholder="saisissez la plaque d'immatriculation du véhicule"  ></p>

        <div class="flex_centre">
          <button type="button" ="selection" class="bouton_envoie" id="confirm">selection</button>
        </div>
        <input type="hidden" name="type" value="modifier_Car">
        <input type="hidden" name="url" value="<?php echo $url; ?>">
        <div id="modifcar" style="display: none;">


        <hr>
        <h1 class="titre">modification à effectuer sur le vehicule </h1>
        <p class="ligne"><input type="text" class="champ_input" value="" id="inputImmat" name = "immatv" placeholder=" immatriculation du vehicule à modifier" required></p>

        <select class="champ_input" name="idc1" id="inputcouleur1" required>
          <option value=NULL>--Selectionner la premiere couleur --</option>
          <?php foreach($article1 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idc2" id="inputcouleur2" >
          <option value=NULL>--Selectionner la deuxieme couleur --</option>
          <?php foreach($article1 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idm" id="inputModel" required>
          <option value=NULL>--Selectionner le Modèle du véhicule --</option>
          <?php foreach($article0 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->twp_Brand; ?> ->  <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idv" id="inputVersion" >
          <option value=NULL>--Selectionner la version du véhicule --</option>
          <?php foreach($article5 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idt" id="inputType" >
          <option value=NULL>--Selectionner le type du véhicule --</option>
          <?php foreach($article6 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idcy" id="inputCylinder" required >
          <option value=NULL>--Selectionner le Cylindre du véhicule --</option>
          <?php foreach($article7 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Cylinder; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="ids" id="inputSerie" >
          <option value=NULL>--Selectionner la serie du véhicule --</option>
          <?php foreach($article12 as $type1):    ;?>
            <option value="<?= $type1['id']; ?>">
              <?=$type1['Name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idu" id="inputUser" required>
          <option value=NULL>--Selectionner l'utilisateur ayant enregister le véhicule --</option>
          <?php foreach($article13 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->First_Name; ?>  <?=$type1->Last_Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="ido" id="inputOwner" required>
          <option value=NULL>--Selectionner le Propriétaire du véhicule --</option>
          <?php foreach($article11 as $type1):    ;?>
            <option value="<?= $type1['id']; ?>">
              <?=$type1['First_Name']; ?>  <?=$type1['Last_Name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idp" id="inputCountry" required >
          <option value=NULL>--Selectionner le Pays du véhicule --</option>
          <?php foreach($article8 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idmu" id="inputMusee" >
          <option value=NULL>--Selectionner le Musée du véhicule --</option>
          <?php foreach($article9 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br><br>
        <select class="champ_input" name="idcl" id="inputClub" >
          <option value=NULL>--Selectionner le Club du véhicule --</option>
          <?php foreach($article10 as $type1):    ;?>
            <option value="<?= $type1->id; ?>">
              <?=$type1->Name; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <br>
        <p class="ligne"><input type="text" class="champ_input" value="" id="inputYears" name="years" placeholder=" année du vehicule à modifier"></p>
        <p>Etat de la restauration :</p>
        <p class="ligne">1:<input type="radio" class="champ_input" value="1" id="restauration" name = "restauration" checked="checked" />  0:  <input type="radio" class="champ_input" value="0" id="restaurationf" name = "restauration"/>  </p>
        <textarea  rows="6"  cols="50" id="commentaire"  placeholder="information complémentaire sur le véhicule ..."/></textarea>


        <div class="flex_centre">
          <input type="submit" class="bouton_envoie" name="btn-brand" value="Modifier">
        </div>
      </div>
        </div>
    </form>
  </div>
  <br><hr><br>
  <h1 class="titre">Liste de véhicules disponible en BDD</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <br>
  <table class="table">


    <thead class="thead-dark">
      <tr>
        <th scope="col">Immatriculation</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Restoration</th>
        <th scope="col">User</th>
        <th scope="col">Année</th>
        <th scope="col">Couleur1</th>
        <th scope="col">Couleur2</th>
        <th scope="col">Marque</th>
        <th scope="col">Modéle</th>
        <th scope="col">Version</th>
        <th scope="col">Type</th>
        <th scope="col">Cylindrée</th>
        <th scope="col">Serie</th>
        <th scope="col">Propriétaire</th>
        <th scope="col">Pays</th>
        <th scope="col">Musée</th>
        <th scope="col">Club</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <?php foreach( $car as $cars):?>

      <tbody>
        <tr>
          <td><?= $cars->Immatriculation; ?></td>
          <td><?= $cars->Comment; ?></td>
          <td><?= $cars->Restoration; ?></td>
          <td><?php if ($cars->id_twp_User==null): ?>
            <?php  $user=twp_User:: getUserById(0);?>
          <?php else: ?>
            <?php  $user=twp_User:: getUserById($cars->id_twp_User);?>
          <?php endif; ?>
          <p><strong>Nom : </strong><?php if ($user !=[]): ?>
            <?= $user[0]->Last_Name ;?></p>
          <?php endif; ?>
          <p><strong>Prenom: </strong>
            <?php if ($user !=[]): ?>
              <?= $user[0]->First_Name  ;?></p>
            <?php endif; ?>
            <p><strong>Pseudo : </strong>
              <?php if ($user !=[]): ?>
                <?= $user[0]->Pseudo ; ?> </p>
              <?php endif; ?>
              <p><strong>Mail :  </strong>
                <?php if ($user !=[]): ?>
                  <?= $user[0]->Mail  ;?></p>
                <?php endif; ?>
                <p><strong>Phone : </strong>
                  <?php if ($user !=[]): ?>
                    <?= $user[0]->Phone  ;?></p>

                  <?php endif; ?>
                </td>
                <td><?= $cars->Years; ?></td>
                <?php  $color=twp_Color::getDetailColor($cars->id); ?>
                <?php var_dump($color);?>
                <td>  <p> <?php twp_Car::getCarInfos($article1,$color[0]->id_twp_Color,'')?></p></td>
                <td>  <p> <?php twp_Car::getCarInfos($article1,$color[1]->id_twp_Color,'Color')?></p></td>
                <?php  $article0 = twp_Model::getAllModelWithId();?>
                <td>  <?php twp_Car::getCarInfos($article0,$cars->id_twp_Model,'brand');?></td>
                <td><?php twp_Car::getCarInfos($article0,$cars->id_twp_Model,'model');?></td>
                <td> <?php twp_Car::getCarInfos($article5,$cars->id_twp_Version,'')?></td>
                <td><?php twp_Car::getCarInfos($article6,$cars->id_twp_Type,'')?></td>
                <td> <?php twp_Car::getCarInfos($article7,$cars->id_twp_Cylinder,'Cylinder')?></td>
                <td><?php $serie=twp_Serie::getSerieById($cars->id_twp_Serie) ;?>
                  <?php if ($serie !=[]): ?>
                    <?=$serie[0]->name;?>
                  <?php endif; ?></td>
                  <td>

                    <?php $user2=twp_Owner:: getOwnerById($cars->id_twp_Owner);?>

                    <p><strong>Nom : </strong><?php if ($user2 !=[]): ?>
                      <?= $user2[0]->Last_Name ;?></p>
                    <?php endif; ?>
                    <p><strong>Prenom: </strong>
                      <?php if ($user2 !=[]): ?>
                        <?= $user2[0]->First_Name  ;?></p>
                      <?php endif; ?>
                      <p><strong>Phone : </strong>
                        <?php if ($user2 !=[]): ?>
                          <?= $user2[0]->Phone  ;?></p>

                        <?php endif; ?>
                      </td>
                      <td><?php  twp_Car::getCarInfos($article8,$cars->id_twp_Country,'')?></td>
                      <td><?php twp_Car::getCarInfos($article9,$cars->id_twp_Museum,'')?></td>
                      <td><?php  twp_Car::getCarInfos($article10,$cars->id_twp_Club,'')?></td>

                      <td>
                        <div name="<?= $cars->id;?>" >
                          <input type="button" class="btn btn-danger" value="Supprimer" name="<?= $cars->id;?>" onclick="suppresionCar(this)">
                        </div>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>

              <!-- affichage pagination --->
              <?php
              if (!isset($_GET['start'])){
                $next = 1;
              }
              else{
                $next = $_GET['start'];
              }
              ?>
              <?php FonctionCommune::selectpage(); ?>
              <!--  </?php require_once($route.'/views/AdminPhpHtml/universalView.php');?>-->
            </body>
            </html>
