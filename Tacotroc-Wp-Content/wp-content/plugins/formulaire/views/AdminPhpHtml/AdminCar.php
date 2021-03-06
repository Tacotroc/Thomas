<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/universalFunction.php');
$url=universalFunction::redirection();

 ?>
 <p><?php
 if (isset($_GET['reussit'])) {
   universalFunction::messageSucces($_GET['reussit']);
 }?></p>
  <div id="top"></div>
  <form method="POST" action="/wp-content/plugins/formulaire/controller/routeur.php" id="form" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="type" value="voiture">
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <div class="formulaire">
      <h1 class="titre">Ajouter Une voiture à la BDD</h1>
      <p class="asterisk" id="size">Les champs avec<abbr> * </abbr>sont obligatoires.</p>
      <p class="ligne"><label class="labelcategorie" for="inputImmat">Immatriculation</label><abbr> *</abbr></p>
      <p class="ligne" id="alertCopie">/!\ Cette voiture existe déja dans la base de donné /!\</p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputImmat" placeholder="Immatriculation du véhicule" name="Immatriculate" required></p>
      <p class="ligne"><label class ="labelcategorie" for="inputMarque">Marque</label><abbr> *</abbr><a target="_blank" class="ajout" href='admin.php?page=add_brand'><span class='petitplus'>+</span>Ajouter une marque</a></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputMarque" placeholder="Marque du véhicule." name="Marque" required><span class="Error_msg" id="error_marque"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputModel">Modéle</label><abbr> *</abbr><a target="_blank" class="ajout" href='admin.php?page=add_model'><span class='petitplus'>+</span>Ajouter un model</a></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputModel" placeholder="Modéle du véhicule." name="Model" required disabled><span class="Error_msg" id="error_model"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputPays">Pays</label><abbr> *</abbr><a target="_blank" class="ajout" href='admin.php?page=add_country'><span class='petitplus'>+</span>Ajouter un pays</a></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputPays" placeholder="Pays du véhicule." name="Pays" required><span class="Error_msg" id="error_country"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputColor1">Couleur 1</label><abbr> *</abbr><a target="_blank" class="ajout" href='admin.php?page=add_color'><span class='petitplus'>+</span>Ajouter une couleur</a></p>
      <p class="ligne"><input type="text" class="champ_input" value="" id="inputCouleur1" placeholder="Couleur Principale du véhicule." name="Couleur" required><span class="Error_msg" id="error_color_1"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputColor2">Couleur 2</label><a target="_blank" class="ajout" href='admin.php?page=add_color'><span class='petitplus'>+</span>Ajouter une couleur</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputCouleur2" placeholder="Couleur secondaire du véhicule." name="Couleur"><span class="Error_msg" id="error_color_2"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputVersion">Version</label><a target="_blank" class="ajout" href='admin.php?page=add_version'><span class='petitplus'>+</span>Ajouter une version</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputVersion" placeholder="Version du véhicule." name="Version"><span class="Error_msg" id="error_version"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputType">Type</label><a target="_blank" class="ajout" href='admin.php?page=add_type'><span class='petitplus'>+</span>Ajouter un type</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputType" placeholder="Type du véhicule." name="Type"><span class="Error_msg" id="error_type"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputCylinder">Cylindrée</label><a target="_blank" class="ajout" href='admin.php?page=add_cylinder'><span class='petitplus'>+</span>Ajouter un cylindre</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputCylinder" placeholder="Cylindrée du véhicule." name="Cylindrée"><span class="Error_msg" id="error_cylinder"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputAnnee">Annee</label><a target="_blank" class="ajout" href='admin.php?page=add_vintage'><span class='petitplus'>+</span>Ajouter une année</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputAnnee" placeholder="Annee du véhicule." name="Annee"><span class="Error_msg"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputOwner">Propriétaire</label><a target="_blank" class="ajout" href='admin.php?page=add_owner'><span class='petitplus'>+</span>Ajouter un propriétaire</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputOwner" placeholder="Propriétaire du véhicule." name="Propriétaire"><span class="Error_msg" id="error_owner"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputMuseum">Musée</label><a target="_blank" class="ajout" href='admin.php?page=add_museum'><span class='petitplus'>+</span>Ajouter un musée</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputMuseum" placeholder="Musée du véhicule." name="Musée"><span class="Error_msg" id="error_museum"></span></p>
      <p class="ligne"><label class ="labelcategorie" for="inputClub">Club</label><a target="_blank" class="ajout" href='admin.php?page=add_club'><span class='petitplus'>+</span>Ajouter un club</a></p>
      <p class="ligne"><input type="text" class="champ_input facultatif" value="" id="inputClub" placeholder="Club du véhicule." name="Club"><span class="Error_msg" id="error_club"></span></p>

            <input type="hidden" value="" id="hideid" name="idcar">
            <input type="hidden" value="" id="hideImmat" name="Immatriculation">
            <input type="hidden" value="" id="hideModel" name="id_twp_Model">
            <input type="hidden" value="" id="hidePays" name="id_twp_Country">
            <input type="hidden" value="" id="hideCouleur1" name="Couleur1">
            <input type="hidden" value="" id="hideCouleur2" name="Couleur2">
            <input type="hidden" value="" id="hideVersion" name="id_twp_Version">
            <input type="hidden" value="" id="hideType" name="id_twp_Type">
            <input type="hidden" value="" id="hideCylinder" name="id_twp_Cylinder">
            <input type="hidden" value="" id="hideAnnee" name="id_twp_Vintage">
            <input type="hidden" value="" id="hideOwner" name="id_twp_Owner">
            <input type="hidden" value="" id="hideMuseum" name="id_twp_Museum">
            <input type="hidden" value="" id="hideClub" name="id_twp_Club">



            <div class="flex_centre" id="box_envoie">
              <input type="submit" class="bouton_envoie" name="" value="Valider">
            </div>
            <div class="doublon" id="reset_box">
              <p> Attention ! cette immatriculation existe déja dans la base de donné !</p>
              <p> Voulez vous tout de même l'envoyer en base de donné ?</p>
              <div class="button_doublon">
              <a href='#top'><input type="button" name="" id="reset" value="Non"></a>
                <input type="submit" class="bouton_envoie" name="" value="Oui">
              </div>
            </div>
            <div id="Box_Suggestion">
            </div>
          </div>
        </form>
        <button id="refresh" class="Fixed">Rafraichir</button>
