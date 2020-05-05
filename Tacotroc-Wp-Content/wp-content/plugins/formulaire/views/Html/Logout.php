<?php
session_start();

if($_SESSION['Pseudo'])
{
  $user = htmlspecialchars($_SESSION['Pseudo']);
  // afficher un message

  echo "<h3>Bienvenue $user</h3>";

  echo"<form action= '/wp-content/plugins/formulaire/controller/routeur.php' method='POST' id='form'>
  <input type='hidden' name='type' value='deconnexion'>
  <input type='submit' class='bouton_envoie' value='Se déconnecter' />
  </form>";
}
?>
