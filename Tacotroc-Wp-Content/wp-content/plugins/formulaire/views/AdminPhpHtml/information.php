<?php

$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/controller/brandController.php');
require_once($route.'/entity/twp_User.php');
require_once($route.'/entity/twp_Adresse_Social.php');
require_once($route.'/entity/twp_Adress.php');
require_once($route.'/model/model.php');

?>
<?php require('myAccount.php')?>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <title>Mes Informations</title>
</head>
<body>
  <h2>Mes Informations</h2>
  <div class="containerinfo">
    <div class="colinfo" id='commetuveux'>
      <?php $idCo = unserialize($_SESSION['User']);?>
      <div class="formulaire"  id="myColor3">
        <p>
          <strong>
            Mes informations Personnel
          </strong>
        </p>
        <input type="hidden" name="valbool" id ="valuse" value="<?php  echo $idCo->getEntreprise();  ?>" >
        <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="type" value="modifier_user_session">
          <p class="ligne"><span class="message_error" id="Error_general"</span></p>
            <p class="ligne"><label class="labelcategorie"  for="inputNom">Nom</label><abbr> *</abbr></p>
            <p class="ligne"><span class="message_error" id="Error_Nom"></span></p>
            <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getFirstName();  ?>" id="inputNom" name="Last_Name" style="display:none;" placeholder="<?php  echo $idCo->getLastName();  ?>"><span id="getName" ><?php  echo $idCo->getLastName();?></span></p>
            <p class="ligne"><label class="labelcategorie"  for="inputPrenom"> Prénom</label><abbr> *</abbr></p>
            <p class="ligne"><span class="message_error" id="Error_Prenom"></span></p>
            <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getLastName();  ?>" id="inputPrenom" name="First_Name" style="display:none;" placeholder="<?php  echo $idCo->getFirstName();  ?>"><span id="getPrenom" ><?php  echo $idCo->getFirstName();?></span></p>
            <div id="clinch">
              <p class="ligne"><label class="labelcategorie"  for="inputPseudo"> Pseudo</label><abbr> *</abbr></p>
              <p class="ligne"><span class="message_error" id="Error_Pseudo"></span></p>
              <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getPseudo();  ?>" id="inputPseudo" name="Pseudo" style="display:none;" placeholder="<?php  echo $idCo->getPseudo();  ?>"><span id="getPseudo"><?php  echo $idCo->getPseudo();  ?></span></p>
              <p class="ligne"><label class="labelcategorie"  for="inputMail"> Mail</label><abbr> *</abbr></p>
              <p class="ligne"><span class="message_error" id="Error_Mail"></span></p>
              <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getMail();  ?>" id="inputMail" name="Mail"  style="display:none;" placeholder="<?php  echo $idCo->getMail();  ?>"><span id="getMail"><?php  echo $idCo->getMail(); ?></span></p>
              <p class="ligne"><label class="labelcategorie" for="inputCountry"> Nationalité</label><abbr> *</abbr></p>
              <p class="ligne"><span class="message_error" id="Error_Country"></span></p>
              <input type="hidden" value="<?php if($idCo->getEntreprise()!= 1)echo ($idCo->getNation())->getid(); ?>" id="hideid" name="idcar">
              <select id="inputCountry" name="Nation" >
                <option type="hidden" id="valueid2" value="1">

                </option>
                <?php $countrys = twp_Nationality::getAllNationality(); foreach ($countrys as $country): ?>
                  <option  id="valueid" value="<?php echo $country->id?>" ><?php echo $country->Name;?> </option>
                <?php endforeach ?>
              </select>
            </div>
            <div id="entre">
              <p class="ligne"><label class="labelcategorie" for="inputEntreprise"> Nom de l'entreprise</label><abbr> *</abbr></p>
              <p class="ligne"><span class="message_error" id="Error_Mail"></span></p>
              <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getNomEntreprise();  ?>" id="inputEntreprise" name="Nom_E"  style="display:none;" placeholder="<?php  echo $idCo->getNomEntreprise(); ?>"><span id="getMail"><?php  echo $idCo->getNomEntreprise(); ?></span></p>
              <p class="ligne"><label class="labelcategorie" for="inputSiret"> Siret</label><abbr> *</abbr></p>
              <p class="ligne"><span class="message_error" id="Error_Mail"></span></p>
              <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getSiret();  ?>" id="inputSiret" name="Siret"  style="display:none;" placeholder="<?php  echo $idCo->getSiret(); ?>"><span id="getMail"><?php  echo $idCo->getSiret(); ?></span></p>
            </div>
            <p class="ligne"><strong>Mot de passe:</strong>********</p>
          </form>
          <button class="bouton_compte" id="modif_valid">  <i class="fa fa-spinner fa-spin" id="chargement"></i><span id="valid">Valider</span></button>
          <button class="bouton_compte" id="modif_mdp" name="btn-brand">Modifier Mdp</button>
          <button class="bouton_compte" id="modif_adresse" name="btn-brand">Mes adresses</button>
        </div>
      </div>
      <div class="colinfomodif">
        <div class="formulaire" id="formulaireMdp">
          <p class="ligne"><label class="labelcategorie"  for="inputMdp">Mot de passe </label><abbr> *</abbr></p>
          <p class="ligne"><span class="message_error" id="Error_Mdp"></span></p>
          <p class="ligne"><input type="password" class="champ_input" value="" id="inputMdp" name="Mdp" placeholder="*********"></p>
          <button class="bouton_compte" id="modif_valid_mdp">  <i class="fa fa-spinner fa-spin" id="chargementmdp"></i><span id="validmdp">Valider</span></button>
          <div class="formulairemdp" id="formulaireMdpValide">
            <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form2" enctype="application/x-www-form-urlencoded">
              <input type="hidden" name="type" value="modifier_user_session_mdp">
              <p class="ligne"><label class="labelcategorie" for="inputPassword1"> Nouveau mot de passe</label><abbr> *</abbr></p>
              <p class="ligne" id="size">Indiquez entre 8 et 12 caractères maxi dont au moins 1 maj. et au moins 1 chiffre</p>
              <p class="ligne"><span class="message_error" id="Error_Pass1"></span></p>
              <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword1" placeholder="ex : Azerty123" name="Password"  pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}" ></p>
              <p class="ligne"><label class="labelcategorie" for="inputPassword2"> Confirmation du nouveau mot de passe</label><abbr> *</abbr></p>
              <p class="ligne"><span class="message_error" id="Error_Pass2"></span></p>
              <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword2" name="Passwordok" placeholder="ex : Azerty123" ></p>
            </form>
            <button class="bouton_compte" id="modif_valid_mdp_envois">  <i class="fa fa-spinner fa-spin" id="chargementmdpvalide"></i><span id="validmdpvalide">Valider</span></button>
          </div>
        </br>
      </div>
    </div>




        <div class="formulaire" id="formulaireadresse">
          <h4>Adresse de livraison</h4>

          <p class="ligne"><span class="message_error" id="Error_Prenom"></span></p>
          <p class="ligne"><input type="text" class="champ_input" value="</?php  var_dump(twp_Adresse_Social::getAllAdresse_Social());  ?>" id="inputPrenom" name="Adresse_S" style="display:none;" placeholder="<?php  echo $idCo->getFirstName();  ?>"><span id="getPrenom" ><?php $adresse =twp_Adresse_Social::getAllAdresse_Social();
          foreach ($adresse as  $value) {
            echo $value->Num_Rue." ".$value->Nom_Rue." ".$value->Cp_Ville." ".$value->Ville." ".$value->Country;
            // code...
          } ?></span></p>
          <h4>Adresse de facturation</h4>

          <p class="ligne"><span class="message_error" id="Error_Prenom"></span></p>
          <p class="ligne"><input type="text" class="champ_input" value="<?php  echo $idCo->getLastName();  ?>" id="inputPrenom" name="Adresse_F" style="display:none;" placeholder="<?php  echo $idCo->getFirstName();  ?>"><span id="getPrenom" ><?php $adress = twp_Adress::getAllAdressFilial();  foreach ($adress as  $value) {

              echo $value->Num_Rue." ".$value->Nom_Rue." ".$value->Cp_Ville." ".$value->Ville." ".$value->Country;

            } ?></span></p>

          <a href="http://tacotroc.net/Mes-Adresses" ><button class="bouton_compte" id="modif_valid_mdp_envois">  <i class="fa fa-spinner fa-spin" id="chargementmdpvalide"></i><span id="validmdpvalide">Valider</span></button></a>

</div>
</body>
