<?php

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/entity/Compte_User.php');

// TRAITEMENT DE LA REQUETE POST AVEC TRAITEMENT DES VARIABLES
// EXEMPLE : MISE EN MAJUSCULE, ETC...

class validateFormController
{


    public static function validateNewAccount()
    {

        session_destroy();

        if ($_POST && !empty($_POST)) {


            // NOM DU CLIENT EN MAJUSCULE
            $name = strtoupper($_POST['nom']);

            // PRENOM DU CLIENT EN MAJUSCULE
            $prenom = strtoupper($_POST['prenom']);

            // PSEUDO DU CLIENT
            $pseudo = $_POST['pseudo'];

            // MOT DE PASSE DU CLIENT
            if ($_POST['mdp'] == $_POST['mdpConfirm'] && isset($_POST['mdp'])) {
                $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
            }

            // ADRESSE MAIL DU CLIENT
            if ($_POST['mailAddress'] == $_POST['mailConfirm'] && isset($_POST['mailAddress'])) {
                $mail = $_POST['mailAddress'];
            }

            //INDIC TELEPHONIQUE
            $indicPhone = $_POST['indicCountry'];

            // NUMERO TELEPHONE
            $phone = $_POST['phoneNumber'];

            //ADRESSE IP DU CLIENT
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            // PAYS DU CLIENT
            $country = $_POST['country'];

            // NATIONALITE SELECTIONNEE
            $natio = $_POST['nationality'];

            // SI LE CLIENT EST UN PRO ON RECUPERE LES VARIABLES
            if ($_POST['entreprise'] && !empty($_POST['entreprise'])) {
                $pro = true;

                $entreprise = $_POST['entreprise'];

                $numTva = $_POST['numTva'];

                $siret = $_POST['numeroSiret'];

                $contactEntreprise = $_POST['nomContactEntreprise'];
            } else {
                $pro = false;
                $entreprise = "";
                $numTva = "";
                $siret = "";
                $contactEntreprise = "";
            }
            // GENERATION DU CODE HAN
            $codeConfirm = rand(111111, 999999);
            // ACTIVATION A NON
            $active = false;
            // ENVOI DU MAIL


            Compte_User::registerNewAccount(
                $name,
                $prenom,
                $pseudo,
                $mdp,
                $mail,
                $indicPhone,
                $phone,
                $ip,
                $country,
                $natio,
                $pro,
                $entreprise,
                $numTva,
                $siret,
                $contactEntreprise,
                $codeConfirm,
                $active
            );

            $info = Compte_User::getInfoAccount($pseudo);
            $idNewUser = $info[0]['id'];

            // TEST MAIL
            $to = $mail;
            $subject = "test";
            $message = "<html>  <div style=\"text-align: center\">" .
                "<p>Bonjour " . $prenom . " ! <br><br>" . 
                "<h3> Merci d'activer votre compte <br><br> en cliquant sur le lien ci dessous 
                pour rentrer votre code confidentiel</h3>" .
                "<br><br>" .
                "<h2> Votre code : " . $codeConfirm . "</h2>" . 
                "<br><br>" . 
                "<a href='http://tacotroc.com/activation?id=" . $idNewUser . "'><p> CLIQUEZ ICI </p></a>" .
                "<br><br>" .
                " Thomas de tacotroc.com <br><br>" . 
                "<img src=\"https://i.ibb.co/6m6vy57/tacotroc-Logo.jpg\" alt=\"tacotroc-Logo\" border=\"0\"></div></html>";


            mail($to, $subject, $message, "Content-type: text/html; charset=iso-8859-1");


            header("Status: 301 Moved Permanently", false, 301);
            header("Location:/?info=registered");

        } else {
            echo ("<h2> OOPS, Vous n'auriez pas du vous retrouver ici ! <br>
            Redirection dans 3... 2... 1... </h2><br>
            <a href='javascript:history.back()'><p>Cliquez ici pour revenir à l'accueil</p></a>");
        }
    }
}