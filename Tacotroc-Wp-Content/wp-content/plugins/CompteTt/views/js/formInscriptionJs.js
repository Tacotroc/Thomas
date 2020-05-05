$(document).ready(function () {

    // UTILISATION DE LA BIBLIOTHEQUE JQUERY VALIDATE
    // UTILISATION DE LA BIBLIOTHEQUE JQUERY VALIDATE
    // UTILISATION DE LA BIBLIOTHEQUE JQUERY VALIDATE
    $('#formNewCompte').validate({
        rules: {
            nom: {
                required: true,
                minlength: 2,
                maxlength: 30
            },
            prenom: {
                required: true,
                minlength: 3,
                maxlength: 35
            },
            pseudo: {
                required: true,
                minlength: 3,
                maxlength: 18
            },
            mdp: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            mdpConfirm: {
                required: true,
                equalTo: "#inputMdpOne"
            },
            mailAddress: {
                required: true,
                email: true
            },
            mailConfirm: {
                required: true,
                equalTo: "#inputMailOne"
            },
            phoneNumber: {
                required: true,
                min: 8,
            },
            selectCountry: {
                required: true
            }
        }
    });
    $.extend($.validator.messages, {
        required: "Ce champ est obligatoire.",
        remote: "Veuillez corriger ce champ.",
        email: "Veuillez fournir une adresse électronique valide.",
        url: "Veuillez fournir une adresse URL valide.",
        date: "Veuillez fournir une date valide.",
        dateISO: "Veuillez fournir une date valide (ISO).",
        number: "Veuillez fournir un numéro valide.",
        digits: "Veuillez fournir seulement des chiffres.",
        creditcard: "Veuillez fournir un numéro de carte de crédit valide.",
        equalTo: "Veuillez fournir encore la même valeur.",
        notEqualTo: "Veuillez fournir une valeur différente, les valeurs ne doivent pas être identiques.",
        extension: "Veuillez fournir une valeur avec une extension valide.",
        maxlength: $.validator.format("Veuillez fournir au plus {0} caractères."),
        minlength: $.validator.format("Veuillez fournir au moins {0} caractères."),
        rangelength: $.validator.format("Veuillez fournir une valeur qui contient entre {0} et {1} caractères."),
        range: $.validator.format("Veuillez fournir une valeur entre {0} et {1}."),
        max: $.validator.format("Veuillez fournir une valeur inférieure ou égale à {0}."),
        min: $.validator.format("Veuillez fournir une valeur supérieure ou égale à {0}."),

    });

    // RECUPERATION DE LA LISTE DES PSEUDO ET MAIL EXISTANT
    // RECUPERATION DE LA LISTE DES PSEUDO ET MAIL EXISTANT
    // RECUPERATION DE LA LISTE DES PSEUDO ET MAIL EXISTANT

    // RECUPERATION DE LA LISTE DES PSEUDO ET MAIL EXISTANT
    var exist = [];
    $('#inputPseudonyme').val('');
    recupPseudoMail();

    // En cas de refresh : Replace le choix particulier/pro sur particulier
    $('#radioProParticulier').prop('checked', true);
    $('#inputNomEntreprise').val("");
    $('#inputNumTva').val("");
    $('#inputSiret').val("");
    $('#inputContactEntreprise').val("");



    // EVENT sur les boutons radio
    $('input[type=radio][name=radioChoicePro]').on('click', function () {
        radioPro();
    })
    // Fonction de vérification des boutons radio + affichage partie entreprise
    function radioPro() {
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "particulier") {
            $('#formPro').slideUp(1200);

            // Effacement des champ en rapport avec les PRO quand "particulier" est sélectionné
            $('#inputNomEntreprise').val("");
            $('#inputSiret').val("");
            $('#inputContactEntreprise').val("");
        };
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "professionnel") {
            $('#formPro').slideDown(1200);
        }
    }

    // EVENT bouton AIDE
    $('#aide').on('click', function (e) {
        $('#indication').slideDown(1000);
    })

    // EVENT CROIX pour faire disparaitre l'aide
    $('#fermerAide').on('click', function () {
        $('#indication').slideUp(1000);
    })

    //EVENT bouton VALIDER
    $('#btnInscription').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();


        // Vérification phone
        // verifPhone('#inputPhone');


        //Vérification si PRO
        if ($('input[type=radio][name=radioChoicePro]:checked').attr('value') == "professionnel") {

            verifEntree(2, 70, "#inputNomEntreprise");
            verifEntree(2, 70, "#inputContactEntreprise");

            $('#inputNomEntreprise').prop("required", true);
            $('#inputNumTva').prop("required", true);
            $('#inputSiret').prop("required", true);
            $('#inputContactEntreprise').prop("required", true);


            // AJAX SIRET VERIFICATION
            verifSiret("#inputSiret");
            if (!is_int($('#inputNumTva').val())) {
                showError("Le numéro SIRET doit être composé uniquement de chiffre");
                off();
            }
            // Verification TVA
            verifEntree(11, 11, "#inputNumTva");
            if (!is_int($('#inputNumTva').val())) {
                showError("Le numéro TVA doit être composé uniquement de chiffre");
                off();
            }
        }


        // Vérification du phone = INTEGER
        if (!is_int($('#inputPhone').val())) {
            showError("Le numéro de téléphone doit être composé uniquement de chiffre, sans espaces.");
            off();
        }



        // Verification de l'existance du pseudo ou des l'adresse mail
        if ($('#inputPseudonyme').val() == "" || $('#inputMailOne').val() == "") {
            showError("Veuillez remplir tout les champs");
            off();
        } else {
            verifExistingPseudoAndMail();
        }


        $('#formNewCompte').submit();

    })




    /////////////////////////////////////////////////////////////
    // FONCTIONS DE VERIFICATION DES CHAMPS
    // ARGUMENTS => tailleMin = taille minimum attendu
    // => tailleMax = taille maximum attendu
    // => selecteur du composant visé (précédé d'un # pour jQuery)
    // => type = le type attendu (ex : string, bool, int, etc)
    // ^[a-zA-Z0-9_-]{" + $tailleMin + "," + $tailleMax + "}$
    function verifEntree($tailleMin, $tailleMax, $selecteur) {

        $var = $($selecteur).val();
        console.log($var);
        console.log($selecteur);
        var regexChaine = new RegExp("^([a-zA-Z0-9]{" + $tailleMin + "," + $tailleMax + "})\\b");
        console.log(regexChaine);
        $rezVar = regexChaine.test($var);
        if ($rezVar === true) {
            console.log("OK");
        } else {
            console.log("NOPE");
            showError("Vous n'avez pas rempli les champs correctement.");
            off();
        }
    }



    // Fonction qui vérifie si 2 champ sont bien identique
    // function sameInput($chaine1, $chaine2) {
    //     if ($($chaine1).val() === $($chaine2).val()) {
    //     } else {
    //         showError("Les 2 champs 'mot de passe' et les 2 champs 'mail' ne sont pas identiques");
    //         off();
    //     }
    // }

    // Remplissage de la div qui affiche le message d'erreur
    function showError($msg) {
        $('#divErrorMessage').css('display', 'inline-block');
        $('#errorMessage').text($msg);
    }

    // Fermer le message d'erreur
    $('#fermerErrorMessage').on('click', function () {
        $('#divErrorMessage').css("display", "none");
    })

    //Fonction de vérification phone : 
    // function verifPhone($selecteur) {
    //     $number = $('#selectIndicCountry').val() + $($selecteur).val();
    //     console.log($number);
    //     if (!is_int($number) || ($number.lenght < 8 || $number.lenght > 15)) {
    //         showError("Veuillez entrer correctement votre numéro de téléphone et sélectionner un indicatif.");
    //     }
    // }

    // Fonction vérification du numéro SIRET
    function verifSiret($selecteur) {
        $numSiret = $($selecteur).val();
        console.log($numSiret);

        if (!is_int($numSiret)) {
            showError("Le numéro SIRET doit être composé uniquement de chiffre");
            off();
        } else {
            verifEntree(14, 14, "#inputSiret");
        }



    }



    // Test pour savoir si une variable est un INT
    function is_int(value) {
        if ((parseFloat(value) == parseInt(value)) && !isNaN(value)) {
            return true;
        } else {
            return false;
        }
    }


    // FONCTION DE RECUPERATION DES MEMBRES EXISTANTS
    function recupPseudoMail() {
        $.post(
            ajaxurl,
            {
                "action": "getExisting",
            },
            function (response) {
                exist = JSON.parse(response);
                console.log(exist);
            }
        )
    }



    // fonction vérifie si Type existe déjà
    function verifExistingPseudoAndMail() {
        if (exist.find(
            x => x.pseudo.toLowerCase() == $('#inputPseudonyme').val().toLowerCase()
        )) {
            showError("Le pseudo existe déjà, veuillez en choisir un autre.");
            off();
        }

        if (exist.find(
            x => x.mail.toLowerCase() == $('#inputMailOne').val().toLowerCase()
        )) {
            showError("Cette adresse mail est déjà utilisée, veuillez en utiliser une autre");
            off();
        }
    }

    

    // FONCTION DE FERMETURE DES FENETRES VOLANTES HAN!
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
            $('#divConfirmationMdp').fadeOut(500);
            $('#modifConfirmation').fadeOut(500);
            $('#modifWrongPassword').fadeOut(500);
            $('#divErrorMessage').fadeOut(500);
        }

    })

})

