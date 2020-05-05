$(document).ready(function () {


    $parametresGet = getParams();

    // Si on a le GET info = infoChanged => ON AFFICHE LA DIV DE CONFIRMATION
    switch ($parametresGet['info']) {
        case 'deleteOk':
            affichageInformation("L'utilisateur a bien été supprimé !");
            break;

        case 'noDelete':
            affichageInformation("L'utilisateur n'as pas pu être supprimé !");
            break;
        // case 
    }

    // Fonction d'affichage d'information sur l'action précédente
    function affichageInformation($message) {
        $('#informationDivText').html($message);
        $('#informationsDiv').fadeIn(500);
    }

    $('.btnDelete').on('click', function (e) {
        e.preventDefault();

        $('#alert').css('display', 'initial');
        $('#messageAlert').text("Voulez-vous supprimer cet utilisateur ?");

        $hrefDelete = $(this).attr('href');
        $('#theDeleteLink').attr('href', $hrefDelete);

    })

    $('#closeDeleteBox').on('click', function () {
        $('#alert').fadeOut(500);
    })


    // ECOUTE DES CLICK BODY
    // FONCTION DE FERMETURE DES FENETRE VOLANTE HAN!
    var $mouseOut = false;
    /* On écoute les clique souris de la page */
    /* Pour fermer  SI LE CLIQUE A LIEU EN DEHORS DE LA FENETRE DE VERIFICATION*/
    $(document.body).on('click', function (e) {

        // console.log(event.target.classList);
        if (event.target.classList.contains("clickDiv")) {
            $mouseOut = false;
        } else {
            $mouseOut = true;
        }

        if ($mouseOut == true) {
            $('div.clickDiv').fadeOut(500);
        }

        // OPTION DE DELETE USER DANS LE TABLEAU DE RECHERCHE GENERE
        if (event.target.classList.contains("deleteLink")) {
            deleteUser(e.target.id);

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



    ////////////////////////////////////////////////
    ////////////////////////////////////////////////
    ////////////////////////////////////////////////
    // OPTIONS DE RECHERCHES, FONCTIONS ET EVENT ASSOCIES

    $('#searchBtn').on('click', function (e) {
        $('#waitingImg').show();
        getUserBySearch();
        $('#waitingImg').hide();

    })



    function getUserBySearch() {
        $('#waitingImg').hide();
        $.post(
            ajaxurl,
            {
                "action": "getUserBySearch",
                "input": $('#searchInput').val(),
                "searchCritere": $('#searchSelect').val()
            },
            function (response) {
                arrayConstruct(JSON.parse(response));
                // console.log(response);
            }
        )

    }


    function arrayConstruct($data) {
        $('#resultSearchTable').remove();
        var tab = $('<table></table>').attr('id', 'resultSearchTable').appendTo($('#resultSearch'));

        $('#resultSearch').fadeIn(500);
        $data.forEach(traitementDuTableau);

    }
    // Traitement du tableau des users trouvés et rangement.
    function traitementDuTableau(item, index) {
        var ligne = $('<tr></tr>').appendTo($('#resultSearchTable'));
        var td1 = $('<td></td>').appendTo(ligne);
        var td2 = $('<td></td>').appendTo(ligne);
        var td3 = $('<td></td>').appendTo(ligne);
        var td4 = $('<td></td>').appendTo(ligne);
        var td5 = $('<td></td>').appendTo(ligne);
        var td6 = $('<td></td>').appendTo(ligne);

        // ID
        $(td1).text(item['id']);
        // NOM PRENOM MAIL PSEUDO IP
        $(td2).text(item['nom'] + "\n" + item['prenom'] + "\n\n" + item['mail']
            + "\n\n" + item['pseudo'] + "\n\n" + item['address_ip']);
        // INFORMATION PRO
        var plop = "";
        item['pro'] == 1 ? plop = "Professionnel" : plop = "Particulier";
        $(td3).text(plop + item['entreprise'] + "   " + item['numeroTva'] + "   "
            + item['siret'] + "   " + item['nomcontact']);
        // PAYS NATIONALITE INDIC ET TELEPHONE
        $(td4).text(item['natio'] + "   " + item['pays'] + "   +" + item['indicPhone'] + item['phone']);
        // DATE D'INSCRIPTION ET D'ACTIVATION
        $(td5).text("Date d'inscription : " + item['date_inscription'] + " \n\n Date d'activation : " + item['date_activation']);
        // Gestion de l'utilisateur
        var lienInfo = $('<a></a>').attr('href', '#');
        $(lienInfo).html('INFOS');
        $(lienInfo).appendTo(td6);

        $('<br/>').appendTo(td6);
        $('<br/>').appendTo(td6);


        var lienSup = $('<a></a>').attr('href', '#');
        $(lienSup).css('color', 'red');
        $(lienSup).attr('id', item['id']);
        $(lienSup).attr('class', 'deleteLink');
        $(lienSup).html('SUPPRIMER');
        $(lienSup).appendTo(td6);

    }





    function deleteUser(id) {
        $.post(
            ajaxurl,
            {
                "action": "deleteUserById",
                "userIdToDelete": id
            },
            function (response) {
                console.log(JSON.parse(response));
            }
        )
    }










})