<?php


$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/entity/Compte_User.php');



class ActivationController{


public static function getInfoById($id){

    $query = "SELECT `code_confirm`, `pseudo`, `prenom`, `mail` FROM `compte_user` WHERE `id`=$id";
        $rep = ConnexionCompte::$pdo->query($query);
        $rep->setFetchMode (PDO::FETCH_ASSOC);
        $tab_obj = $rep->fetchAll();
        return $tab_obj;

}

public static function getCodeByPseudo($pseudo){
    $query = "SELECT `code_confirm` FROM `compte_user` WHERE `pseudo`='$pseudo'";
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tab_obj = $rep->fetchAll();
    return $tab_obj;
}




}