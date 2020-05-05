<?php

$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_User.php');
require_once($route.'/entity/twp_Adresse_Social.php');
require_once($route.'/entity/twp_Adress.php');
require_once($route.'/model/model.php');
?>



<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/1d36ad2924.js" crossorigin="anonymous"></script>
</head>
<body>

  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="adresseform" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="adresseadd">
    <div class="formulaire">

      <select id="inputCountry" name="val" >

                <option  id="valueid" value="0" >Adresse Livraison</option>
        <option  id="valueid" value="1" >Adresse Facturation </option>
        <option  id="valueid" value="2" >Adresse Filiale</option>


      </select>

      <p class="ligne"><label class="labelcategorie" for="inputNum"> Numero de rue</label><abbr> *</abbr></p>
      <p class="ligne"><span class="message_error" id="Error_inputNum"></span></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputNum" name="a" placeholder="Insérer le numero de votre rue"></p>

      <p class="ligne"><label class="labelcategorie" for="inputRue">Nom de rue</label><abbr> *</abbr></p>
      <p class="ligne"><span class="message_error" id="Error_inputRue"></span></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputRue" name="b" placeholder="Insérer le nom de votre rue" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputVille">Ville</label><abbr> *</abbr></p>
      <p class="ligne"><span class="message_error" id="Error_inputVille"></span></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputVille" name="c" placeholder="Insérer votre ville" minlength="3" maxlength="20" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputCp">Code Postal</label><abbr> *</abbr></p>
      <p class="ligne"><span class="message_error" id="Error_inputCp"></span></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputCp" name="d" placeholder="Insérer votre votre code postal" minlength="3" maxlength="20" ></p>

      <p class="ligne"><label class="labelcategorie" for="inputCountry"> Pays</label><abbr> *</abbr></p>
      <p class="ligne"><span class="message_error" id="Error_inputCountry"></span></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputCountry" name="e" placeholder="Entrer votre pays " ></p>


      <input type="button" class="bouton_envoie" name="" id="MonButton_Adresse" value="Valider">


    </div>
  </form>
</body>
