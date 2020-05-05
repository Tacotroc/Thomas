<?php
$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/formulaire';
require_once($route . '/controller/cylinderController.php');
require_once($route . '/entity/twp_Cylinder.php');
require_once($route . '/entity/universalFunction.php');
require_once($route . '/entity/FonctionCommune.php');
?>

<!-- affichage de tous les cylindré  -->
<?php $vuCylinder = twp_Cylinder::getAllCylinderLIMIT();
$vuCylinder2 = twp_Cylinder::getAllCylinder();
?>

<!-- redirection des pages -->
<?php $url = universalFunction::redirection(); ?>
<!-- affichage message de de success -->
<?php
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
} else {
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
  <title>AdminCylindrer</title>
</head>

<body>
  <!-- _______________________________________________________________________ -->
  <!-- _______________________________________________________________________ -->

  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formAddCylinder" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="addCylinder">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter votre Cylindrée</h1>
      <p class="ligne"><label class="labelcategorie" for="Cylinder"> Type Cylindre</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name="Cylinder" placeholder="Saisissez le type de votre cylindre " required></p>
      <div class="flex_centre">
        <input type="button" class="new_bouton" id="buttonAddNewCylinder" name="btn-cylinder" value="Valider">
      </div>
    </div>
  </form>
</body>

</html><br><br>

<!-- _______________________________________________________________________ -->
<!-- _______________________________________________________________________ -->

<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModifCylinder" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="modifier_cylinder">
  <input type="hidden" name="url" value="<?php echo $url; ?>">
  <div class="formulaire">
    <h1 class="titre">modifier un cylindre existant</h1>
    <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>

<input type="text" id="oldName" class="champ_input" name="id" placeholder="entrez le nom du cylindré à modifier" >

    <p class="ligne"><label class="labelcategorie" for="inputNom">Nouveau Nom</label><abbr> *</abbr></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="newName" name="Name" placeholder=" le type de cylindre à modifier" required></p>
    <div class="flex_centre">

    <input type="hidden" name="id" id="idOldCylinder">
      <input type="button" class="new_bouton" name="btn-brand" id="btnModifCylinder" value="Modifier">

    </div>
  </div>
</form>

<!-- _________________________________________________________________ -->
<!-- _________________________________________________________________ -->
<!-- _________________________________________________________________ -->
<h1 class="titre">Liste de version disponible</h1>
<?php FonctionCommune::nombreparpage(); ?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach ($vuCylinder as $cylinder) : ?>
    <tbody>
      <tr>
        <td><?= $cylinder->Cylinder; ?></td>
        <td>
          <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php">
            <input type="hidden" name="type" value="supprimer_cylinder">
            <input type="hidden" name="id" value="<?= $cylinder->id; ?>">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $cylinder->Cylinder; ?>?')">
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
