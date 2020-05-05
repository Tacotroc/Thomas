<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Club.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage de tous les clubs  -->
<?php $vuclub = twp_Club::getAllClubLIMIT();?>
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
  <title>AdminClub</title>
</head>
<body>
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="form" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="club">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter un club</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Name" placeholder="ajouter un club " required></p>
      <div class="flex_centre">
        <input type="submit" class="btn btn-success" name="btn-brand" value="Valider">
      </div>
    </div>
  </form><br><br>

  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form_modif" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="modifier_club">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">modifier un club existant</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="input_modif_club" name="input_modif_club" placeholder="Club à modifier" required></p>
      <p class="ligne"><label class="labelcategorie" for="input_New_Nom">Nouveau Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="input_New_Nom" name="input_New_Nom" placeholder="le club à modifier" required></p>
      <div class="flex_centre">
        <input type="button" class="new_bouton" id="button_modif" name="button_modif" value="Modifier">
      </div>
      <input type="hidden" name="hidden_id" id="hidden_id" value="">
    </div>
  </form><br><br>

  <h1 class="titre">Liste de marque disponible</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <?php foreach($vuclub as $club): ?>
      <tbody>
        <tr>
          <td><?= $club->Name; ?></td>
          <td>
            <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php">
              <input type="hidden" name="type" value="supprimer_club">
              <input type="hidden" name="id" value="<?= $club->id; ?>">
              <input type="hidden" name="url" value="<?php echo $url; ?>">
              <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $club->Name; ?>?')">
            </form></td>
            <td><a href="/wp-content/plugins/formulaire/controller/routeur2.php?id=<?= $club->id; ?>&Name=<?= $club->Name; ?>&type=modifier_club" class="btn btn-info">Modifier</a></td>
          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>


    <!-- affichage pagination --->
    <?php FonctionCommune::selectpage(); ?>

<div id="dialog" title="Erreur/Alerte">

</div>



  </body>
  </html>
