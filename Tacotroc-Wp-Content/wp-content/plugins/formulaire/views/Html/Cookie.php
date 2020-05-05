<?php
  session_start();
?>

<!-- <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>cookie</title>
</head>
<body> -->
<h4>Contenu de la session $_SESSION</h4>
<?= var_dump($_SESSION);?>
</br>
<h4>Contenu de la session $_COOKIE</h4>

<?= var_dump($_COOKIE['auth_pseudo']);?></br>
<?= var_dump($_COOKIE['auth_mdp']);?></br>
<?= var_dump($_COOKIE['auth_deco']);?></br>

<!-- </body>
</html> -->
