
$(document).ready(function(){

  // Init variable
  {
    var form = $('#form');
    var formMdp =  $('#form2');
    var error_lastname = $('#Error_Nom');
    var error_firstname = $('#Error_Prenom');
    var error_pseudo = $('#Error_Pseudo');
    var error_email= $('#Error_Mail');
    var error_general= $('#Error_general');
    var error_nation= $('#Error_Country');
    var error_pass1 = $('#Error_Pass1');
    var error_pass2 = $('#Error_Pass2');
    var error_pass = $('#Error_Mdp');
    var last_name = "";
    var first_name = "";
    var pseudo = "";
    var mail = "";
    var nation ="";
    var pass = "";
    var pass1 = "";
    var pass2 = "";
  }


  {
    $('#formulaireMdp').hide();
    $('#formulaireMdpValide').hide();
    $('#formulaireadresse').hide();
    if($('#valuse').val()==1)
    {
      $('#clinch').hide();}
      else {   $('#modif_adresse').hide();    $('#entre').hide();}

      $('#getNom').innerHTML =   $('#inputNom').val();
      $('#getPrenom').innerHTML = $('#inputPrenom').val();
      $('#getPseudo').innerHTML = $('#inputPseudo').val();
      $('#getMail').innerHTML = $('#inputMail').val();
      $('#valueid').val($('#hideid').val());
      $('#valueid').selected;





      function choix(t)
      {

        if (t.tagName=='SPAN' && !t.classList.contains("message_error")  && !t.classList.contains("#valid")){

          t.style.display="none";
          t.parentNode.childNodes[0].style.display="";
          $(t.parentNode.childNodes[0]).val(t.parentNode.childNodes[1].innerHTML);
        }




      }

      function choix2(evente ,t)
      {


        if (t.tagName=='INPUT'){
          var touche = window.event ?evente.keyCode : evente.which;
          if(touche==13){
            t.style.display="none";
            t.parentNode.childNodes[1].style.display='';
            t.parentNode.childNodes[1].innerHTML = (t.parentNode.childNodes[0].value);
          }


        }
      }
    }

    // Init Event Listener

    {
      document.querySelector('#commetuveux').addEventListener("click",function(){choix(event.target)},true);
      document.querySelector('#commetuveux').addEventListener("keydown",function(){choix2(event,event.target)},true);
      document.querySelector('#modif_adresse').addEventListener("click",function(){  $('#formulaireadresse').slideToggle(750)},true);
      document.querySelector('#modif_mdp').addEventListener("click",function(){toggleMdp()},true);
      document.querySelector('#form').addEventListener("focus",function(){red(event.target)},true);
      document.querySelector('#modif_valid').addEventListener("click",function(){validation()},true);
      document.querySelector('#modif_valid_mdp').addEventListener("click",function(){validationMdp()},true);
      document.querySelector('#modif_valid_mdp_envois').addEventListener("click",function(){validationMdp2()},true);
    }

    // Function
    {


      function toggleMdp(){
        $('#formulaireMdp').slideToggle(750);

      }

      function toggleMdpValide(){
        $('#formulaireMdpValide').slideToggle(1500);

      }




      function red(e){
        if(e.id == "inputNom")
        {
          if((error_lastname.text()).length == 0)
          {
            e.style.borderColor ="";
          }
          else
          {
            e.style.borderColor ="#DC143C";
          }
        }
        else if(e.id == "inputPrenom")
        {
          if((error_firstname.text()).length == 0){
            e.style.borderColor ="";
          }
          else {
            e.style.borderColor ="#DC143C";
          }
        }
        else if(e.id == "inputPseudo")
        {
          if((error_pseudo.text()).length == 0){
            e.style.borderColor ="";
          }
          else {
            e.style.borderColor ="#DC143C";
          }
        }
        else if(e.id == "inputMail")
        {
          if((error_email.text()).length == 0){
            e.style.borderColor ="";
          }
          else {
            e.style.borderColor ="#DC143C";
          }
        }

      }

      function validation(){
        chargement_start();
        last_name = $('#inputNom').val();
        first_name = $('#inputPrenom').val();
        pseudo = $('#inputPseudo').val();
        mail = $('#inputMail').val();

        if($('#valuse').val()==1){nation=1;}else if($('#valuse').val()==0){nation = $('#valueid').val();}
        console.log(nation)
        var  nom_entreprise = $('#inputEntreprise').val();
        var  adresse_social = $('#inputAdresse_S').val();
        var    adresse_filiale = $('#inputAdresse_F').val();
        var  siret = $('#inputSiret').val();

        $.post
        (
          ajaxurl,
          {
            "action":"launchtestModif",
            'last_name': last_name,
            'first_name': first_name,
            'pseudo': pseudo,
            'mail': mail,
            'nation':nation,
            'nom_entreprise':  nom_entreprise,
            'adresse_social':  adresse_social ,
            'adresse_filiale':  adresse_filiale ,
            'siret':  siret
          },
          function(response)
          {
            reponse_ajax(response);
          }
        )
      }

      function reponse_ajax(e){
        if($('#valuse').val()==0)
        {  if(e==1){
          suppresion_error();
          error_general.append("veuillez remplir tout les champs");
        }
        else if(e==2){
          suppresion_error();
          error_lastname.append("Il y a une erreur dans le nom");
          $('#inputNom').focus();
        }
        else if(e==3){
          suppresion_error();
          error_firstname.append("Il y a une erreur dans le prenom");
          $('#inputPrenom').focus();
        }
        else if(e==4){
          suppresion_error();
          error_pseudo.append("Il y a une erreur dans le pseudo");
          $('#inputPseudo').focus();
        }
        else if(e==5){
          suppresion_error();
          error_email.append("Le format du mail n'est pas valide");
          $('#inputMail').focus();
        }
        else if(e==6){
          suppresion_error();
          error_pseudo.append("Ce pseudo existe deja");
          $('#inputPseudo').focus();
        }
        else if(e==7){
          suppresion_error();
          error_email.append("Cette adresse mail existe déjà ");
          $('#inputMail').focus();
        }
        else if(e==8){
          suppresion_error();
          error_nation.append("Veuiller choisir une nationalité ");
        }
        else{
          suppresion_error();

          alert('Veuillez valider votre inscription !');
          form.submit();
        }

      }else if($('#valuse').val()==1)
      {
        form.submit();

      }

      chargement_stop();
    }
    function suppresion_error(){
      error_lastname.empty();
      error_firstname.empty();
      error_pseudo.empty();
      error_email.empty();
      error_general.empty();
      error_nation.empty();
      error_pass.empty();
      error_pass1.empty();
    }
  }
  {



    function chargement_start(){
      document.querySelector('#valid').style.display="none";
      document.querySelector('#chargement').style.display="block";
      document.querySelector('#modif_valid').disabled=true;
    }

    function chargement_stop(){
      document.querySelector('#valid').style.display="block";
      document.querySelector('#chargement').style.display="none";
      document.querySelector('#modif_valid').disabled=false;
    }

    function chargement_start_mdp(){
      document.querySelector('#validmdp').style.display="none";
      document.querySelector('#chargementmdp').style.display="block";
      document.querySelector('#modif_valid_mdp').disabled=true;
    }

    function chargement_stop_mdp(){
      document.querySelector('#validmdp').style.display="block";
      document.querySelector('#chargementmdp').style.display="none";
      document.querySelector('#modif_valid_mdp').disabled=false;
    }

    function chargement_start_mdpvalide(){
      document.querySelector('#validmdpvalide').style.display="none";
      document.querySelector('#chargementmdpvalide').style.display="block";
      document.querySelector('#modif_valid_mdp_envois').disabled=true;
    }

    function chargement_stop_mdpvalide(){
      document.querySelector('#validmdpvalide').style.display="block";
      document.querySelector('#chargementmdpvalide').style.display="none";
      document.querySelector('#modif_valid_mdp_envois').disabled=false;
    }

  }
  //A terminer
  {
    function validationMdp(){
      chargement_start_mdp();
      pass = $('#inputMdp').val();
      // pass1 = $('#inputPassword1').val()
      // pass2 = $('#inputPassword2').val()
      $.post
      (
        ajaxurl,
        {
          "action":"launchtestModifMdp",
          'pass': pass


        },
        function(response)
        {

          reponse_ajax(response);
        }
      )
    }

    function reponse_ajax(e){

      if(e==1){
        suppresion_error();
        error_pass.append("mdp vide");
        $('#inputMdp').focus();
      }
      else if (e==2) {

        suppresion_error();
        error_pass.append("mauvais mot de passe");
        $('#inputMdp').focus();

      }
      else if (e==3) {

        suppresion_error();
        error_pass.append("le mdp ne suis pas les regles");
        $('#inputMdp').focus();

      }
      // else if(e==2){
      //   suppresion_error();
      //   error_pass1.append("le mot de passe ne respecte pas les regles");
      //   $('#inputPassword1').focus();
      // }
      // else if(e==3){
      //   suppresion_error();
      //   error_pass2.append("les mots de passes ne sont pas identiques");
      //   $('#inputPassword2').focus();
      // }

      else{
        suppresion_error();

        toggleMdpValide();

      }
      chargement_stop_mdp();
    }
  }


  {
    function validationMdp2(){
      chargement_start_mdpvalide();
      pass1 = $('#inputPassword1').val()
      pass2 = $('#inputPassword2').val()
      $.post
      (
        ajaxurl,
        {
          "action":"launchtestModifMdpValide",
          'pass1': pass1,
          'pass2': pass2


        },
        function(response)
        {

          reponse_ajax(response);
        }
      )
    }

    function reponse_ajax(e){

      if(e==1){
        suppresion_error();
        error_pass1.append("les mots de passes sont vides");
        $('#inputPassword1').focus();
      }
      else if(e==2){
        suppresion_error();
        error_pass1.append("le mot de passe ne respecte pas les regles");
        $('#inputPassword2').focus();
      }
      else if(e==3){
        suppresion_error();
        error_pass1.append("les mots de passes ne sont pas identiques");
        $('#inputPassword2').focus();
      }

      else{
        error_pass1.empty();

        formMdp.submit();

      }

      chargement_stop_mdpvalide();
    }}
}
