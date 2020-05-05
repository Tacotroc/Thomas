<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/controller/modelController.php');
require_once($route.'/entity/twp_Brand.php');
require_once($route.'/entity/twp_Model.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage de tous les modeles et marques -->
<?php
$marque = twp_Brand::getAllBrand();
$model =  twp_Model::getAllModelLIMIT();
$model2 =  twp_Model::getAllModel();
?>
<!-- redirection des pages -->
<?php  $url=universalFunction::redirection(); ?>
<!-- affichage message de de success -->
<?php
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
}
else {
  echo " ";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>AdminModel</title>
</head>
<body>
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formAddModel" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="model">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter le modele</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Modele</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Name" placeholder="Saisissez le model de votre voiture " required></p>
<!--
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Marque</label><abbr> *</abbr></p>
       <select class="champ_input" name="id_twp_Brand" id="inputNom" >
        <option>--Selectionner une marque--</option>
        <?php foreach($marque as $brand): ?>
          <option value="<?= $brand->id; ?>">
            <?= $brand->Name; ?>
          </option>
        <?php endforeach; ?>
      </select>
        -->
      <p class="ligne"><label class="labelcategorie" for="input_Brand"> Marque</label><abbr> *</abbr></p>
    <p class="ligne"><input type="text" name="input_Brand" id="input_Brand" class="champ_input" value=""></input></p>

      <div class="flex_centre">
        <input type="button" class="new_bouton" name="btn-model" id="AddModelButton" value="Ajouter">
      </div>
      <input type="hidden" name="type" value="add_model">
        <input type="hidden" name="url" value="<?php echo $url; ?>">
        <input type="hidden" name="model_name" id="model_name" value="">
        <input type="hidden" name="brand_id" id="brand_id" value="">
    </div>
  </form>

  <div class="formulaire">
    <h1 class="titre">Modifier un modéle existant</h1>
    <p class="ligne"><label class="labelcategorie" for="select_model">Modéle a modifier</label></p>
    <p class="ligne"><input type="text" name="select_model" id="select_model" class="champ_input" value=""></input></p>

    <div class="flex_centre">
      <button type="button" name="button" class="new_bouton" id="Button_Info">Afficher les information</button>
    </div>

    <div class="information_car" style="display: none;">
      <br>
      <hr>
      <p class="ligne"><label class="labelcategorie" for="info_marque">Marque lié au modéle</label></p>
      <p class="ligne"><input type="text" name="info_marque" id="info_marque" class="champ_input" value=""></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_model">Modéle</label></p>
      <p class="ligne"><input type="text" name="info_model" id="info_model" class="champ_input" value=""></input></p>

      <div class="flex_centre">
        <button type="button" name="button_envoie" id="button_envoie" class="new_bouton">Envoyer les données</button>
      </div>

      <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form_modification" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="type" value="modif_model">
        <input type="hidden" name="url" value="<?php echo $url; ?>">
        <input type="hidden" name="model_id" id="model_id" value="">
        <input type="hidden" name="new_model" id="new_model" value="">
        <input type="hidden" name="new_brand" id="new_brand" value="">
      </form>

    </div>

  </div>

  <h1 class="titre">Liste de modele et marque disponible</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Modele</th>
        <th scope="col">Marque</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <?php foreach( $model as $mod):?>
      <tbody>
        <tr>
          <td><?= $mod->twp_Model; ?></td>
          <td><?= $mod->twp_Brand; ?></td>
          <td><!-- <a onclick="return confirm('vous ètes sure de supprimer </?= $mod->twp_Model; ?> et </?= $mod->twp_Brand; ?>?')" href="/wp-content/plugins/formulaire/controller/routeur2.php?twp_Model=</?= $mod->twp_Model; ?>&type=supprimer_model" class="btn btn-danger">Supprimer</a> -->
            <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php">
              <input type="hidden" name="type" value="supprimer_model">
              <input type="hidden" name="id_rel" value="<?= $mod->id; ?>">
              <input type="hidden" name="url" value="<?php echo $url; ?>">
              <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $mod->twp_Model; ?> et <?= $mod->twp_Brand; ?>?')">
            </form></td>
          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>

    <!-- affichage pagination --->
    <?php FonctionCommune::selectpage(); ?>

  </body>
  </html>
