<?php
session_start();
?>
<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="connexion">
  <div class="formulaire">
    <h1>Se connecter</h1>
    <?php
    if(isset($_COOKIE['auth_deco']) && $_COOKIE['auth_deco']==0)
    {
      echo "<p class='ligne'><input type='text' class='champ_input'  id='inputPseudo' placeholder='Votre pseudo' name='Pseudo' required
      value = " . $_COOKIE['auth_pseudo'] ." ></p>";
      echo" <p class='ligne'><input type='password' class='champ_input'  id='inputPassword1' name='Password' placeholder='Votre mot de passe' required
      value= " . $_COOKIE['auth_mdp'] . "></p>";
    }
    else{
      echo "<p class='ligne'><input type='text' class='champ_input' value='' id='inputPseudo' placeholder='Votre pseudo' name='Pseudo' required></p>";
      echo" <p class='ligne'><input type='password' class='champ_input' value='' id='inputPassword1' name='Password' placeholder='Votre mot de passe'required></p>";
    }

    ?>
    <p class='ligne'><label class ='checkbox'><input type='checkbox' class='champ_input facultatif' value="" name='remember' >Se souvenir de moi</label></p>
    <input type="submit" class="bouton_envoie" name="" value="Valider">
  </div>
</form>
