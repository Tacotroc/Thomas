<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/CompteTt/connexionPDO/ConnexionCompte.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/CompteTt/entity/Compte_User.php');

// Fonction qui inscrit un nouveau compte
///////////////////////////////////////////////////////////////////





// Récupération de la liste des PAYS présents dans la base
///////////////////////////////////////////////////////////////////
function getAllCountryController(){
    $query = 'SELECT * FROM twp_Country ORDER BY Name';
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tabCountry=$rep->fetchAll();
    return $tabCountry;
}


// Récupération de la liste des nationalités présentes dans la base
///////////////////////////////////////////////////////////////////

function getAllNationalityController(){
    $query = 'SELECT id,Name FROM twp_Nationality ORDER BY Name';
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tabNatio=$rep->fetchAll();
    return $tabNatio;
}

// Récupération des indicatifs des pays

function getIndicCountry(){

    return $tabPaysIndic = [
        "Autriche" => 43, "Belgique" => 32,
        "Bosnie-Herzegovine" => 387, "Croatie" => 385,
        "République Tcheque" => 420, "Danemarque" => 45,
        "Estonie" => 372, "Finlande" => 358,
        "France" => 33, "Allemagne" => 49,
        "Gibraltar" => 350, "Royaume-Uni" => 44,
        "Grèce" => 30, "Hongrie" => 36,
        "Irlande" => 353, "Italie" => 39,
        "Lettonie" => 371, "Montenegro" => 382,
        "Pays-Bas" => 31, "Norvège" => 47,
        "Pologne" => 48, "Portugal" => 351,
        "Russie" => 7, "Slovaquie" => 421,
        "Slovénie" => 386, "Espagne" => 34,
        "Suède" => 46, "Suisse" => 41,
        "Turquie" => 90
    ];
}





