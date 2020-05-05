<?php
$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/formulaire';
require_once($route . '/entity/twp_Version.php');
require_once($route . '/entity/universalFunction.php');
require_once($route . '/entity/FonctionCommune.php');
?>
<!-- affichage de tous les versions -->
<?php $vuVersion = twp_Version::getAllVersionLIMIT();
$version = twp_Version::getAllVersion(); ?>

<!-- redirection des pages -->
<?php $url = universalFunction::redirection(); ?>
<!-- affichage message de de success -->
<?php
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
} else {
  echo " ";
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>AdminVersion</title>
</head>

<body>

  <!-- ____________________________________________________ -->
  <!-- ____________________________________________________ -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formAddVersion" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="addversion">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter la version</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Version</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNewName" name="Name" placeholder="Entrer la version de votre voiture" required></p>
      <div class="flex_centre">
        <input type="button" id="buttonNewName" class="new_bouton" name="btn-version" value="Valider">
      </div>
    </div>
  </form><br><br>

  <!-- ____________________________________________________ -->
  <!-- ____________________________________________________ -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModifVersion" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="modifier_version">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">modifier la version existante</h1>
      <p class="ligne"><label class="labelcategorie" for="id"> Nom</label><abbr> *</abbr></p>

<input type="text" id="oldNameVersion" name="id" class="champ_input" placeholder="La version à modifier">


      <p class="ligne"><label class="labelcategorie" for="Name">Nouveau Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="NameReplace" name="Name" placeholder="Le nouveau nom de la version" required></p>


      <div class="flex_centre">
        <input type="hidden" id="idAModifier">
        <input type="button" class="new_bouton" id="buttonModifNameVersion" name="btn-brand" value="Modifier">
      </div>
    </div>
  </form><br><br>

  <!-- ____________________________________________________________ -->
  <!-- ____________________________________________________________ -->

  <h1 class="titre">Liste de versions disponible</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">SUPPRESSION</th>
      </tr>
    </thead>
    <?php foreach ($vuVersion as $version) : ?>
      <tbody>
        <tr>
          <td><?= $version->Name; ?></td>
          <td>
            <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php">
              <input type="hidden" name="type" value="supprimer_version">
              <input type="hidden" name="id" value="<?= $version->id; ?>">
              <input type="hidden" name="url" value="<?php echo $url; ?>">
              <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $version->Name; ?>?')">
            </form>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>


<!-- affichage pagination --->
<?php FonctionCommune::selectpage(); ?>

</html>
