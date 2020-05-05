<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Color.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage de tous les couleurs -->
<?php $vucouleur = twp_Color::getAllColorLIMIT();?>

<!-- redirection des pages -->
<?php  $url=universalFunction::redirection();?>

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>AdminColor</title>
</head>
<body>
  <button type="button" name="button" id="button_random_test">Click me !</button>
  <div id="Grey_Filter" class="Grey_Filter" style="display:none"></div>

  <div id="pop_up" style="display:none">
    <p id="pop_up_msg">Useless Text</p>
  </div>

  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="form" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="color">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter une Couleur</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Type couleur</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNewNom" name = "Name" placeholder="Saisissez votre couleur" required></p>
      <div class="flex_centre">
        <input type="button" class="new_bouton" name="btn-color" id="AddNewColorButton" value="Valider">
      </div>
    </div>
  </form>
  </html><br><br>

  <!-- form update  -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModif" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="modifier_color">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">modifier une couleur existante</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
      <select class="champ_input" name="id" id="selectColor" >
        <option>--Selectionner une couleur--</option>
        <?php foreach($vucouleur as $color): ?>
          <option value="<?= $color->id; ?>">
            <?= ucwords($color->Name); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <p class="ligne"><label class="labelcategorie" for="inputNom">Nouveau Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputModifNameColor" name = "Name" placeholder=" la couleur  à modiier" required></p>
      <div class="flex_centre">
        <input type="button" class="new_bouton" id="buttonModif" name="btn-brand" value="Modifier">
      </div>
    </div>
  </form><br><br>


  <h1 class="titre">Liste de couleur disponible</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th  style="text-align: center" scope="col">Name</th>
        <th  style="text-align: center" scope="col">SUPPRESSION</th>
      </tr>
    </thead>
    <?php foreach($vucouleur as $color): ?>
      <tbody>
        <tr style="text-align: center">
          <td><?= ucwords($color->Name); ?></td>
          <td> <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php">
            <input type="hidden" name="type" value="supprimer_color">
            <input type="hidden" name="id" value="<?= $color->id; ?>">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $color->Name; ?>?')">
          </form></td>
          </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
  <!-- affichage pagination --->
  <?php FonctionCommune::selectpage(); ?>



</body>
</html>
