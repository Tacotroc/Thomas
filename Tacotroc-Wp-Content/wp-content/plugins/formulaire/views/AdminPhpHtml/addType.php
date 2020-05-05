<?php
$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/formulaire';
require_once($route . '/entity/twp_Type.php');
require_once($route . '/entity/universalFunction.php');
require_once($route . '/entity/FonctionCommune.php');
?>
<!-- affichage de tous les types  -->
<?php $vuType = twp_Type::getAllTypeLIMIT();
$vuType2 = twp_Type::getAllType(); ?>
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
  <title>AdminType</title>
</head>

<body>

<!-- AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT AJOUT  -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formAddType" enctype="application/x-www-form-urlencoded">

    <input type="hidden" name="type" value="add_type">
    <input type="hidden" name="url" value="<?php echo $url; ?>">

    <div class="formulaire">
      <h1 class="titre">Ajouter un Type</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Type </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="newTypeInput" name="Name" placeholder="Entrer le type de voiture" required></p>
      <div class="flex_centre">

        <input type="button" class="new_bouton" name="btn-type" id="ButtonAddNewType" value="Valider">
      </div>
    </div>
  </form>
</body>

</html><br><br>

<!-- MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF  -->
<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModifType" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="modifier_type">
  <input type="hidden" name="url" value="<?php echo $url; ?>">
  <div class="formulaire">
    <h1 class="titre">modifier le type existant</h1>

  <input type="text" name="" class="champ_input" id="oldTypeName" placeholder="le Type à modifier">

    <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
    <small>(Attention aux minuscules/majuscules)</small><br>
    <p class="ligne"><input type="text" class="champ_input" value="" id="newModifType" name="Name" placeholder="Entrer le nouveau nom du Type" required></p>
    <div class="flex_centre">


      <input type="hidden" id="idARecupType" name="id" value="" >
      <input type="button" class="new_bouton" name="btn-brand" id="buttonModif" value="Modifier">
    </div>
  </div>
</form>

<!-- TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU  -->
<h1 class="titre">Liste de type disponible</h1>
<?php FonctionCommune::nombreparpage(); ?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach ($vuType as $type) : ?>
    <tbody>
      <tr>
        <td><?= $type->Name; ?></td>
        <td>
          <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php">
            <input type="hidden" name="type" value="supprimer_type">
            <input type="hidden" name="id" value="<?= $type->id; ?>">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $type->Name; ?>?')">
          </form>
        </td>
        </tr>
    </tbody>
  <?php endforeach; ?>
</table>


<!-- affichage pagination --->
<?php FonctionCommune::selectpage(); ?>

</body>

</html>