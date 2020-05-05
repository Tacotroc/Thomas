<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Owner.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage de tous les propriétaires  -->
<?php $vuowner = twp_Owner::getAllOwnerLIMIT();?>
<!-- redirection des pages -->
<?php  $url=universalFunction::redirection();?>
<!-- affichage message de de success -->
<?php $listowner = twp_Owner::getAllOwnerList();?>
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
  <title>AdminOwner</title>
</head>
<body>
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php" id="form" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="owner">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter un propriétaire</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Last_Name" placeholder="Entrer votre nom" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Prenom </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "First_Name" placeholder="Entrer votre prenom" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Entreprise </label><abbr> *</abbr></p>
      <input type="radio" name="Compagny" value="Oui">Oui
      <input type="radio" name="Compagny" value="Non">Non<br><br>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Siret </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Siret" placeholder="Entrer le numero siret de votre entreprise" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom entreprise </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Compagny_Name" placeholder="Entrer le nom de l'entreprise (a revoir)" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Telephone </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name = "Phone" placeholder="Entrer votre numero de Telephone" ></p>
      <div class="flex_centre">
        <input type="submit" class="btn btn-success" name="btn-proprietaire" value="Ajouter">
      </div>
    </div>
  </form><br><br>
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formModif" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="modifier_owner">
    <input type="hidden" id="inputId" name="id" value=">">
  <div class="formulaire">

      <h1 class="titre">Modifier le propriétaire existant</h1>
      <p class="ligne"><label class="labelcategorie" for="inputNom"> Rechercher le Proprietaire</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputRecherche" name = "recherche" placeholder=" " required>
    <input type="button" class="btn btn-info" id="validchoix" name="btn-brand" value="Valider">  </p>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNomModif" name = "Last_Name" placeholder=" le nom  à modifier" required></p>


      <p class="ligne"><label class="labelcategorie" for="inputNom"> Prenom</label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputPrenom" name = "First_Name" placeholder=" le prenom à modifier" required></p>

      <p class="ligne"><label class="labelcategorie" for="inputbool" value=""> Entreprise </label><abbr> *</abbr></p>
      <input type="radio" id="oui" name="Compagny" value="">Oui
      <input type="radio" id="non" name="Compagny" value="">Non<br><br>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Siret </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputSiret" name = "Siret" placeholder=" le siret  à modifier" required></p>

      <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom entreprise  </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputEntreprise" name = "Compagny_Name" placeholder=" le nom de l'entreprise  à modifier" required></p>


      <p class="ligne"><label class="labelcategorie" for="inputNom"> Phone  </label><abbr> *</abbr></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputPhone" name = "Phone" placeholder=" le numero de téléphone à modifier" required></p>


      <div class="flex_centre">
        <input type="button"  id="updateowner" class="btn btn-info" name="btn-brand" value="Modifier">
      </div>
    </div>
  </form><br><br>



  <h1 class="titre">Liste de propriétaire disponible</h1>
  <?php FonctionCommune::nombreparpage(); ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Entreprise</th>
        <th scope="col">Siret</th>
        <th scope="col">Nom entreprise</th>
        <th scope="col">Telephone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <?php foreach($vuowner as $owner): ?>
      <tbody>
        <tr>
          <td><?= strtoupper($owner->Last_Name); ?></td>
          <td><?= ucwords($owner->First_Name); ?></td>
          <td><?= $owner->Compagny; ?></td>
          <td><?= $owner->Siret; ?></td>
          <td><?= $owner->Compagny_Name; ?></td>
          <td><?= $owner->Phone; ?></td>
          <td> <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php">
            <input type="hidden" name="type" value="supprimer_owner">
            <input type="hidden" name="id" value="<?= $owner->id; ?>">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $owner->Last_Name; ?>?')">
          </form></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>

  <!-- affichage pagination --->
  <?php FonctionCommune::selectpage(); ?>

  <div id="Box_Suggestion">
  </div>

</body>
</html>
