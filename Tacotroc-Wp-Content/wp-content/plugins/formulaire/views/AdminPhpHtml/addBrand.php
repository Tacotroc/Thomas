<?php
$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/formulaire';
require_once($route . '/entity/twp_Brand.php');
require_once($route . '/entity/universalFunction.php');
require_once($route . '/entity/FonctionCommune.php');
?>

<!-- affichage de tous les marques  -->
<?php $marque = twp_Brand::getAllBrandLIMIT(); ?>
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
  <title>AdminBrand</title>
</head>

<body>
  <!-- AJOUTER UNE MARQUE -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formAddBrand" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="add_brand">
    <input type="hidden" name="url" id="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter une marque</h1>

      <p class="ligne"><label class="labelcategorie" for="inputNewName"> Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNewName" name="Name" placeholder="Insérer le nom de la marque" required></p>
      <div class="flex_centre">
        <input type="button" class="new_bouton" name="btn-brand" id="btnAjout" value="Valider">

      </div>
    </div>
  </form><br><br>


  <!-- MODIFIER UNE MARQUE -->
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModifBrand" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">modifier une marque existante</h1>

<p class="ligne"><label for="info_marque" class="labelcategorie">Marque</label><abbr> *</abbr></p>
<input type="text" name="info_marque" id="info_marque" class="champ_input" placeholder="Entrez la marque à modifier" required>




      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name="newName" placeholder="Le nouveau nom" required></p>
      <div class="flex_centre">


      <input type="hidden" name="type" value="modifier_brand">
      <input type="hidden" name="idModifBrand" id="idModifBrand" value="">
      <input type="button" id="modifButton" class="new_bouton" name="btn-brand" value="Modifier">


      </div>
    </div>
  </form><br><br>

  <h1 class="titre">Liste des marques disponibles</h1>
  <?php FonctionCommune::nombreparpage(); ?>

  <!-- AFFICHAGE TABLEAU DES MARQUES -->
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <?php foreach ($marque as $brand) : ?>
      <tbody>
        <tr>
          <td><?= strtoupper($brand->Name); ?></td>
          <td>
            <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php">
              <!-- <a onclick="return confirm('vous ètes sure de supprimer </?= $brand->Name; ?>?')" href="/wp-content/plugins/formulaire/controller/routeur2.php?id=</?= $brand->id; ?>&type=supprimer_brand" class="btn btn-danger">Supprimer</a></td> -->
              <input type="hidden" name="type" value="supprimer_brand">
              <input type="hidden" name="id" value="<?= $brand->id; ?>">
              <input type="hidden" name="url" value="<?php echo $url; ?>">
              <input type="submit" class="new_bouton" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $brand->Name; ?>?')">
            </form>
          </td>
          <td><a href="/wp-content/plugins/formulaire/controller/routeur2.php?id=<?= $brand->id; ?>&Name=<?= $brand->Name; ?>&type=modifier_brand" class="new_bouton">Modifier</a></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>

  <!-- affichage pagination --->
  <?php FonctionCommune::selectpage(); ?>
</body>

</html>
