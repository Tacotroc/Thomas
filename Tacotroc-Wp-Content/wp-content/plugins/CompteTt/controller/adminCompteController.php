<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/CompteTt/connexionPDO/ConnexionCompte.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/CompteTt/entity/Compte_User.php');


// Fonction qui retourne le nom des colonne d'une table (argument)
///////////////////////////////////////////////////////////////////
function getNameColumn($nameTable){
        $query = "SELECT column_name FROM information_schema.columns WHERE table_name='$nameTable'";
        $rep = ConnexionCompte::$pdo->query($query);
        $rep->setFetchMode (PDO::FETCH_ASSOC);
        $tab_obj = $rep->fetchAll();
        return $tab_obj;
      
}

function tableAllUsers(){
    return Compte_User::getAllUserAccount();
}
