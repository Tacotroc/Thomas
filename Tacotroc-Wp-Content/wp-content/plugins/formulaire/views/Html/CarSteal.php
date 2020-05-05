<?php

$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_User.php');
require_once($route.'/model/model.php');
require_once($route.'/entity/twp_Country.php');
?>
<script src="https://kit.fontawesome.com/1d36ad2924.js"></script>

<form method="POST" name="volform" action="#" id="form" enctype="application/x-www-form-urlencoded">


  <div id="rechargement">
    <div class="bg_modal hide" name="Modal_de_connexion">

      <div class="" id="vide">
      </div>

      <div class="modal_content" id="Modal_Connexion">
        <div class="flex_centre">
          <div class="croix">
            <i class="fas fa-times"></i>
          </div>
          <img class="logo_size" src="/wp-content/plugins/formulaire/views/Image/logo.png" alt="logo de tacotroc"/>
        </div>
        <div class="modal_form">

          <p class="ligne"><input  class="champ_input" value="" id="inputMail" placeholder="pseudo"  ></p>
          <p class="ligne"><input type="password" class="champ_input" value="" id="inputPassword1" placeholder="Mot de passe" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}" class="Error_msg"></p>
          <input type="button" value="valide" class="bouton_choix" id="btn_co" ></input>
          <div class="popup">
            <span class="popuptext" id="myPopup2">veuillez remplir tout les champs!</span>
            <span class="popuptext" id="myPopup1">mot de passe ou identifiant erroné!</span>
          </div>
        </div>
      </div>
    </div>

    <div class="formulaire">
      <h1>Vol</h1>
      <p class="asterisk" id="size1">Les champs avec<abbr> * </abbr>sont obligatoires.</p>
      <?php if (isset($_SESSION['User'] )==false ): ?>
        <p class="ligne flex_espace">
          <input type="button" value="Se connecter" id="inputConnexion" class="bouton_choix" onclick="affichermodal()">
          <input type="button" value="Sans Compte" id="inputAnonyme" class="bouton_choix" onclick="anonyme()">
        </p>
        <div class="cacher" id="div_anonyme">



          <h2>Internaute</h2>

          <p class="ligne"><label class="labelcategorie" >Nom  </label><abbr> * </abbr></p>
          <p>
            <input type="text" id="anoNom" value="" class="champ_input facultatif" placeholder="Nom">
          </p>
          <p class="ligne"><label class="labelcategorie" >Prenom</label><abbr> * </abbr></p>
          <p><input type="text" id="anoPrenom" value="" class="champ_input facultatif" placeholder="Prenom"></p>
          <p class="ligne"><label class="labelcategorie">Mail  </label><abbr> * </abbr></p>
          <p><input type="email" id="anoMail" value="" class="champ_input facultatif" placeholder="Mail"></p>
        </div>

        <div id="session">
          <input type=hidden id="variableNom" value=''/>
          <input type=hidden id="variablePrenom" value=''/>
          <input type=hidden id="variableMail" value=''/>
          <input type=hidden id="variableTel" value=''/>
        </div>
      <?php endif; ?>

      <div class="">
        <hr>
        <div class="flex_espace">

          <div id="Proprio">
            <label for="checkboxProprio"><input type="checkbox" id="checkboxProprio" value="" onchange="estproprio()" checked>je suis propriétaire du véhicule.</label>
            <label for="checkboxNonProprio"><input type="checkbox" id="checkboxNonProprio" value="" onchange="estpasproprio()">je ne suis pas propriétaire du véhicule.</label>
          </div>
        </div>

        <div class="cacher" id="div_proprio" >
          <p class="ligne"><label class="labelcategorie" >Nom Proprio</label><abbr> * </abbr></p>
          <p class="ligne"><input type="text" id="NomProprio" value="" class="champ_input" placeholder="Nom du propriétaire"></p>
          <p class="ligne"><label class="labelcategorie" >Prenom Proprio</label><abbr> * </abbr></p>
          <p class="ligne"><input type="text" id="PrenomProprio" value="" class="champ_input" placeholder="Prenom du propriétaire"></p>
          <p class="ligne"><label class="labelcategorie" >Téléphone</label><abbr> * </abbr></p>
          <p class="ligne"><input type="tel" id="TelephoneProprio" value="" class="champ_input facultatif" placeholder="Téléphone du propriétaire"></p>
          <p class="ligne"><label class="labelcategorie" >Mail</label><abbr> * </abbr></p>
          <p class="ligne"><input type="email" id="MailProprio" value="" class="champ_input facultatif" placeholder="Mail du propriétaire"></p>
        </div>


      </div>
    </div>




    <hr>
    <h2>Information du vehicule</h2>
    <div class="" id="info_voiture">
      <p class="asterisk" id="size">Les champs avec<abbr> * </abbr>sont obligatoires.</p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputImmat" placeholder="Immaticulation du véhicule" name="Immatriculate" required></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputMarque" placeholder="Marque du véhicule." name="Marque" required><span class="Error_msg"></span></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputModel" placeholder="Modéle du véhicule." name="Model" required disabled><span class="Error_msg"></span></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputCouleur1" placeholder="Couleur Principale du véhicule." name="Couleur" required><span class="Error_msg"></span></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputCouleur2" placeholder="Couleur secondaire du véhicule." name="Couleur"><span class="Error_msg"></span></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputVersion" placeholder="Version du véhicule." name="Version"><span class="Error_msg"></span></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputType" placeholder="Type du véhicule." name="Type"><span class="Error_msg"></span></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputAnnee" placeholder="Annee du véhicule." name="Annee"><span class="Error_msg"></span></p>


      <h2> Localistaion du délit</h2>
      <p class="ligne"><input type="text" id="adresseV" value="" class="champ_input facultatif" placeholder="Adresse"></p>
      <p class="ligne"><input type="text" id="codePostalV" value="" class="champ_input facultatif" placeholder="code Postal"></p>
      <p class="ligne"><input type="text" id="VilleV" value="" class="champ_input facultatif" placeholder="Ville"></p>
    <!--  <p class="ligne"><input type="text" id="PaysV" value="" class="champ_input facultatif" placeholder="Pays"></p>-->
      <select class="ligne" id="PaysV" name="Nation" required>
        <option  id="valueid2" value="1">Pays
        </option>
        <?php $countrys = twp_Country::getAllCountry(); foreach ($countrys as $country): ?>
          <option  id="valueid" value="<?php echo $country->Name?>" ><?php echo $country->Name;?> </option>
        <?php endforeach ?>
      </select>
      <textarea  rows="6"   cols="50"id="precision"  placeholder="+ de precision......"/></textarea>
    </div>


    <hr>
    <p class="ligne"><label class="labelcategorie" for="inputPhoto">Photo de la voiture</label></p>
    <div class="block_image">
      <div class="Zone_Input_Image">
        <p class="image_nonchoisis"><input class="input_photo" type="file" id="InputPhoto1" accept="image/png, image/jpeg" multiple onchange="document.getElementById('selectImg').src = window.URL.createObjectURL(this.files[0]);document.getElementById('cross1').style.display='block'" />
          <img class="pre_image" src="/wp-content/plugins/formulaire/views/Image/cross.png" alt="croix" id="cross1" onclick="closeImg3(this)" /></p>
          <div class="photo_choisis"><img class="affichage_photo" src="/wp-content/plugins/formulaire/views/Image/selectImg.png" alt="selection d'images" id="selectImg" /></div>
        </div>
        <div class="Zone_Input_Image">
          <p class="image_nonchoisis"><input class="input_photo" type="file" id="InputPhoto2" accept="image/png, image/jpeg" multiple onchange="document.getElementById('selectImg2').src = window.URL.createObjectURL(this.files[0]);document.getElementById('cross2').style.display='block'" />
            <img class="pre_image" src="/wp-content/plugins/formulaire/views/Image/cross.png" alt="croix" id="cross2" onclick="closeImg2(this)" /></p>
            <div class="photo_choisis"><img class="affichage_photo" src="/wp-content/plugins/formulaire/views/Image/selectImg.png" alt="selection d'images" id="selectImg2" /></div>
          </div>
          <div class="Zone_Input_Image">
            <p class="image_nonchoisis"><input class="input_photo" type="file" id="InputPhoto3" accept="image/png, image/jpeg" multiple onchange="document.getElementById('selectImg3').src = window.URL.createObjectURL(this.files[0]); document.getElementById('cross3').style.display='block'" />
              <img class="pre_image" src="/wp-content/plugins/formulaire/views/Image/cross.png" alt="croix" id="cross3" onclick="closeImg(this)" /></p>
              <div class="photo_choisis"><img class="affichage_photo" src="/wp-content/plugins/formulaire/views/Image/selectImg.png" alt="selection d'images" id="selectImg3" /></div>
            </div>
          </div>

          <input type="submit" value="Confirmation du formulaire de vol " class="bouton_choix" id="btn_validation"/>



          <?php if (isset($_SESSION['User'] )==true ): ?>
            <?php $session = unserialize($_SESSION['User']);
            ?>
            <div id="session">
              <input type=hidden id="variableNom" value="<?php echo $session->getLastName();?>"/>
              <input type=hidden id="variablePrenom" value="<?php echo $session->getFirstName(); ?>"/>
              <input type=hidden id="variableMail" value="<?php echo $session->getMail(); ?>"/>
              <input type=hidden id="variableTel" value="<?php echo $session->getPhone(); ?>"/>
            </div>
          <?php endif; ?>

          <input type="hidden" value="" id="hideid" name="id_tw_car">
          <input type="hidden" value="" id="hideImmat" name="Immatriculation">
          <input type="hidden" value="" id="hideModel" name="id_twp_Model">
          <input type="hidden" value="" id="hideCouleur1" name="Couleur1">
          <input type="hidden" value="" id="hideCouleur2" name="Couleur2">
          <input type="hidden" value="" id="hideVersion" name="id_twp_Version">
          <input type="hidden" value="" id="hideType" name="id_twp_Type">
          <input type="hidden" value="" id="hideAnnee" name="id_twp_Vintage">

          <div id="Box_Suggestion">
          </div>
        </div>
      </form>
