<?php

$route = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt';
require_once($route . '/connexionPDO/ConnexionCompte.php');
require_once($route . '/controller/activationController.php');



if($_SESSION && isset($_SESSION['active']) && $_SESSION['active'] == 1){
    header("Status: 301 Moved Permanently", false, 301);
    header('location:/myaccount');
}


if ($_GET && isset($_GET) && !empty($_GET['id'])) {

    $codeVerif = activationController::getInfoById($_GET['id']);

    $_SESSION['code_confirm'] = $codeVerif[0]['code_confirm'];
    $_SESSION['pseudo'] = $codeVerif[0]['pseudo'];
    $_SESSION['prenom'] = $codeVerif[0]['prenom'];
    $_SESSION['mail'] = $codeVerif[0]['mail'];
    $_SESSION['id'] = $_GET['id'];

    // var_dump($codeVerif);
    // echo ($codeVerif[0]['code_confirm']);
    // var_dump($_SESSION);

    if (empty($codeVerif[0])) {
    }
} else {
    header("Status: 301 Moved Permanently", false, 301);
    header('location:/?info=noIdActivation');
}

?>


<div class="clickDiv" id="informationsDiv">
    <p id="informationDivText" class="clickDiv">
        
    </p>
</div>
<div id="retryMailCodeDiv">
    <form action="/wp-content/plugins/CompteTt/controller/compteRouting.php" method="POST">

        <p>Me renvoyer le code d'activation par mail.</p>

        <input type="submit" value="RENVOYER LE CODE">
        <input type="hidden" name="type" value="reSendMail">


    </form>
</div>

<br><br>

<div id="activationDiv">
    <form action="/wp-content/plugins/CompteTt/controller/compteRouting.php" method="POST" id="validateMdpCodeForm">


        <label for="codeVerif">CODE DE VERIFICATION : </label><br><br>
        <input type="text" name="codeVerif" placeholder="entrez ici votre code"><br><br>

        <label for="mdpVerif">Votre mot de passe : </label><br><br>
        <input type="password" name="mdpVerif" placeholder="confirmez votre mot de passe">
        <br><br>

        <input type="submit" value="VALIDER">


        <input type="hidden" name="type" value="activation">

    </form>
</div>