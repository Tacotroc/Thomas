<?php

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/controller/inscriptionController.php');

$allCountry = getAllCountryController();
$allNation = getAllNationalityController();
$indics = getIndicCountry();




if (isset($_SESSION['connected']) && $_SESSION['connected'] == "ok") {
    $nom = $_SESSION['nom'];
    $prenom =  $_SESSION['prenom'];
    $pseudo =    $_SESSION['pseudo'];
    $mail = $_SESSION['mail'];
    $indicPhone = $_SESSION['indicPhone'];
    $phone = $_SESSION['phone'];
    $pays = $_SESSION['pays'];
    $natio = $_SESSION['nation'];
    $pro = $_SESSION['pro'];
    $entreprise = $_SESSION['entreprise'];
    $numeroTva = $_SESSION['numeroTva'];
    $siret = $_SESSION['siret'];
    $nomContact = $_SESSION['nonContact'];
    $isActive = $_SESSION['active'];


} else {
    header("Status: 301 Moved Permanently", false, 301);
    header('location:/?info=nosession');
}
// 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $url = "https://".$_SERVER['HTTP_HOST'];
  }
   else{
     $url = "http://".$_SERVER['HTTP_HOST'];
   }



if($isActive == 0){
    echo(
        "<a href=" . $url . "/activation?id=" . $_SESSION['id'] . ">Vous n'avez pas activé votre compte, cliquez ici pour l'activer.</a>"
    );
}

?>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div class="clickDiv" id="divErrorMessage">
    <p id="errorMessage" class="clickDiv"></p>
</div>

<div class="clickDiv" id="informationsDiv">
    <p id="informationDivText" class="clickDiv"></p>
</div>


<div id="optionChoice">
    <div>
        <p class="option" id="optionInfo">Infos</p>
    </div>
    <div>
        <p class="option" id="optionModif">Modifier Mes Infos</p>
    </div>
    <div>
        <p class="option" id="optionCars">Mes Voitures</p>
    </div>
</div>

<!-- MODIFICATION DES INFOS -->
<!-- MODIFICATION DES INFOS -->
<div id="myAccountModif">
    <div>
        <small>Pour modifier des infos qui ne sont pas modifiable ici, veuillez contacter tacotroc.com</small>
    </div>
    <form action="/wp-content/plugins/CompteTt/controller/compteRouting.php" method="POST" id="formModifAccount">

        <h3>Modifier mes infos</h3>

        <label for="nomModif">Nom : </label><br>
        <input id="inputNomModif" type="text" name="nomModif" value="<?php echo $nom ?>">
        <br><br>

        <label for="prenomModif">Prénom : </label><br>
        <input id="inputPrenomModif" type="text" name="prenomModif" value="<?php echo $prenom ?>">
        <br>

        <p>Votre pseudo : <?php echo $pseudo ?></p>


        <p>Votre adresse mail : <?php echo $mail ?></p>


        <label for="indicModif">Indicatif téléphonique : </label><br>
        <select name="indicModif" id="inputIndicModif">
            <option value="">-- Sélectionnez l'indicatif --</option>
            <?php
            foreach ($indics as $nomPays => $numeroIndic) {
                if ($indicPhone == $numeroIndic) {
                    echo ("<option value = \"" . $numeroIndic . "\" selected>(" . $nomPays . ") " . $numeroIndic . "</option>");
                } else {
                    echo ("<option value = \"" . $numeroIndic . "\">(" . $nomPays . ") " . $numeroIndic . "</option>");
                }
            }
            ?>
        </select>
        <br><br>

        <label for="phoneModif">N° de téléphone : </label><br>
        <input id="inputPhoneModif" type="text" name="phoneModif" value="<?php echo $phone ?>">
        <br><br>

        <label for="paysModif">Votre pays : </label><br>
        <select name="paysModif" id="inputPaysModif">
            <option value="">-- Sélectionnez votre pays --</option>
            <?php
            for ($i = 0; $i < count($allCountry); $i++) {
                if ($pays == $allCountry[$i]['Name']) {
                    echo ("<option value = \"" . $allCountry[$i]['Name'] . "\" selected>" . $allCountry[$i]['Name'] . "</option>");
                } else {
                    echo ("<option value = \"" . $allCountry[$i]['Name'] . "\">" . $allCountry[$i]['Name'] . "</option>");
                }
            }
            ?>
        </select>
        <br><br>

        <label for="natioModif">Nationalité : </label><br>
        <select name="natioModif" id="inputNationModif">
            <option value="">-- Sélectionnez votre nationalité --</option>
            <?php
            for ($i = 0; $i < count($allNation); $i++) {
                if ($natio == $allNation[$i]['Name']) {
                    echo ("<option value = \"" . $allNation[$i]['Name'] . "\" selected>" . $allNation[$i]['Name'] . "</option>");
                } else {
                    echo ("<option value = \"" . $allNation[$i]['Name'] . "\">" . $allNation[$i]['Name'] . "</option>");
                }
            }
            ?>
        </select>
        <br><br>

        <label for="radioChoicePro">Etes vous un pro : </label><br>

        <?php
        if ($pro == 0) {
            echo ("<input type=\"radio\" id=\"radioProParticulier\" name=\"radioChoicePro\" value=\"particulier\" checked>Un Particulier <br>");
            echo ("<input type=\"radio\" id=\"radioProProfessionnel\" name=\"radioChoicePro\" value=\"professionnel\">Un Professionnel <br>");
        } else {
            echo ("<input type=\"radio\" id=\"radioProParticulier\" name=\"radioChoicePro\" value=\"particulier\">Un Particulier <br>");
            echo ("<input type=\"radio\" id=\"radioProProfessionnel\" name=\"radioChoicePro\" value=\"professionnel\" checked>Un Professionnel <br>");
        }
        ?>
        <!-- <input type="radio" id="radioProParticulier" name="radioChoicePro" value="particulier" checked>Un Particulier <br>
            <input type="radio" id="radioProProfessionnel" name="radioChoicePro" value="professionnel" checked>Un Professionnel <br> -->


        <br><br>
        <div id="affichagePro">
            <label for="inputEntrepriseModif">Nom de l'entreprise : </label><br>
            <input id="inputEntrepriseModif" type="text" name="inputEntrepriseModif" value="<?php echo $entreprise ?>">
            <br><br>

            <label for="inputNumTvaModif">N° de TVA : </label><br>
            <input id="inputNumTvaModif" type="text" name="inputNumTvaModif" value="<?php echo $numeroTva ?>">
            <br><br>

            <label for="inputNumSiretModif">N° SIRET : </label><br>
            <input id="inputNumSiretModif" type="text" name="inputNumSiretModif" value="<?php echo $siret ?>">
            <br><br>

            <label for="inputNomContactModif">Nom du contact : </label><br>
            <input id="inputNomContactModif" type="text" name="inputNomContactModif" value="<?php echo $nomContact ?>">
            <br><br>

        </div>

        <input type="hidden" name="type" value="accountModif">

        <input type="submit" id="btnAccountModif" value="VALIDER LES CHANGEMENTS">

        <div id="divConfirmationMdp" class="clickDiv">
            <p class="clickDiv">Pour confirmer les changements, <br>
                veuillez rentrer votre mot de passe</p><br>
            <br>
            <input class="clickDiv" type="password" name="mdpVerifModif" br><br>
            <button class="clickDiv" id="validationMdpModif">VALIDER</button>
        </div>

    </form>
</div>



<!-- TABLEAU D'AFFICHAGE DES INFOS -->
<!-- TABLEAU D'AFFICHAGE DES INFOS -->
<div id="myAccountTable">
    <table>
        <tr id="tableHead">
            <th>Catégories</th>
            <th>Vos Infos</th>
        </tr>
        <tr id="trNom">
            <td>Nom : </td>
            <td class="shadowTd"><?php echo $nom; ?></td>
        </tr>
        <tr id="trPrenom">
            <td>Prénom : </td>
            <td class="shadowTd"><?php echo $prenom; ?></td>
        </tr>
        <tr id="trPseudo">
            <td>Pseudo : </td>
            <td class="shadowTd"><?php echo $pseudo; ?></td>
        </tr>
        <tr id="trMail">
            <td>Mail : </td>
            <td class="shadowTd"><?php echo $mail; ?></td>
        </tr>
        <tr id="trIndicPhone">
            <td>Indicatif : </td>
            <td class="shadowTd"><?php echo "+" . $indicPhone; ?></td>
        </tr>
        <tr id="trPhone">
            <td>N° de tel : </td>
            <td class="shadowTd"><?php echo $phone; ?></td>
        </tr>
        <tr id="trPays">
            <td>Pays : </td>
            <td class="shadowTd"><?php echo $pays; ?></td>
        </tr>
        <tr id="trNatio">
            <td>Nationalité : </td>
            <td class="shadowTd"><?php echo $natio; ?></td>
        </tr>
        <tr id="trPro">
            <td>Êtes vous un Pro : </td>
            <td class="shadowTd"><?php if ($pro == 1) {
                                        echo ("Oui");
                                    } else {
                                        echo "Non";
                                    }; ?></td>
        </tr>
        <tr id="trEntreprise">
            <td>Entreprise : </td>
            <td class="shadowTd"><?php echo $entreprise; ?></td>
        </tr>
        <tr id="trNumeroTva">
            <td>N° TVA : </td>
            <td class="shadowTd"><?php echo $numeroTva; ?></td>
        </tr>
        <tr id="trSiret">
            <td>N° Siret : </td>
            <td class="shadowTd"><?php echo $siret; ?></td>
        </tr>
        <tr id="trContact">
            <td>Contact Entreprise : </td>
            <td class="shadowTd"><?php echo $nomContact; ?></td>
        </tr>

    </table>
</div>

<div id="myAccountCars">
    <div id="searchCarDiv">
        <p>Rechercher une voiture existante</p>
        <label for="searchImmatInput">Immatriculation</label>
        <input type="text" name="searchImmatInput" id="searchImmatInput">
        <button id="searchImmatButton">Rechercher</button>
        <br><small>Évitez les espaces</small>
    </div>
    <div id="resultSearchCarDiv">

    </div>
    
</div>

</html>