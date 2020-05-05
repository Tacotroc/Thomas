$(document).ready(function(){

  // Init variable
  {
    var form = $('#form');
    var error_lastname = $('#Error_Nom');
    var error_firstname = $('#Error_Prenom');
    var error_pseudo = $('#Error_Pseudo');
    var error_email= $('#Error_Mail');
    var error_nation=  $('#Error_Country');
    var last_name = "";
    var first_name = "";
    var pseudo = "";
    var mail = "";
    var nation = ";"
  }

{
  var canvas  = $("#canvas"),
    context = canvas.get(0).getContext("2d"),
    $result = $('#result');

$('#fileInput').on( 'change', function(){
    if (this.files && this.files[0]) {
      if ( this.files[0].type.match(/^image\//) ) {
        var reader = new FileReader();
        reader.onload = function(evt) {
           var img = new Image();
           img.onload = function() {
             context.canvas.height = img.height;
             context.canvas.width  = img.width;
             context.drawImage(img, 0, 0);
             var cropper = canvas.cropper({
               aspectRatio: 16 / 9
             });
             $('#btnCrop').click(function() {
                // Get a string base 64 data url
                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png");
                $result.append( $('<img>').attr('src', croppedImageDataURL) );
             });
             $('#btnRestore').click(function() {
               canvas.cropper('reset');
               $result.empty();
             });
           };
           img.src = evt.target.result;
        };
        reader.readAsDataURL(this.files[0]);
      }
      else {
        alert("Invalid file type! Please select an image file.");
      }
    }
    else {
      alert('No file(s) selected.');
    }
});
}
  // Init Action
  {
    $('#formulaire').toggle();
  }

  // Init Event Listener
  {
    document.querySelector('#modif').addEventListener("click",function(){toggle()},true);
    document.querySelector('#form').addEventListener("focus",function(){red(event.target)},true);
    document.querySelector('#modif_valid').addEventListener("click",function(){validation()},true);
  }

  // Function
  {
    function toggle(){
      $('#formulaire').slideToggle(1500);
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
      last_name = $('#inputNom').val();
      first_name = $('#inputPrenom').val();
      pseudo = $('#inputPseudo').val();
      mail = $('#inputMail').val();
      nation = (document.getElementById("inputCountry")).val();


      $.post
      (
        ajaxurl,
        {
          "action":"launchtestModif",
          'last_name': last_name,
          'first_name': first_name,
          'pseudo': pseudo,
          'mail': mail,
          'nation': nation
        },
        function(response)
        {
          console.log(response)
          reponse_ajax(response);
        }
      )
    }

    function reponse_ajax(ma_reponse){

      if(ma_reponse==1){
        suppresion_error();
        error_general.append("Veuillez renseigner tous les champs");
      }
      else if(ma_reponse==2){
        suppresion_error();
        error_lastname.append("Il y a une erreur dans le nom");
        $('#inputNom').focus();
      }
      else if(ma_reponse==3){
        suppresion_error();
        error_firstname.append("Il y a une erreur dans le prénom");
        $('#inputPrenom').focus();
      }
      else if(ma_reponse==4){
        suppresion_error();
        error_pseudo.append("Il y a une erreur dans le pseudo");
        $('#inputPseudo').focus();
      }
      else if(ma_reponse==5){
        suppresion_error();
        error_email.append("Le format du mail n'est pas valide");
        $('#inputMail').focus();
      }

      else if(ma_reponse==6){
        suppresion_error();
        error_pseudo.append("Ce pseudo existe deja");
        $('#inputPseudo').focus();

      }
      else if(ma_reponse==7){
        suppresion_error();
        error_email.append("Cette adresse mail existe déjà ");
        $('#inputMail').focus();
      }
      else if(ma_reponse==8){
        suppresion_error();
        error_nation.append("Veuiller choisir une nationalité ");
        $('#inputNationalite').focus();
      }
      else{
        suppresion_error();
        alert('Veuillez valider votre inscription !');

        form.submit();

      }
    }

  }




});
