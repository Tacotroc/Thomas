<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Country.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage de tous les pays -->
<?php $vupays = twp_Country::getAllCountryLIMIT();?>

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
  <title>AdminCountry</title>
</head>

<body>
  <!-- ____________________________________________________________________________ -->
  <!-- ____________________________________________________________________________ -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formAddCountry" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="addCountry">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter un pays</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Pays</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name="Name" placeholder="ajouter un pays" required></p>
      <div class="flex_centre">
        <input type="button" id="addNewCountry" class="new_bouton" name="btn-brand" value="Valider">
      </div>
    </div>
  </form><br><br>

  <!-- ____________________________________________________________________________ -->
  <!-- ____________________________________________________________________________ -->

  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModifCountry" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="modifier_pays">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">modifier un pays existant</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNomModif"> Pays à modifier</label><abbr> *</abbr></p>

      <input type="text" name="inputNomModif" id="inputNomModif" class="champ_input" value="" placeholder="le pays à modifier">

      <p class="ligne"><label class="labelcategorie" for="inputNom">Nouveau nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputName" name = "Name" placeholder="Nouveau nom du pays"  required></p>
      <div class="flex_centre">

<input type="hidden" name="id" id="id" value="">

        <input type="button" class="new_bouton" id="btnModifCountry" name="btn-brand" value="Modifier">
      </div>
    </div>
  </form><br><br>


<!-- _______________________________________________________________________________ -->
<!-- _______________________________________________________________________________ -->

  <h1 class="titre">Liste de pays disponible</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">SUPPRESSION</th>
      </tr>
    </thead>
    <?php foreach($vupays as $pays): ?>
      <tbody>
        <tr>
          <td><?= ucwords($pays->Name); ?></td>
          <td> <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php">
            <input type="hidden" name="type" value="supprimer_pays">
            <input type="hidden" name="id" value="<?= $pays->id; ?>">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $pays->Name; ?>?')">
          </form></td></tr>
      </tbody>
    <?php endforeach; ?>
  </table>

  <!-- affichage pagination --->
  <?php FonctionCommune::selectpage(); ?>


</body>
</html>
