<?php
$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/twp_Car.php');
require_once($route.'/entity/universalFunction.php');
require_once($route.'/entity/twp_Brand.php');
require_once($route.'/entity/twp_Model.php');
require_once($route.'/entity/twp_User.php');
require_once($route.'/entity/twp_Version.php');
require_once($route.'/entity/twp_Type.php');
require_once($route.'/entity/twp_Cylinder.php');
require_once($route.'/entity/twp_Owner.php');
require_once($route.'/entity/twp_Country.php');
require_once($route.'/entity/twp_Museum.php');
require_once($route.'/entity/twp_Club.php');
require_once($route.'/entity/twp_Serie.php');
require_once($route.'/entity/twp_Color.php');
//require_once($route.'/entity/twp_Serie.php');
?>
<!-- redirection des pages -->
<?php  $url=universalFunction::redirection();

// affichage message success
if (isset($_GET['reussit'])) {
  universalFunction::messageSucces($_GET['reussit']);
}
else {
  echo " ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>liste car </title>
</head>
<body>


  <div class="formulaire" >

    <h1 class="titre">Recherche par filtrage</h1>
    <div id="rechargement">
      <input type="hidden" id="verif" value=false>
      <label for="myImmat" class="labelcategorie" >par Immatriculation : </label>
      <p class="ligne"><input id="myImmat" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="0" > </p>
      <label for="myUser" class="labelcategorie" >par Utilisateur : </label>
      <p class="ligne"><input id="myUser" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="3" > </p>
      <label for="Years" class="labelcategorie" >par année: </label>
      <p class="ligne"><input id="years" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="4" > </p>
      <label for="color1" class="labelcategorie" >par couleur principale: </label>
      <p class="ligne"><input id="color1" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="5" > </p>
      <label for="color2" class="labelcategorie" >par couleur secondaire: </label>
      <p class="ligne"><input id="color2" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="6" > </p>
      <label for="myBrand" class="labelcategorie" >par marque: </label>
      <p class="ligne"><input id="myBrand" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="7" > </p>
      <label for="myModel" class="labelcategorie" >par modèle: </label>
      <p class="ligne"><input id="myModel" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="8" > </p>
      <label for="myVersion" class="labelcategorie" >par version: </label>
      <p class="ligne"><input id="myVersion" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="9" > </p>
      <label for="myType" class="labelcategorie" >par type: </label>
      <p class="ligne"><input id="myType" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="10" > </p>
      <label for="cylindre" class="labelcategorie" >par cylindre: </label>
      <p class="ligne"><input id="cylindre" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="11" > </p>
      <label for="mySerie" class="labelcategorie" >par serie: </label>
      <p class="ligne"><input id="mySerie" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="12" > </p>
      <label for="myOwner" class="labelcategorie" >par propriétaire: </label>
      <p class="ligne"><input id="myOwner" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="13" > </p>
      <label for="myCountry" class="labelcategorie" >par pays: </label>
      <p class="ligne"><input id="myCountry" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="14" > </p>
      <label for="myMusee" class="labelcategorie" >par musee: </label>
      <p class="ligne"><input id="myMusee" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="15" > </p>
      <label for="myClub" class="labelcategorie" >par club: </label>
      <p class="ligne"><input id="myClub" type="text"  class="champ_input" placeholder="minimun 3 caractère ...." name="16" > </p>

      <div class="flex_centre">
        <button type="button" ="selection" class="bouton_envoie" onclick="filtrage2()">recherche</button>
      </div>
    </div>
  </div>
  <br><hr><br>

  <h1 class="titre">Liste de véhicules disponible en BDD</h1>
  <br>



  <table class="table" id="idtable">


    <thead class="thead-dark">
      <tr>
        <th scope="col">Immatriculation</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Restoration</th>
        <th scope="col">User</th>
        <th scope="col">Année</th>
        <th scope="col">Couleur1</th>
        <th scope="col">Couleur2</th>
        <th scope="col">Marque</th>
        <th scope="col">Modéle</th>
        <th scope="col">Version</th>
        <th scope="col">Type</th>
        <th scope="col">Cylindrée</th>
        <th scope="col">Serie</th>
        <th scope="col">Propriétaire</th>
        <th scope="col">Pays</th>
        <th scope="col">Musée</th>
        <th scope="col">Club</th>
        <th scope="col">Action</th>
      </tr>

    </table>



    <div class="flex_centre">
      <button type="button" ="remplissageBDD" class="bouton_envoie" onclick="rbdd()">remplissageBDD</button>
    </div>


  </body>
  </html>
