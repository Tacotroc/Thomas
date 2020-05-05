<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/FonctionCommune.php');
require_once($route.'/entity/twp_Car.php');
$url=universalFunction::redirection();
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
}
else {
  echo " ";
}

// $listCar=twp_car::GetAllCarImmat();
?>

<div class="formulaire">
  <div class="Select_Car">
    <h1 class="titre">Immatriculation du Véhicule a modifier</h1>
    <p class="ligne"><input type="text" name="Recherche_Immat" id="Recherche_Immat" class="champ_input" value=""></input></p>
    <div class="flex_centre">
      <button type="button" name="button" class="new_bouton" id="Button_Car">Afficher les information</button>
    </div>
  </div>
  <div class="information_car" style="display: none;">
    <br>
    <hr />
    <form name="modifform" class="modifform" id="form" enctype="application/x-www-form-urlencoded">

      <p class="ligne"><label class="labelcategorie" for="info_Immat">Immatriculation</label></p>
      <p class="ligne"><input type="text" name="info_Immat" id="info_Immat" class="champ_input" value="" disabled></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_brand_model">Marque & Model</label></p>
      <p class="ligne"><input type="text" name="info_brand_model" id="info_brand_model" class="champ_input" value="" placeholder="Aucun modéle renseigné"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_pays">Pays</label></p>
      <p class="ligne"><input type="text" name="info_pays" id="info_pays" class="champ_input" value="" placeholder="Aucun pays renseigné"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_couleur_1">Couleur 1</label></p>
      <p class="ligne"><input type="text" name="info_couleur_1" id="info_couleur_1" class="champ_input" value="" placeholder="Aucune couleur renseignée"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_couleur_2">Couleur 2</label></p>
      <p class="ligne"><input type="text" name="info_couleur_2" id="info_couleur_2" class="champ_input" value="" placeholder="Aucune couleur renseignée"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_version">Version</label></p>
      <p class="ligne"><input type="text" name="info_version" id="info_version" class="champ_input" value="" placeholder="Aucune version renseignée"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_type">Type</label></p>
      <p class="ligne"><input type="text" name="info_type" id="info_type" class="champ_input" value="" placeholder="Aucun type renseigné"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_cylinder">Cylindre</label></p>
      <p class="ligne"><input type="text" name="info_cylinder" id="info_cylinder" class="champ_input" value="" placeholder="Aucun cylindre renseigné"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_annee">Année</label></p>
      <p class="ligne"><input type="text" name="info_annee" id="info_annee" class="champ_input" value="" placeholder="Aucune année renseignée"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_owner">Propriétaire</label></p>
      <p class="ligne"><input type="text" name="info_owner" id="info_owner" class="champ_input" value="" placeholder="Aucun propriétaire renseigné"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_museum">Musée</label></p>
      <p class="ligne"><input type="text" name="info_museum" id="info_museum" class="champ_input" value="" placeholder="Aucun musée renseigné"></input></p>

      <p class="ligne"><label class="labelcategorie" for="info_club">Club</label></p>
      <p class="ligne"><input type="text" name="info_club" id="info_club" class="champ_input" value="" placeholder="Aucun club renseigné"></input></p>
    </form>
    <div class="flex_centre">
      <button type="button" name="button_envoie" id="button_envoie" class="new_bouton">Envoyer les données</button>
    </div>
    <form method="POST" name="envoieform" id="envoieform" action="/wp-content/plugins/formulaire/controller/routeur.php">
      <input type="hidden" name="type" value="Update_car_admin">
      <input type="hidden" name="url" value="<?php echo $url; ?>">
      <input type="hidden" name="envoie_id" id="envoie_id" value="">
      <input type="hidden" name="envoie_brand_model" id="envoie_brand_model" value="">
      <input type="hidden" name="envoie_pays" id="envoie_pays" value="">
      <input type="hidden" name="envoie_couleur_1" id="envoie_couleur_1" value="">
      <input type="hidden" name="envoie_couleur_2" id="envoie_couleur_2" value="">
      <input type="hidden" name="old_couleur_1" id="old_couleur_1" value="">
      <input type="hidden" name="old_couleur_2" id="old_couleur_2" value="">
      <input type="hidden" name="envoie_version" id="envoie_version" value="">
      <input type="hidden" name="envoie_type" id="envoie_type" value="">
      <input type="hidden" name="envoie_cylindre" id="envoie_cylindre" value="">
      <input type="hidden" name="envoie_annee" id="envoie_annee" value="">
      <input type="hidden" name="envoie_propriétaire" id="envoie_propriétaire" value="">
      <input type="hidden" name="envoie_musée" id="envoie_musée" value="">
      <input type="hidden" name="envoie_club" id="envoie_club" value="">
    </form>
  </div>
</div>
