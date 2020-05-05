<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Museum.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage de tous les musées -->
<?php $vuMusee = twp_Museum::getAllMuseumLIMIT();?>

<!-- redirection des pages -->
<?php  $url=universalFunction::redirection();?>
<!-- affichage message de de success -->
<?php
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
}
else {
  echo " ";
}?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>AdminMuseum</title>
</head>
<body>

<!-- _____________________________________________________________________ -->
<!-- _____________________________________________________________________ -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="formAddMuseum" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="musee">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter un musée</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom">Entrez le nom du musée</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNewMuseum" name = "Name" placeholder="Ajouter un musée" required></p>
      <div class="flex_centre">
        <input type="button" class="new_bouton" name="btn-musee" id="btnAddMuseum" value="Valider">
      </div>
    </div>
  </form>
</body>
</html><br><br>

<!-- _____________________________________________________________________ -->
<!-- _____________________________________________________________________ -->
<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="formModifMuseum" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="modifier_musee">
  <input type="hidden" name="url" value="<?php echo $url; ?>">
  <div class="formulaire">
    <h1 class="titre">modifier un musée existant</h1>
    <select class="champ_input" name="id" id="selectMuseum" >
      <option>--Selectionner un musée--</option>
      <?php foreach($vuMusee as $musee): ?>
        <option value="<?= $musee->id; ?>">
          <?= $musee->Name; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputModifMuseum" name = "Name" placeholder=" le musée à modifier" required></p>
    <div class="flex_centre">
      <input type="button" class="new_bouton" id="btnModifMuseum" name="btn-brand" value="Modifier">
    </div>
  </div>
</form><br><br>

<!-- _____________________________________________________________________ -->
<!-- _____________________________________________________________________ -->
<h1 class="titre">Liste de musée disponible</h1>
<?php FonctionCommune::nombreparpage(); ?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach($vuMusee as $musee): ?>
    <tbody>
      <tr>
        <td><?= $musee->Name; ?></td>
        <td> <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php">
          <input type="hidden" name="type" value="supprimer_musee">
          <input type="hidden" name="id" value="<?= $musee->id; ?>">
          <input type="hidden" name="url" value="<?php echo $url; ?>">
          <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $musee->Name; ?>?')">
        </form></td>
        </tr>
    </tbody>
  <?php endforeach; ?>
</table>


<!-- affichage pagination --->
<?php FonctionCommune::selectpage(); ?>

</body>
</html>
