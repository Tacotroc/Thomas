$(document).ready(function () {

    $parametresGet = getParams();
// Si on a le GET info = mailSended on affiche la div MAIL ENVOYED HAN
switch ($parametresGet['info']) {
    case 'mailSended':
        affichageInformation("Le code vous a été envoyé par mail. Vérifiez vos email, ( il se peut que le mail soit dans vos spam )");
        break;

        case 'wrongmdp':
        affichageInformation("Il semble que le mot de passe soit érroné, veuillez réessayer.");
        break;

        case 'wrongcode':
            affichageInformation("Il semble que le code est incorrect. Recopiez le code reçu dans votre boite mail et réessayez.");
        break;

  

    // case 
}

function affichageInformation($message){
    $('#informationDivText').text($message);
    $('#informationsDiv').fadeIn(500);
}


// VERIFICATION VIA PLUGIN JQUERY : VALIDATE
$('#validateMdpCodeForm').validate({
    rules: {
        codeVerif: {
            required: true,
            minlength: 6,
            maxlength: 6

        },
        mdpVerif: {
            required: true,
            minlength: 6
        }

    }
});
$.extend($.validator.messages, {
    required: "<br> Ce champ est obligatoire.",
    maxlength: $.validator.format("<br> Veuillez fournir au plus {0} caractères."),
    minlength: $.validator.format("<br> Veuillez fournir au moins {0} caractères.")
});

/* On écoute les clique souris de la page */
    /* Pour fermer  SI LE CLIQUE A LIEU EN DEHORS DES 2 FENETRE DE CONNEXION*/
    $(document.body).on('click', function (e) {
        e.stopPropagation();
console.log(event.target.classList);
        if(event.target.classList.contains("clickDiv")){
            $mouseOut = false;
        }else{
            $mouseOut = true;
        }

        if($mouseOut == true) {
            $('div.clickDiv').fadeOut(500);

        }

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

});












