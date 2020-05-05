<?php
$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once $route . '/controller/adminCompteController.php';
$base = plugin_dir_url(__DIR__);

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $link = "https://" . $_SERVER['HTTP_HOST'] . '/wp-content/plugins/CompteTt';
} else {
    $link = "http://" . $_SERVER['HTTP_HOST'] . '/wp-content/plugins/CompteTt';
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des utilisateurs</title>
</head>

<body>

    <div hidden id="waitingImg">
        <img src="<?php echo ($base . 'images/waitingSearchAdmin.gif') ?>" alt="">
    </div>

    <head>
        <h3>Bienvenue dans la gestion de vos utilisateurs</h3>
        <h4>Liste des USERS</h4>
    </head>

    <div id="searchZone">
        <input name="searchInput" placeholder="Qu'est-ce que vous recherchez..." id="searchInput" type="text">

        <select name="searchCrit" id="searchSelect">
            <option value="nameOption">Recherche par NOM</option>
            <option value="prenomOption">Recherche par PRENOM</option>
            <option value="immatOption">Recherche par IMMATRICULATION</option>
            <option value="marqueOption">Recherche par MARQUE</option>
        </select>

        <button id="searchBtn">RECHERCHER</button>

    </div>

    <div id="resultSearch">
        <h3>Résultat de la recherche : </h3>
        <table id="resultSearchTable">


        </table>
    </div>

    <div id="gestionUsers">
        <div id="tabAll">
            <table>


                <th>ID</th>
                <th>infos</th>
                <th>Pro ? </th>
                <th>Contacts/Pays</th>
                <th>Dates</th>
                <th>Gestion</th>
                <?php

                $allUsers = tableAllUsers();
                foreach ($allUsers as $key => $user) {
                    echo ("<tr>");
                    echo ("<td>" . $user['id'] . "</td>");
                    echo ("<td>" . $user['nom'] . " " . $user['prenom'] .
                        "<br> mail : " . $user['mail'] .
                        "<br> pseudo : " . $user['pseudo'] .
                        "<br> IP : " . $user['address_ip'] . "</td>");

                    // AFFICHAGE OU NON DES INFOS PRO
                    if ($user['pro'] == 0) {
                        echo ("<td> Non </td>");
                    } else {
                        echo ("<td> Entreprise : " . $user['entreprise'] .
                            "<br> N° TVA : " . $user['numeroTva'] .
                            "<br> N° SIRET : " . $user['siret'] .
                            "<br> Nom Contact : " . $user['nomcontact'] . "</td>");
                    }


                    echo ("<td> Pays : " . $user['pays'] .
                        "<br> Nationalité : " . $user['natio'] .
                        "<br> tel : +" . $user['indicPhone'] . " " . $user['phone'] . "</td>");
                    echo ("<td>inscription : " . $user['date_inscription'] .
                        "<br> activation : " . $user['date_activation'] . "</td>");


                ?>
                    <td>
                        <img src="<?php echo ($base . 'images/loupeCompte.png') ?>" alt="Error">

                        <a class="btnDelete" href="<?php echo ($link . "/controller/compteRouting.php?id=" . $user['id'] . "&action=delete"); ?>">
                            <img src="<?php echo ($base . 'images/delete.png') ?>" alt="">
                        </a>
                    </td>

                <?php
                    echo ("</tr>");
                }
                ?>






            </table>

        </div>

        <div id="optionUser">

        </div>
    </div>

    <div id="alert">
        <p id="messageAlert">

        </p>
        <a id="theDeleteLink" href="">
            <button>CONFIRMER</button>
        </a>
        <button id="closeDeleteBox">Non</button>
    </div>

    <div class="clickDiv" id="informationsDiv">
        <p id="informationDivText" class="clickDiv"></p>
    </div>

</body>

</html>