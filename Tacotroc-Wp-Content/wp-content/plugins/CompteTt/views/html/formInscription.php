<?php

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/controller/inscriptionController.php');

$allCountry = getAllCountryController();
$allNation = getAllNationalityController();
$indics = getIndicCountry();





?>

<head>

</head>
<br><br><br>
<div id="divFormulaire">



    <form action="/wp-content/plugins/CompteTt/controller/compteRouting.php" method="POST" id="formNewCompte">
    <?php 

    if($_SESSION && isset($_SESSION) && isset($_SESSION['connected'])){
        var_dump($_SESSION); 

    }
    
    
    ?>
        <div class="divForm">

            <h3 id="titreInscription">Inscription</h3>

            <div id="divErrorMessage">
                <p id="fermerErrorMessage">FERMER</p>
                <p id="errorMessage"></p>
            </div>

            <div id="aide">
                <p>BESOIN D'AIDE ? CLIQUEZ ICI</p>
            </div>
            <div class="clickDiv" id="indication">
                <p class="clickDiv" id="fermerAide">x</p>
                <p class="clickDiv">Les champs indiqués par une étoiles sont obligatoires.<br>
                    Des indications vous guidront au fur et à mesures du remplissage<br>
                    N'utilisez pas de caractères spéciaux.</p>
            </div>

            <br><br>

            <label for="nom"><abbr title="Champ requis" class="asterix">* </abbr>Indiquez votre Nom</label><br>
            <input id="inputNom" type="text" name="nom" placeholder="Indiquez votre nom..." size="50">
            <br><br>
            
            <label for="prenom"><abbr title="Champ requis" class="asterix">* </abbr>Indiquez votre prénom</label><br>
            
            <input id="inputPrenom" type="text" name="prenom" placeholder="Indiquez votre prénom..." size="50">
            <br><br>

            
            <label for="pseudo"><abbr title="Champ requis" class="asterix">* </abbr>Choisissez un pseudo</label><br>
            <small>Les espaces et les caractères spéciaux sont interdits</small><br>
            <input id="inputPseudonyme" type="text" name="pseudo" placeholder="choisissez un pseudo..." size="20">
            <br><br>



            <label for="mdp"><abbr title="Champ requis" class="asterix">* </abbr>Choisissez un mot de passe</label><br>
            <small>Les espaces et les caractères spéciaux sont interdits</small><br>
            <input id="inputMdpOne" type="password" name="mdp" placeholder="choisissez un mot de passe..." size="20">

            <br><br>

            <label for="mdpConfirm"><abbr title="Champ requis" class="asterix">* </abbr>Confirmer votre mot de passe</label><br>
            <small>Les espaces et les caractères spéciaux sont interdits</small><br>
            <input id="inputMdpVerif" type="password" name="mdpConfirm" placeholder="Retapez votre mot de passe..." size="20">
            <br><br>


            <label for="mailAddress"><abbr title="Champ requis" class="asterix">* </abbr>Rentrez votre adresse e-mail</label><br>
            <input id="inputMailOne" type="email" name="mailAddress" placeholder="Rentrez votre adresse mail" size="70">
            <br><br>


            <label for="mailConfirm"><abbr title="Champ requis" class="asterix">* </abbr>Confirmez votre adresse e-mail</label><br>
            <input id="inputMailVerif" type="email" name="mailConfirm" placeholder="Confirmez votre adresse e-mail" size="70">
            <br><br>

            <label for="inputIndicatif"><abbr title="Champ requis" class="asterix">* </abbr>indicatif du numéro de téléphone</label><br>
            <select name="indicCountry" id="selectIndicCountry">
                <option value="">-- Sélectionnez l'indicatif --</option>
                <?php
                foreach ($indics as $nomPays=>$numeroIndic) {
                    echo ("<option value = \"" . $numeroIndic . "\">(" . $nomPays . ") " . $numeroIndic . "</option>");
                }
                ?>
            </select>

            <label for="phone"><abbr title="Champ requis" class="asterix">* </abbr>Votre numéro de téléphone</label><br>
            <input id="inputPhone" type="text" name="phoneNumber" placeholder="indiquez votre numéro de téléphone" size="10">
            <br><br>


            <label for="country">><abbr title="Champ requis" class="asterix">* </abbr>Sélectionnez votre pays</label><br>
            <select name="country" id="selectCountry">
                <option value="">-- Sélectionnez votre pays --</option>
                <?php
                for ($i = 0; $i < count($allCountry); $i++) {
                    echo ("<option value = \"" . $allCountry[$i]['Name'] . "\">" . $allCountry[$i]['Name'] . "</option>");
                }
                ?>

            </select>

            <label for="nationality">Sélectionnez votre nationalité</label>
            <select name="nationality" id="selectNatio">
                <option value="">-- Sélectionnez votre nationalité --</option>
                <?php
                for ($i = 0; $i < count($allNation); $i++) {
                    echo ("<option value = \"" . $allNation[$i]['Name'] . "\">" . $allNation[$i]['Name'] . "</option>");
                }
                ?>


            </select>

            <label for="radioChoicePro"><abbr title="Champ requis" class="asterix">* </abbr> Je suis : <br>
            <input type="radio" id="radioProParticulier" name="radioChoicePro" value="particulier" checked>Un Particulier <br>
            <input type="radio" id="radioProProfessionnel" name="radioChoicePro" value="professionnel">Un Professionnel </label><br>
            <br><br>

            <div id="formPro">
                <label for="entreprise">Nom Entreprise</label><br>
                <input id="inputNomEntreprise" type="text" name="entreprise" placeholder="entrez le nom de voter entreprise" size="70">
                <br><br>

                <label for="numTva">Votre numéro TVA</label><br>
                <small>Numéro composé de 11 chiffres (sans le 'FR' devant)</small><br>
                <input  id="inputNumTva" type="text" name="numTva" placeholder="entrez votre numéro de TVA">
                <br><br>

                <label for="numeroSiret">Numéro SIRET</label><br>
                <small>numéro composé de 14 chiffres</small><br>
               
                <input id="inputSiret" type="text" name="numeroSiret" placeholder="entrez le numero SIRET" size="14">
                <br><br>

                <label for="nomContactEntreprise">Nom du contact</label><br>
                <input id="inputContactEntreprise" type="text" name="nomContactEntreprise" placeholder="Entrez le nom du contact" size="50">
                <br><br>
            </div>

            <input name="jsTraitement" id="jsTrainement" type="hidden" value="0">
            <input type="hidden" name="type" value="add_new_account">

            <input type="submit" id="btnInscription" value="VALIDER">


        </div>
    </form>
</div>