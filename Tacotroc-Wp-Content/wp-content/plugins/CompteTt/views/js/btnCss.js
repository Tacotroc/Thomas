$(document).ready(function () {


    console.log(getParams());
    $parametresGet = getParams();

    // Si on a le GET info = infoChanged => ON AFFICHE LA DIV DE CONFIRMATION
    switch ($parametresGet['info']) {
        case 'registered':
            affichageInformation("Votre inscription à bien été prise en compte. Un lien vous a été transmit par mail, merci de vérifier votre boite mail.");;
            break;

        case 'wrongmdp':
            affichageInformation("Il semble que le mot de passe soit érroné, veuillez rééssayer.");
            break;

        case 'wrongpseudo':
            affichageInformation("Il semble que ce pseudo n'existe pas.");
            break;

        // case 
    }
    function affichageInformation($message) {
        $('#informationDivText').text($message);
        $('#informationsDiv').fadeIn(500);
    }


    // EVENT CLIQUE SUR LE BOUTON COMPTE
    $('#buttonMyAccount').on('click', function (e) {
        e.stopPropagation()

        $('#divConnexion').fadeIn(500);

        $('#divConnexion').css('display', 'flex');




    })
    var $mouseOut = false;

    /* On écoute les clique souris de la page */
    /* Pour fermer  SI LE CLIQUE A LIEU EN DEHORS DES 2 FENETRES DE CONNEXION*/
    $(document.body).on('click', function (e) {
        e.stopPropagation();
        console.log(event.target.classList);
        if (event.target.classList.contains("clickDiv")) {
            $mouseOut = false;
        } else {
            $mouseOut = true;
        }

        if ($mouseOut == true) {
            $('#divConnexion').fadeOut(500);
            $('#divConnexionCompte').fadeOut(500);
            $('#informationsDiv').fadeOut(500);

        }

    })

    // EVENT sur l'option RESTER CONNECTE
    $('input[type=checkbox][name=inputStayConnected]').on('change', function () {
        if ($('#stayConnected').prop('checked') == true) {
            $('#iconCheck').show();
        } else {
            $('#iconCheck').hide();
        }
    })
    // Event du click sur l'icone pour décocher
    $('#iconCheck').on('click', function () {
        if ($('#stayConnected').prop('checked') == true) {
            $('#iconCheck').hide();
            $('input[type=checkbox][name=inputStayConnected]').prop('checked', false);
        } else {
            $('#iconCheck').show();
        }
    })


    // EVENT CLIQUE SUR SE CONNECTER
    $('#conP').on('click', function () {

        $('#divConnexionCompte').fadeIn(500);
        // $('#divConnexionCompte').css('display','flex');
        // $('#divConnexionCompte').css('flex-direction','column');
    })

    // EVENT CLIQUE SUR LE BOUTON "VALIDER" POUR SE CONNECTER
    $('#buttonConnexionCompte').on('click', function (e) {
        e.preventDefault();


        /* Activation du bouton "valider" */
        $('#formConnexionCompte').submit();
    })






    // EVENT CROIX INSCRIPTION/CONNEXION
    $('#croixCompte').on('click', function (e) {
        e.preventDefault();
        $('#divConnexion').fadeOut(250);
    })

    // EVENT CROIX CONNEXION COMPTE
    $('#croixConnexion').on('click', function (e) {
        e.preventDefault();
        $('#divConnexionCompte').fadeOut(250);
    })


    // FONCTION DE RECUPERATION DES PARAMETRES DE L'URL
    function getParams() {
        var url = window.location.href;
        var splitted = url.split("?");
        if (splitted.length === 1) {
            return {};
        }
        var paramList = decodeURIComponent(splitted[1]).split("&");
        var params = [];
        for (var i = 0; i < paramList.length; i++) {
            var paramTuple = paramList[i].split("=");
            params[paramTuple[0]] = paramTuple[1];
        }
        return params;
    }



})

