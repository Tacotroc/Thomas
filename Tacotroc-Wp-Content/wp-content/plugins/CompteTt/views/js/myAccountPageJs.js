$(document).ready(function () {




    // RECUPERATION DES PARAMETRE DANS LE GET
    console.log(getParams());
    $parametresGet = getParams();

    // Si on a le GET info = infoChanged => ON AFFICHE LA DIV DE CONFIRMATION
    switch ($parametresGet['info']) {
        case 'infoChanged':
            affichageInformation("Vos infos ont bien été mis à jour !");
            break;

        case 'wrongmdp':
            affichageInformation("Il semble que le mot de passe soit érroné, veuillez rééssayer.");
            break;

        case 'activated':
            affichageInformation("Votre compte a bien été activé ! Merci !");
            break;

        // case 
    }






    // Fonction d'affichage d'informations
    function affichageInformation($message) {
        $('#informationDivText').html($message);
        $('#informationsDiv').fadeIn(500);
    }

    // Mise en place du CSS directement pour afficher mes infos du compte
    $('#myAccountTable').css('display', 'initial');
    $('#myAccountModif').css('display', 'none');
    $('#myAccountCars').css('display', 'none');

    // Affichage des champs PRO ou non
    if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "professionnel") {
        $('#affichagePro').css('display', 'initial');
    } else {
        $('#affichagePro').css('display', 'none');
    }

    // EVENT sur les boutons radio
    $('input[type=radio][name=radioChoicePro]').on('click', function () {
        radioPro();
    })

    // FONCTION QUI TEST LA VALEUR DU BOUTON RADIO : PRO OU PARTICULIER
    function radioPro() {
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "particulier") {
            $('#affichagePro').fadeOut(700);

        };
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "professionnel") {
            $('#affichagePro').fadeIn(700);

        }
    }


    // ON TESTE LA TAILLE DE L'ECRAN POUR ADAPTER L'AFFICHAGE
    if ($(window).width() < 750) {
        modifyForMobile();
    } else {
        modifyForGoodScreen();
    }

    // FONCTION DE RECHERCHE D'UNE IMMATRICULATION
    $('#searchImmatButton').on('click', function (e) {
        console.log($('#searchImmatInput').val());
        $.post(
            ajaxurl,
            {
                "action": "searchImmat",
                "immatInput": $('#searchImmatInput').val()
            },
            function (response) {
                exist = JSON.parse(response);
                console.log(exist);
                construcResponseImmat(response);

            }
        )
    })

    // FONCTION POUR AFFICHER LES IMMAT RESULTANTES DE LA RECHERCHE
    function construcResponseImmat($tabResult) {
        $.each($tabResult, function (index, value) {
            console.log(value);
            var theP = $('<p></p>').appendTo($('#resultSearchCarDiv'));
            $(theP).html('Immatriculation trouvée : ');

        })

    }


    // FONCTION DE FERMETURE DES FENETRE VOLANTE HAN!
    var $mouseOut = false;
    /* On écoute les clique souris de la page */
    /* Pour fermer  SI LE CLIQUE A LIEU EN DEHORS DE LA FENETRE DE VERIFICATION*/
    $(document.body).on('click', function (e) {
        e.stopPropagation();

        console.log(event.target.classList);
        if (event.target.classList.contains("clickDiv")) {
            $mouseOut = false;
        } else {
            $mouseOut = true;
        }

        if ($mouseOut == true) {
            $('div.clickDiv').fadeOut(500);
        }

    })

    // VERIFICATION VIA PLUGIN JQUERY : VALIDATE
    $('#formModifAccount').validate({
        rules: {
            nomModif: {
                required: true,
                minlength: 2,
                maxlength: 30
            },
            prenomModif: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            indicModif: {
                required: true
            },
            phoneModif: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            paysModif: {
                required: true
            },
            natioModif: {
                required: true
            },
        }
    });
    $.extend($.validator.messages, {
        required: "<br> Ce champ est obligatoire.",
        maxlength: $.validator.format("<br> Veuillez fournir au plus {0} caractères."),
        minlength: $.validator.format("<br> Veuillez fournir au moins {0} caractères.")
    });


    // EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT 
    // CLIQUE SUR LE BOUTON VALIDATION DE VERIFICATION DU MOT DE PASSE
    $('#validationMdpModif').on('click', function (e) {
        // e.stopPropagation();





        // VERIFICATION DU RADIO PRO/PARTICULIER
        radioProWhenValidate();



        //SUBMIT
        $('#formModifAccount').submit();

    })

    function radioProWhenValidate() {
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "particulier") {

            $('#inputEntrepriseModif').val("");
            $('#inputNumTvaModif').val("");
            $('#inputNumSiretModif').val("");
            $('#inputNomContactModif').val("");
        }

    }





    // EVENT EVENT EVENT EVENT EVENT
    // CLICK SUR LE BOUTON DE VALIDATION

    $('#btnAccountModif').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        if (!is_int($('#inputPhoneModif').val())) {
            showError("Le numéro téléphonique doit être composé uniquement de chiffre");
            off();
        }

        // Si c'est un professionnel : vérification des champs concernés.
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "professionnel") {
            if (!is_int($('#inputNumTvaModif').val()) || !is_int($('#inputNumSiretModif').val())) {
                showError("Les champs TVA et SIRET doivent être composé uniquement de chiffres.");
            }
            if ($('#inputEntrepriseModif').val() == "" || $('#inputNomContactModif').val() == "") {
                showError("Si vous etes un professionnel : veuillez remplir les champs nom entreprise et nom du contact");
            }
            if ($('#inputEntrepriseModif').val().length < 3) {
                showError("Veuillez remplir correctement le Nom de l'Entreprise.");
            }
            if ($('#inputNumTvaModif').val().length < 11) {
                showError("Le numéro de TVA doit contenir 11 chiffres.");
            }
            if ($('#inputNumSiretModif').val().length < 14) {
                showError("Le numéro SIRET doit être composé de 14 chiffres.");
            }
            if ($('#inputNomContactModif').val().length < 3) {
                showError("Veuillez remplir correctement le Nom du Contact.");
            }


        }

        $('#divConfirmationMdp').css('display', 'initial');

    })

    // EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT 
    // ON ECOUTE LES MODIFICATIONS DE TAILLE D'ECRAN
    $(window).on('resize', function () {
        if ($(window).width() < 750) {
            modifyForMobile();
        } else {
            modifyForGoodScreen();
        }
    })


    // EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT
    // ECOUTE DU CLIQUE POUR CHOISIR L'OPTION A AFFICHER
    $('.option').on('click', function (e) {
        var id = $(this).attr('id');
        switch (id) {
            case 'optionInfo':
                $('#myAccountTable').css('display', 'initial');
                $('#myAccountModif').css('display', 'none');
                $('#myAccountCars').css('display', 'none');
                break;

            case 'optionModif':
                $('#myAccountTable').css('display', 'none');
                $('#myAccountModif').css('display', 'initial');
                $('#myAccountCars').css('display', 'none');

                break;

            case 'optionCars':
                $('#myAccountTable').css('display', 'none');
                $('#myAccountModif').css('display', 'none');
                $('#myAccountCars').css('display', 'initial');

                break;
        }
    })

    // FONCTION D'AFFICHAGE DES L'ERREUR EN COURS
    function showError($msg) {
        $('#divErrorMessage').css('display', 'inline-block');
        $('#errorMessage').text($msg);
        off();
    }


    // FONCTION QUI GERE LES CHANGEMENTS POUR MOBILE
    function modifyForMobile() {
        $('.btnModifier').css('display', 'none');
        $('td').css('width', '50%');
        $('td').css('min-width', '50px');
        $('td').css('padding', '5px');
        $('td').css('padding-top', '5px');
        $('#optionChoice').css('flex-direction', 'column')


    }
    // FONCTION QUI GERE LES CHANGEMENT POUR GRAND ECRAN
    function modifyForGoodScreen() {
        $('.btnModifier').css('display', 'initial');
        $('td').css('padding', '20px');
        $('#optionChoice').css('flex-direction', 'row')
        $('.btnModifier').children().css('margin-top', '15%');
        $('.btnModifier').css('margin-top', '25%');
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

    // Test pour savoir si une variable est un INT
    function is_int(value) {
        if ((parseFloat(value) == parseInt(value)) && !isNaN(value)) {
            return true;
        } else {
            return false;
        }
    }


})