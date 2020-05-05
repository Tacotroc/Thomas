<script src="https://kit.fontawesome.com/97a4ad4f3c.js" crossorigin="anonymous"></script>

<?php
// var_dump($_POST);
// var_dump($_SESSION);



// FONCTION POUR RECUPERER LE CHEMIN DES FICHIERS HTTP OU HTTPS
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
     $route = "https://".$_SERVER['HTTP_HOST'].'/wp-content/plugins/CompteTt';
   }
    else{
      $route = "http://".$_SERVER['HTTP_HOST'].'/wp-content/plugins/CompteTt';
    }

?>

<div class="clickDiv" id="informationsDiv">
    <p id="informationDivText" class="clickDiv">
        
    </p>
</div>

<!-- BOUTON MON COMPTE -->
<!--  -->
<div id="buttonMyAccount">
    <span>
        Compte
    </span>

</div>

<!-- DIV POUR SE CONNECTER OU S'INSCRIRE -->
<div id="divConnexion" class="clickDiv">



    <div id="inscription" class="clickDiv">
        <a class="clickDiv" id="insP" href="/inscription">

            <p class="clickDiv">
                <img class="clickDiv" src="<?php echo $route."/views/images/subscrib.png" ; ?>" alt="">
                <br>
                INSCRIPTION</p>
        </a><br>
        <small class="clickDiv">Si vous n'avez pas encore de compte</small>
    </div>

    <div class="clickDiv" id="connexionCompte">
        <a class="clickDiv" id="conP" href="#">
            <p class="clickDiv">
            <img class="clickDiv" src="<?php echo $route."/views/images/account.png" ; ?>" alt="">
                <br>
                CONNEXION</p>
        </a><br>
        <small class="clickDiv">Connectez-vous à votre compte</small>

    </div>
</div>


<!-- DIV POUR LA CONNEXION AVEC LOGIN ET MOT DE PASSE -->
<div class="clickDiv" id="divConnexionCompte">

    <!-- <span id="croixConnexion"><a href="#">X</a></span>  -->

    <form class="clickDiv" method="POST" action="/wp-content/plugins/CompteTt/controller/compteRouting.php" id="formConnexionCompte" enctype="application/x-www-form-urlencoded">
        
        <label class="clickDiv" for="inputPseudo">Pseudo</label>
        
        <input class="clickDiv" id="inputPseudo" name="inputPseudo" type="text">
        <br>
        <label class="clickDiv" for="inputPassword">Mot de passe</label>
        
        <input class="clickDiv" name="inputPassword" type="password">
        <br>
        <input class="clickDiv" name="type" type="hidden" value="verifConnexion">


        <label class="clickDiv" id="labelStay" for="inputStayConnected">Rester connecté ? <i class="clickDiv fas fa-check" style="display:none;" id="iconCheck"></i>
            <input class="clickDiv" type="checkbox" id="stayConnected" name="inputStayConnected" value="stay">

        </label>


        <div class="clickDiv" id="divDuButton">
            <input class="clickDiv" type="submit" id="buttonConnexionCompte" value="Valider">
        </div>
    </form>
</div>