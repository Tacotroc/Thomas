<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Vintage.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage des années   -->
<?php $anciennete = twp_Vintage::getAllVintageLIMIT();?>
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
  <title>AdminVintage</title>
</head>
<body>
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="form" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="vintage">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ancienneté</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Ancienneté </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Mk" placeholder="l'ancienneté de votre voiture" required></p>
      <div class="flex_centre">
        <input type="submit" class="btn btn-success" name="btn-anciennete" value="Valider">
      </div>
    </div>
  </form><br><br>

  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="form" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="modifier_vintage">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">modifier l'année existante</h1>
      <select class="champ_input" name="id" id="inputNom" >
        <option>--Selectionner une date--</option>
        <?php foreach($anciennete as $vintage): ?>
          <option value="<?= $vintage->id; ?>">
            <?= $vintage->Mk; ?>
          </option>
        <?php endforeach; ?>
      </select>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Name" placeholder=" l'année à modiier" required></p>
      <div class="flex_centre">
        <input type="submit" class="btn btn-info" name="btn-brand" value="Modifier">
      </div>
    </div>
  </form><br><br>

  <h1 class="titre">Ancienneté des voitures</h1>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <?php foreach($anciennete as $vintage): ?>
      <tbody>
        <tr>
          <td><?= $vintage->Mk; ?></td>
          <td> <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php">
            <input type="hidden" name="type" value="supprimer_vintage">
            <input type="hidden" name="id" value="<?= $vintage->id; ?>">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $vintage->Mk; ?>?')">
          </form></td>
          <td><a href="/wp-content/plugins/formulaire/controller/routeur2.php?id=<?= $vintage->id; ?>&Name=<?= $vintage->Mk; ?>&type=modifier_vintage" class="btn btn-info">Modifier</a></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>


<!-- affichage pagination --->
<?php FonctionCommune::selectpage(); ?>


</html>
