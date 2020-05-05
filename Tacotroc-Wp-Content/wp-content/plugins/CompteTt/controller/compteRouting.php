<?php
session_start();

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt/controller/';
// echo $_SERVER['DOCUMENT_ROOT'] . '<br>';
// echo $route . '<br>';
require_once $route . 'validateFormController.php';
$route = $route . '/controller/';
require_once $route . 'verifConnexionController.php';
$route = $route . '/controller/';
require_once $route . 'myAccountController.php';
$route = $route . '/controller/';
require_once $route . 'activationController.php';



if (isset($_POST['type'])) {
    switch ($_POST['type']) {

            // ENREGISTREMENT D'UN NOUVEAU COMPTE
        case 'add_new_account':

            validateFormController::validateNewAccount($_POST);

            break;

            // VERIFICATION DE LA CONNEXION
        case 'verifConnexion':
            $loginTemp = $_POST['inputPseudo'];
            $mdpTemp = $_POST['inputPassword'];

            // Vérification et récupération si le login existe
            $exist = verifConnexionController::verifLoginExiste($loginTemp);

            if ($exist) {
                // Si il existe : on vérifie le mot de passe
                $response = verifConnexionController::verifConnexion($loginTemp, $mdpTemp);

                if (isset($response[1])) {
                    header("Status: 301 Moved Permanently", false, 301);
                    header('location:/?info=error');
                }

                if ($_SESSION['connected'] == "ok") {

                    $_SESSION['id'] = $response[0]['id'];
                    $_SESSION['nom'] = $response[0]['nom'];
                    $_SESSION['prenom'] = $response[0]['prenom'];
                    $_SESSION['pseudo'] = $response[0]['pseudo'];
                    $_SESSION['mail'] = $response[0]['mail'];
                    $_SESSION['indicPhone'] = $response[0]['indicPhone'];
                    $_SESSION['phone'] = $response[0]['phone'];
                    $_SESSION['pays'] = $response[0]['pays'];
                    $_SESSION['nation'] = $response[0]['natio'];
                    $_SESSION['pro'] = $response[0]['pro'];
                    $_SESSION['entreprise'] = $response[0]['entreprise'];
                    $_SESSION['numeroTva'] = $response[0]['numeroTva'];
                    $_SESSION['siret'] = $response[0]['siret'];
                    $_SESSION['nonContact'] = $response[0]['nomcontact'];
                    $_SESSION['code_confirm'] = $response[0]['code_confirm'];
                    $_SESSION['active'] = $response[0]['active'];


                    header("Status: 301 Moved Permanently", false, 301);
                    header('location:/myaccount');
                } else {
                    header("Status: 301 Moved Permanently", false, 301);
                    header('location:/?info=wrongmdp');
                }
            } else {
                header("Status: 301 Moved Permanently", false, 301);
                header('location:/?info=wrongpseudo');
            }



            break;


        case 'accountModif':


            $hash =  Compte_User::getHashByPseudo($_SESSION['pseudo']);

            $verify = Compte_User::connexionAccount($hash[0]['mdp'], $_POST['mdpVerifModif']);


            if ($verify == true) {
                myAccountController::updatingAccount();

                $response = Compte_User::getInfoAccount($_SESSION['pseudo']);

                $_SESSION['connected'] == "ok";

                $_SESSION['id'] = $response[0]['id'];
                $_SESSION['nom'] = $response[0]['nom'];
                $_SESSION['prenom'] = $response[0]['prenom'];
                $_SESSION['pseudo'] = $response[0]['pseudo'];
                $_SESSION['mail'] = $response[0]['mail'];
                $_SESSION['indicPhone'] = $response[0]['indicPhone'];
                $_SESSION['phone'] = $response[0]['phone'];
                $_SESSION['pays'] = $response[0]['pays'];
                $_SESSION['nation'] = $response[0]['natio'];
                $_SESSION['pro'] = $response[0]['pro'];
                $_SESSION['entreprise'] = $response[0]['entreprise'];
                $_SESSION['numeroTva'] = $response[0]['numeroTva'];
                $_SESSION['siret'] = $response[0]['siret'];
                $_SESSION['nonContact'] = $response[0]['nomcontact'];
                $_SESSION['code_confirm'] = $response[0]['code_confirm'];
                $_SESSION['active'] = $response[0]['active'];



                header("Status: 301 Moved Permanently", false, 301);
                header('location:/myaccount?info=infoChanged');
            } else {
                header("Status: 301 Moved Permanently", false, 301);
                header('location:/myaccount?info=wrongmdp');
            }

            break;

        case 'activation':
            var_dump($_POST);
            var_dump($_SESSION);

            $codeInDb = ActivationController::getCodeByPseudo($_SESSION['pseudo']);
            var_dump($codeInDb);

            if ($codeInDb[0]['code_confirm'] == $_POST['codeVerif']) {
                $hash =  Compte_User::getHashByPseudo($_SESSION['pseudo']);
                var_dump($hash);
                $verify = Compte_User::connexionAccount($hash[0]['mdp'], $_POST['mdpVerif']);


                if ($verify) {
                    Compte_User::activateAccountByPseudo($_SESSION['pseudo']);
                    $response = Compte_User::getInfoAccount($_SESSION['pseudo']);

                    $_SESSION['connected'] = "ok";

                    $_SESSION['id'] = $response[0]['id'];
                    $_SESSION['nom'] = $response[0]['nom'];
                    $_SESSION['prenom'] = $response[0]['prenom'];
                    $_SESSION['pseudo'] = $response[0]['pseudo'];
                    $_SESSION['mail'] = $response[0]['mail'];
                    $_SESSION['indicPhone'] = $response[0]['indicPhone'];
                    $_SESSION['phone'] = $response[0]['phone'];
                    $_SESSION['pays'] = $response[0]['pays'];
                    $_SESSION['nation'] = $response[0]['natio'];
                    $_SESSION['pro'] = $response[0]['pro'];
                    $_SESSION['entreprise'] = $response[0]['entreprise'];
                    $_SESSION['numeroTva'] = $response[0]['numeroTva'];
                    $_SESSION['siret'] = $response[0]['siret'];
                    $_SESSION['nonContact'] = $response[0]['nomcontact'];
                    $_SESSION['code_confirm'] = $response[0]['code_confirm'];
                    $_SESSION['active'] = $response[0]['active'];



                    header("Status: 301 Moved Permanently", false, 301);
                    header('location:/myaccount?info=activated');
                } else {
                    header("Status: 301 Moved Permanently", false, 301);
                    header('location:/activation?info=wrongmdp&id=' . $_SESSION['id']);
                }
            } else {
                header("Status: 301 Moved Permanently", false, 301);
                header('location:/activation?info=wrongcode&id=' . $_SESSION['id']);
            }

            break;


        case 'reSendMail':
            // TEST MAIL
            $to = $_SESSION['mail'];
            $subject = "test";
            $message = "<html>  <div style=\"text-align: center\">" .
                "<p>Bonjour " . $_SESSION['prenom'] . " ! <br><br>" .
                "<h3> Merci d'activer votre compte <br><br> en cliquant sur le lien ci dessous 
                pour rentrer votre code confidentiel</h3>" .
                "<br><br>" .
                "<h2> Votre code : " . $_SESSION['code_confirm'] . "</h2>" .
                "<br><br>" .
                "<a href='http://tacotroc.com/activation?id=" . $_SESSION['id'] . "'><p> CLIQUEZ ICI </p></a>" .
                "<br><br>" .
                " Thomas de tacotroc.com <br><br>" .
                "<img src=\"https://i.ibb.co/6m6vy57/tacotroc-Logo.jpg\" alt=\"tacotroc-Logo\" border=\"0\"></div></html>";


            mail($to, $subject, $message, "Content-type: text/html; charset=iso-8859-1");

            header("Status: 301 Moved Permanently", false, 301);
            header("Location:/activation?info=mailSended&id=" . $_SESSION['id']);

            break;





            // ON GERE LES PETITS MALINS QUI MODIFIENT MES CHAMPS HIDDEN
        default:
            echo 'NOPE !';
    }
}


if (isset($_GET) && $_GET['action'] && $_GET['action'] == 'delete' && $_GET['id']) {
    $ok = Compte_User::deleteAccountById($_GET['id']);

    if ($ok) {
        header("Status: 301 Moved Permanently", false, 301);
        header("Location:/wp-admin/admin.php?page=compte&info=deleteOk");
    }else{
        header("Status: 301 Moved Permanently", false, 301);
        header("Location:/wp-admin/admin.php?page=compte&info=noDelete");
    }
}
