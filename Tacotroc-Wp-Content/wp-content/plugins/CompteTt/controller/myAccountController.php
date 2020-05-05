<?php


$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/entity/Compte_User.php');


class myAccountController{

    public static function updatingAccount(){

        var_dump($_POST);
        // Traitement des variables et mise au normes, vérifications, etc...
        if($_SESSION && isset($_SESSION) && $_POST && isset($_POST)){

            $id = $_SESSION['id'];
            
            $nom = strtoupper($_POST['nomModif']);

            $prenom = strtoupper($_POST['prenomModif']);


            $indic = $_POST['indicModif'];

            $phone = $_POST['phoneModif'];


            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }


            $country = $_POST['paysModif'];

            $natio = $_POST['natioModif'];

            // SI LE CLIENT EST UN PRO ON RECUPERE LES VARIABLES
            if ($_POST['inputEntrepriseModif'] && !empty($_POST['inputEntrepriseModif'])) {
                $pro = true;

                $entreprise = $_POST['inputEntrepriseModif'];

                $numTva = $_POST['inputNumTvaModif'];

                $siret = $_POST['inputNumSiretModif'];

                $contactEntreprise = $_POST['inputNomContactModif'];
            } else {
                $pro = false;
                $entreprise = "";
                $numTva = "";
                $siret = "";
                $contactEntreprise = "";
            }

            echo ($id);
            echo ("<br>" . $nom);
            echo ("<br>" . $prenom);
            echo ("<br>" . $indic);
            echo ("<br>" . $phone);
            echo ("<br>" . $ip);
            echo ("<br>" . $country);
            echo ("<br>" . $natio);
            echo ("<br>" . $pro);
            echo ("<br>" . $entreprise);
            echo ("<br>" . $numTva);
            echo ("<br>" . $siret);
            echo ("<br>" . $contactEntreprise);

           Compte_User::updateAccount($id, $nom, $prenom, $indic, $phone, $ip, $country, $natio, $pro, $entreprise, $numTva, $siret, $contactEntreprise);
           
        }
    }





}