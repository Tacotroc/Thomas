<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_User.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
?>
<!-- affichage des users -->
<?php $shows = twp_User::getAllUserLIMIT();?>
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>AdminUser</title>
</head>
<body>

<h1 class="titre">Liste des utilisateurs</h1>
<?php FonctionCommune::nombreparpage(); ?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Email</th>
      <th scope="col">Date de création</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach($shows as $shows): ?>
    <tbody>
      <tr>
        <td><?= strtoupper($shows->Last_Name); ?></td>
        <td><?= $shows->First_Name; ?></td>
        <td><?= $shows->Pseudo; ?></td>
        <td><?= $shows->Mail; ?></td>
        <td><?= $shows->Date_Creation; ?></td>
        <td> <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur2.php">
          <input type="hidden" name="type" value="supprimer_user">
          <input type="hidden" name="id" value="<?= $shows->id; ?>">
          <input type="hidden" name="url" value="<?php echo $url; ?>">
          <input type="submit" class="btn btn-danger" value="Supprimer" onclick="return confirm('vous ètes sure de supprimer <?= $shows->Last_Name; ?>?')">
        </form></td>
      </tr>
    </tbody>
  <?php endforeach; ?>
</table>

<!-- affichage pagination --->
<?php FonctionCommune::selectpage(); ?>
</body>
</html>
