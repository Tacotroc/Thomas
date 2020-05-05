//permet de lancer le js une fois que la page html est correctement chargé
$(document).ready(function () {
  var form = $('#form');

  var error_general = $('#Error_General');
  var error_lastname = $('#Error_Nom');
  var error_firstname = $('#Error_Prenom');
  var error_pseudo = $('#Error_Pseudo');
  var error_email = $('#Error_Email');
  var error_nation = $('#Error_Country');
  var error_pass1 = $('#Error_Pass1');
  var error_pass2 = $('#Error_Pass2');
  var form2 = $('#formEntreprise');
  var error_general2 = $('#Error_General2');
  var error_nomE = $('#Error_NomE');

  var error_nomC = $('#Error_NomC');
  var error_prenomE = $('#Error_PrenomE');
  var error_tel = $('#Error_Tel');
  var error_siret = $('#Error_Siret');
  var error_pass3 = $('#Error_Pass3');
  var error_pass4 = $('#Error_Pass4');
  var count = 0;
  form2.toggle();
  form.toggle();


  //Chargement

  $('#retour_1').toggle();
  $('#retour_2').toggle();
  //quand on clic sur monbutton lancer la fonction buttonregsiter
  document.querySelector('#MonButton').addEventListener("click", function () { buttonRegister() }, true);
  document.querySelector('#MonButton_ChoixE').addEventListener("click", function () { buttonclickclikE() }, true);
  document.querySelector('#MonButton_ChoixP').addEventListener("click", function () { buttonclickclikP() }, true);
  document.querySelector('#MonButton_Entreprise').addEventListener("click", function () { buttonRegister_Entreprise() }, true);
  document.querySelector('#button_retour_droite').addEventListener("click", function () { buttonclick() }, true);
  document.querySelector('#button_retour_gauche').addEventListener("click", function () { buttonclick() }, true);

  document.querySelector('#form').addEventListener("focus", function () { red(event.target) }, true);
  document.querySelector('#formEntreprise').addEventListener("focus", function () { red_entreprise(event.target) }, true);

  function buttonclickclikE() {

    form2.toggle();

    $('.madiv').hide();


    $('#MonButton_Retour').show();
  }

  function buttonclickclikP() {
    form.toggle();
    $('.madiv').hide();

  }

  function buttonclick() {
    form.hide();
    form2.hide();
    $('.madiv').show();

  }

  $("#button_retour_droite").hover(function () {
    $("#retour_1").delay(100).animate({ width: 'toggle' });
    $("#fleche-droite").css({ 'transform': 'rotate(' + 180 + 'deg)' });
  }, function () {
    $("#retour_1").delay(100).animate({ width: 'toggle' });
    $("#fleche-droite").css({ 'transform': 'rotate(' + 0 + 'deg)' });
  }
  );

  $("#button_retour_gauche").hover(function () {
    $("#retour_2").animate({ width: 'toggle' });
    $("#fleche-gauche").css({ 'transform': 'rotate(' + 180 + 'deg)' });
  }, function () {
    $("#retour_2").animate({ width: 'toggle' });
    $("#fleche-gauche").css({ 'transform': 'rotate(' + 0 + 'deg)' });
  }
  );

  function red_entreprise(e) {
    // on observe l'id de la cible pour connaitre quel bout de code on lance
    if (e.id == "inputNomE") {
      // on observe s'il y a une erreur par rapport à la cible de l'évenement
      if ((error_nomC.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }


    else if (e.id == "inputNom_C") {
      if ((error_nomC.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputPrenom_C") {
      if ((error_prenomE.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputSiret") {
      if ((error_siret.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }



    else if (e.id == "inputTel") {
      if ((error_tel.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputPassword2") {
      if ((error_pass2.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
  }

  function buttonRegister_Entreprise() {
    var nom = $('#inputNomE').val()
    var nomC = $('#inputNom_C').val()

    var prenomE = $('#inputPrenom_C').val()

    var tel = $('#inputTel').val()
    var siret = $("#inputSiret").val();
    var pass1 = $('#inputPassword3').val()
    var pass2 = $('#inputPassword4').val()
    console.log(pass1, "//////", pass2)
    $.post
      (
        ajaxurl,
        {
          "action": "launchtestEntreprise",
          'nomE': nom,
          'nomC': nomC,
          'prenomC': prenomE,
          'phone': tel,
          'siret': siret,
          'pass1': pass1,
          'pass2': pass2

        },
        function (response) {
          console.log(response);
          reponseajax_entreprise(response);
        }
      )
  }
  function suppresion_error_entreprise() {
    error_general2.empty();
    error_nomE.empty();
    error_nomC.empty();
    error_prenomE.empty();
    error_tel.empty();
    error_pass3.empty();
    error_pass4.empty();

  }

  function reponseajax_entreprise(ma_reponse) {

    if (ma_reponse == 1) {
      suppresion_error();
      error_general2.append("Veuillez renseigner tous les champs");
    }

    else if (ma_reponse == 2) {
      suppresion_error();
      error_pass3.append("Le format du mot de passe n'est pas respecté, indiquez entre 8 et 12 caractères dont 1 majuscule et 1 minuscule au minimum");
      $('#inputPassword3').focus();
    }
    else if (ma_reponse == 3) {
      suppresion_error();
      error_pass4.append("Verifier que vos mots de passe soit bien identique");
      $('#inputPassword4').focus();
    }
    else if (ma_reponse == 4) {
      suppresion_error();
      error_nomE.append("Cette entreprise existe deja");
      $('#inputAdress').focus();

    }
    else if (ma_reponse == 0) {
      suppresion_error();
      alert('Veuillez valider votre inscription !');
      form2.submit();

    }
  }































  function red(e) {
    // on observe l'id de la cible pour connaitre quel bout de code on lance
    if (e.id == "inputNom") {
      // on observe s'il y a une erreur par rapport à la cible de l'évenement
      if ((error_lastname.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputPrenom") {
      if ((error_firstname.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputPseudo") {
      if ((error_pseudo.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputMail") {
      if ((error_email.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputNationalite") {
      if (error_nation.has('option').length > 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
    else if (e.id == "inputPassword2") {
      if ((error_pass2.text()).length == 0) {
        e.style.borderColor = "";
      }
      else {
        e.style.borderColor = "#DC143C";
      }
    }
  }

  function buttonRegister() {
    var last_name = $('#inputNom').val()
    var first_name = $('#inputPrenom').val()
    var pseudo = $('#inputPseudo').val()
    var select = document.getElementById("inputCountry");
    var choice = $(select).val();


    var mail = $('#inputMail').val()
    var nation = choice;

    var pass1 = $('#inputPassword1').val()
    var pass2 = $('#inputPassword2').val()
    console.log(pass1, "//////", pass2)
    $.post
      (
        ajaxurl,
        {
          "action": "launchtest",
          'last_name': last_name,
          'first_name': first_name,
          'pseudo': pseudo,
          'mail': mail,
          'nation': nation,
          'pass1': pass1,
          'pass2': pass2

        },
        function (response) {
          reponseajax(response);
        }
      )
  }
  function suppresion_error() {
    error_general.empty();
    error_lastname.empty();
    error_firstname.empty();
    error_pseudo.empty();
    error_email.empty();
    error_pass1.empty();
    error_pass2.empty();
    error_nation.empty();
  }

  function reponseajax(ma_reponse) {

    if (ma_reponse == 1) {
      suppresion_error();
      error_general.append("Veuillez renseigner tous les champs");
    }
    else if (ma_reponse == 2) {
      suppresion_error();
      error_lastname.append("Il y a une erreur dans le nom");
      $('#inputNom').focus();
    }
    else if (ma_reponse == 3) {
      suppresion_error();
      error_firstname.append("Il y a une erreur dans le prénom");
      $('#inputPrenom').focus();
    }
    else if (ma_reponse == 4) {
      suppresion_error();
      error_pseudo.append("Il y a une erreur dans le pseudo");
      $('#inputPseudo').focus();
    }
    else if (ma_reponse == 5) {
      suppresion_error();
      error_email.append("Le format du mail n'est pas valide");
      $('#inputMail').focus();
    }
    else if (ma_reponse == 6) {
      suppresion_error();
      error_pass1.append("Le format du mot de passe n'est pas respecté, indiquez entre 8 et 12 caractères dont 1 majuscule et 1 minuscule au minimum");
      $('#inputPassword1').focus();
    }
    else if (ma_reponse == 7) {
      suppresion_error();
      error_pass2.append("Verifier que vos mots de passe soit bien identique");
      $('#inputPassword2').focus();
    }
    else if (ma_reponse == 8) {
      suppresion_error();
      error_pseudo.append("Ce pseudo existe deja");
      $('#inputPseudo').focus();

    }
    else if (ma_reponse == 9) {
      suppresion_error();
      error_email.append("Cette adresse mail existe déjà ");
      $('#inputMail').focus();
    }
    else if (ma_reponse == 10) {
      suppresion_error();
      error_nation.append("Veuiller choisir une nationalité ");
      $('#inputNationalite').focus();
    }
    else {
      suppresion_error();
      alert('Veuillez valider votre inscription !');
      form.submit();

    }
  }


});
