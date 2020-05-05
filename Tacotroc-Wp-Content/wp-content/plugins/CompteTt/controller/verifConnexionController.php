<?php

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/entity/Compte_User.php');



class VerifConnexionController
{



    // Vérification si le login existe
    public static function verifLoginExiste($login)
    {
        return  Compte_User::verifExisteLogin($login);
    }

    // Vérification de la connexion
    public static function verifConnexion($login, $mdp)
    {

        $hash = Compte_User::getHashByPseudo($login);
        var_dump($hash);

        $response = Compte_User::connexionAccount($hash[0]['mdp'], $mdp);
        if ($response == false) {

            $_SESSION['connected'] = "no";
            return false;
            
        } else {

            $infoAccount = Compte_User::getInfoAccount($login);
            $_SESSION['connected'] = "ok";
            return $infoAccount;
        }
    }
}
