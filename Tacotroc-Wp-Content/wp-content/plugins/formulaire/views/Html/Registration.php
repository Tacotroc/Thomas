<?php

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/formulaire';
require_once($route . '/controller/brandController.php');
require_once($route . '/entity/twp_Nationality.php');
require_once($route . '/model/model.php');
?>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/1d36ad2924.js" crossorigin="anonymous"></script>
</head>

<button type="button" class="button_retour" id="button_retour_droite"><span id="retour_1">Retour</span> <i id="fleche-droite" class="fas fa-arrow-right"></i></button>

<div class="madiv">
  <div class="madiv1">
    <p class="ligne"><label class="labelcategorie" id="type"> Vous souhaitez vous inscrire en tant que:</label></p>
  </div>
  <div class="madiv2">
    <input type="button" class="bouton_envoie" name="" id="MonButton_ChoixE" value="Entreprise">
    <input type="button" class="bouton_envoie" name="" id="MonButton_ChoixP" value="Particulier">
  </div>
</div>
<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="inscription">
  <div class="formulaire">

    <div class="madivretour">
      <div class="madivretour1">
        <h1>S'inscrire</h1>
      </div>
      <div class="madivretour2">

      </div>
    </div>

    <p class="asterisk" id="size">Les champs avec<abbr> * </abbr>sont obligatoires.</p>
    <p class="ligne"><span class="message_error" id="Error_General"></span></p>

    <p class="ligne"><label class="labelcategorie" for="inputNom"> Nom</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Nom"></span></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom" name="Last_Name" placeholder="Insérer votre nom"></p>

    <p class="ligne"><label class="labelcategorie" for="inputPrenom"> Prénom</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Prenom"></span></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputPrenom" name="First_Name" placeholder="Insérer votre prénom"></p>

    <p class="ligne"><label class="labelcategorie" for="inputPseudo"> Pseudo</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Pseudo"></span></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputPseudo" name="Pseudo" placeholder="ex : Austin_59" minlength="3" maxlength="20"></p>

    <p class="ligne"><label class="labelcategorie" for="inputMail"> Adresse Email</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Email"></span></p>
    <p class="ligne"><input type="email" class="champ_input" value="" id="inputMail" name="Mail" placeholder="ex : taco@adresse.com" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"></p>

    <p class="ligne"><label class="labelcategorie" for="inputCountry"> Nationalité</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Country"></span></p>
    <select id="inputCountry" class="champ_options" name="Nation">

      <option value="">--Please choose an option--</option>

      <?php $countrys = twp_Nationality::getAllNationality();
      foreach ($countrys as $country) : ?>

        <option id="valueid" value="<?php echo $country->id ?>"> <?php echo $country->Name; ?> </option>

      <?php endforeach ?>


    </select>




    <p class="ligne"><label class="labelcategorie" for="inputPassword1"> Mot de passe</label><abbr> *</abbr></p>
    <p class="ligne" id="size">Indiquez entre 8 et 12 caractères maxi dont au moins 1 maj. et au moins 1 chiffre</p>
    <p class="ligne"><span class="message_error" id="Error_Pass1"></span></p>
    <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword1" placeholder="ex : Azerty123" name="Password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}"></p>



    <p class="ligne"><label class="labelcategorie" for="inputPassword2"> Confirmation du mot de passe</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Pass2"></span></p>
    <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword2" name="Passwordok" placeholder="ex : Azerty123"></p>

    <p id="size">En vous inscrivant, vous acceptez la Politique de conﬁdentialité de tacotroc.com </br> accessible via le lien suivant :
      <a href="https://www.tacotroc.com/politique-de-confidentialite"> Conditions générales d'utilisation </a> </p>
    <div class="flex_centre">
      <input type="button" class="bouton_envoie" name="" id="MonButton" value="Valider">

    </div>
  </div>
</form>

<form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="formEntreprise" enctype="application/x-www-form-urlencoded">
  <input type="hidden" name="type" value="inscriptionEntreprise">
  <div class="formulaire">
    <div class="madivretour">
      <div class="madivretour1">
        <h1>S'inscrire</h1>
      </div>
      <div class="madivretour2">
        <div class="div_button_gauche">
          <button type="button" class="button_retour" id="button_retour_gauche"><span id="retour_">Retour</span> <i id="fleche-gauche" class="fas fa-arrow-right"></i></button>
        </div>
      </div>
    </div>


    <p class="asterisk" id="size">Les champs avec<abbr> * </abbr>sont obligatoires.</p>
    <p class="ligne"><span class="message_error2" id="Error_General2"></span></p>

    <p class="ligne"><span class="message_error" id="Error_NomE"></span></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputNomE" name="a" placeholder="Insérer le nom de l'entreprise"></p>

    <p class="ligne"><label class="labelcategorie" for="inputAdress">Adresse du siege social</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Adress"></span></p>

    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress" name="b1" placeholder="Insérer le numero de la rue "></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress1" name="b2" placeholder="Insérer le nom de la rue"></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress2" name="b3" placeholder="Insérer le code postal"></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress3" name="b4" placeholder="Insérer la ville"></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress4" name="b5" placeholder="Insérer le pays"></p>


    <p class="ligne"><label class="labelcategorie" for="inputAdress_F">Adresse de la filiale</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_AdressE"></span></p>

    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress" name="c1" placeholder="Insérer le numero de la rue "></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress1" name=c2 placeholder="Insérer le nom de la rue"></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress2" name="c3" placeholder="Insérer le code postal"></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress3" name="c4" placeholder="Insérer la ville"></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputAdress4" name="c5" placeholder="Insérer le pays"></p>

    <p class="ligne"><label class="labelcategorie" for="inputSiret">N° SIRET</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Siret"></span></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputSiret" name="d" placeholder="Insérervotre numero SIRET" minlength="3" maxlength="20"></p>

    <p class="ligne"><label class="labelcategorie" for="inputNom_C"> Nom du contact</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_NomC"></span></p>
    <p class="ligne"><input type="text" class="champ_input" value="" id="inputNom_C" name="e" placeholder="Entrer votre Nom" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"></p>

    <p class="ligne"><label class="labelcategorie" for="inputPrenom_C"> Prenom du contact</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_PrenomE"></span></p>
    <p class="ligne"><input type="email" class="champ_input" value="" id="inputPrenom_C" name="f" placeholder="Entrer votre Prenom" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"></p>

    <p class="ligne"><label class="labelcategorie" for="inputTel">Telephone du contact</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Tel"></span></p>
    <p class="ligne"><input type="email" class="champ_input" value="" id="inputTel" name="g" placeholder="Entrer votre numero de téléphone" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"></p>

    <p class="ligne"><label class="labelcategorie" for="inputPassword3"> Mot de passe</label><abbr> *</abbr></p>
    <p class="ligne" id="size">Indiquez entre 8 et 12 caractères maxi dont au moins 1 maj. et au moins 1 chiffre</p>
    <p class="ligne"><span class="message_error" id="Error_Pass3"></span></p>
    <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword3" placeholder="ex : Azerty123" name="Passwordo" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}"></p>



    <p class="ligne"><label class="labelcategorie" for="inputPassword4"> Confirmation du mot de passe</label><abbr> *</abbr></p>
    <p class="ligne"><span class="message_error" id="Error_Pass4"></span></p>
    <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword4" name="Passwordok" placeholder="ex : Azerty123"></p>

    <p id="size">En vous inscrivant, vous acceptez la Politique de conﬁdentialité de tacotroc.com </br> accessible via le lien suivant :
      <a href="https://www.tacotroc.com/politique-de-confidentialite"> Conditions générales d'utilisation </a> </p>
    <div class="flex_centre">
      <input type="button" class="bouton_envoie" name="" id="MonButton_Entreprise" value="Valider">

    </div>
  </div>
</form>