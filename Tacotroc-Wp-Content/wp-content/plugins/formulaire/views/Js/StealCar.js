$(document).ready(function() {
  {
    var nomI='';
    var prenomI='';
    var mailI='';
    var nomP='';
    var prenomP='';
    var telP='';
    var mailP='';
    window.json =null;
    tempo=null;
    var mon_input = null;
    var form = document.querySelector("#form");
    var Suggestion = document.querySelector("#Box_Suggestion");
    var mon_tableau = '';
    var nom_tableau = [];
    var Compteur = 0;
    var Error ='';
    var ModelError='';
    var mesmarque='';
    var mamarque='';





    form.addEventListener("focus", function() {AjoutBox(event.target)},true);
    form.addEventListener("blur", function() {RetirerBox(Suggestion)},true);
    document.getElementById("inputMarque").addEventListener("blur",function(){testmarque()},)



    function testmarque(){
      $.each(window.json, function(key, item){
        if(key=="Marque"){
          tab_marque = item;
        }
      })
      val_marque=($('#inputMarque').val()).toLowerCase();
      $.each(tab_marque, function(key,item){
        if(tab_marque[key].Name.toLowerCase()==val_marque){
          id_marque = tab_marque[key].id;
        }
      })
      $.post(
        ajaxurl,{
          "action":"recupModelByIdCar",
          "id_twp_Brand":id_marque,
        },function(response){
          tempo=JSON.parse(response);
        }
      )}




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
      $.post(
        ajaxurl,
        {
          "action":"getAll",
        },
        function(response){
          window.json = JSON.parse(response);
        }
      )
      $("input").on("keyup",function(e){
        Error = $($(this).parent()).children(".Error_msg");
        // console.log($(this).val());
        mon_input = $(this).val();
        if (mon_input.length ==0){
          Suggestion.style.display = "none";
          $("#Box_Suggestion").empty();
          Error.empty();
        }
        else{
          Suggestion.style.display = "block";
          ChangerBox(Error);
        }
      });
    }
    {
      var tab_immat= '';
      var tab_marque='';
      var tab_model='';
      var tab_color='';
      var tab_version='';
      var tab_type='';
      var tab_annee='';
      var val_marque='';
      var val_model='';
      var val_color1='';
      var val_color2='';
      var val_version='';
      var val_type='';
      var val_annee='';
      var id_car='';
      var id_immat='';
      var id_marque='';
      var id_model='';
      var id_color1='';
      var id_color2='';
      var id_version='';
      var id_type='';
      var id_annee='';
      var immaticulation='';
    }






    function AjoutBox(e){
      if (e.type == "text"){
        Suggestion.style.top = e.offsetHeight+e.offsetTop+"px";
        Suggestion.style.width = e.offsetWidth+"px";
        nom_tableau = [];
        if (e.name == "Model")
        {
          $.each(window.json, function(key, item){
            if(key=="Marque"){
              mesmarque = item;
            }
          })
          $.each(mesmarque, function(key,item){
            if(mesmarque[key].Name.toLowerCase()==($('#inputMarque').val()).toLowerCase()){
              mamarque = mesmarque[key].id;
            }
          })
          $.each(window.json, function(key, item){
            if(e.name==key){
              mon_tableau = item;
            }
          })
          $.each(mon_tableau, function(key, item){
            if (item.id_twp_Brand == mamarque){
              nom_tableau.push(item.Name);
            }
          })

          nom_tableau.sort();

        }
        else{
          $.each(window.json, function(key, item){
            if(e.name==key){
              mon_tableau = item;
            }
          })
          $.each(mon_tableau, function(key, item){
            nom_tableau.push(item.Name);
          })
          nom_tableau.sort();
        }
      }
      else {
        RetirerBox(Suggestion);
      }
    }

    function RetirerBox(e){
      e.style.display = "none";
      ModelError = $($('#inputMarque').parent()).children(".Error_msg");
      if ($('#inputMarque').val()!= 0 ){
        $('#inputModel').removeAttr("disabled");
      }
      else {
        $('#inputModel').prop("disabled", true);
        $('#inputModel').val('');
      }
    }

    function ChangerBox(e){
      Compteur = 0;
      $("#Box_Suggestion").empty();
      $.each(nom_tableau, function(key, item){
        if (Compteur != 3){
          if (mon_input.toLowerCase() == item.substring(0,mon_input.length).toLowerCase()){
            Compteur +=1;
            $("#Box_Suggestion").append("<p>"+item+"</p>");
          }
        }
      })
      if (Compteur == 0 && e.text().length == 0){
        e.append("Element introuvable");
      }
      else if (Compteur > 0){
        e.empty();
      }
    }

    function AllTabs(){
      $.each(window.json, function(key, item){
        if(key=="Marque"){
          tab_marque = item;
        }
      })
      $.each(window.json, function(key, item){
        if(key=="Model"){
          tab_model = item;
        }
      })
      $.each(window.json, function(key, item){
        if(key=="Couleur"){
          tab_color = item;
        }
      })
      $.each(window.json, function(key, item){
        if(key=="Version"){
          tab_version = item;
        }
      })
      $.each(window.json, function(key, item){
        if(key=="Type"){
          tab_type = item;
        }
      })
      $.each(window.json, function(key, item){
        if(key=="Annee"){
          tab_annee = item;
        }
      })
    }



    function test(){
      AllTabs();
      val_marque=($('#inputMarque').val()).toLowerCase();
      val_model=($('#inputModel').val()).toLowerCase();
      val_color1=($('#inputCouleur1').val()).toLowerCase();
      val_color2=($('#inputCouleur2').val()).toLowerCase();
      val_version=($('#inputVersion').val()).toLowerCase();
      val_type=($('#inputType').val()).toLowerCase();
      val_annee=($('#inputAnnee').val()).toLowerCase();
      immaticulation=($('#inputImmat').val()).toLowerCase();
      $.each(tab_marque, function(key,item){
        if(tab_marque[key].Name.toLowerCase()==val_marque){
          id_marque = tab_marque[key].id;
        }
      })
      $.each(tab_model, function(key,item){
        if(tab_model[key].Name.toLowerCase()==val_model){
          id_model = tab_model[key].id;
        }
      })
      $.each(tab_color, function(key,item){
        if(tab_color[key].Name.toLowerCase()==val_color1){
          id_color1 = tab_color[key].id;
        }
      })
      $.each(tab_color, function(key,item){
        if(tab_color[key].Name.toLowerCase()==val_color2){
          id_color2 = tab_color[key].id;
        }
      })
      $.each(tab_version, function(key,item){
        if(tab_version[key].Name.toLowerCase()==val_version){
          id_version = tab_version[key].id;
        }
      })
      $.each(tab_type, function(key,item){
        if(tab_type[key].Name.toLowerCase()==val_type){
          id_type = tab_type[key].id;
        }
      })

      $.each(tab_annee, function(key,item){
        if(tab_annee[key].Name.toLowerCase()==val_annee){
          id_annee = tab_annee[key].id;
        }
      })
    }

    function affectation(){
      $('#hideImmat').val(id_immat);
      $('#hideModel').val(id_model);
      $('#hideCouleur1').val(id_color1);
      $('#hideCouleur2').val(id_color2);
      $('#hideVersion').val(id_version);
      $('#hideType').val(id_type);
      $('#hideAnnee').val(id_annee);

    }


    function  affectationdeux(){
      var divian=0;
      if(document.querySelector("#div_anonyme"))
      {
        divian=document.querySelector("#div_anonyme");
      }
      if(divian!=0 ){
        if(divian.classList=="montrer"){
          nomI =document.querySelector("#anoNom").value;
          prenomI=document.querySelector("#anoPrenom").value;
          mailI =document.querySelector("#anoMail").value;
        }else{
          nomI =document.querySelector("#variableNom").value;
          prenomI=document.querySelector("#variablePrenom").value;
          mailI =document.querySelector("#variableMail").value;
        }
      }
      else{
        choix=true;
        nomI =document.querySelector("#variableNom").value;
        prenomI=document.querySelector("#variablePrenom").value;
        mailI =document.querySelector("#variableMail").value;
      }

      if(document.getElementById("checkboxNonProprio").checked == true){
        nomP =document.querySelector("#NomProprio").value;
        prenomP=document.querySelector("#PrenomProprio").value;
        mailP =document.querySelector("#MailProprio").value;
        telP=document.querySelector("#TelephoneProprio").value;
      }else{
        if(divian.classList=="montrer"){
          nomP =document.querySelector("#anoNom").value;
          prenomP=document.querySelector("#anoPrenom").value;
          mailP =document.querySelector("#anoMail").value;
        }else{
          nomP =document.querySelector("#variableNom").value;
          prenomP=document.querySelector("#variablePrenom").value;
          mailP =document.querySelector("#variableMail").value;
          telP=document.querySelector("#variableTel").value;
        }
      }
    }


    $('#form').submit(function(event){
      event.preventDefault();
      test();
      affectation();
      affectationdeux();

      if (choix) {
        var coherence=false;
        if(tempo!=null){
          for (var i = 0; i < tempo.length; i++) {
            if(tempo[i].Name.toLowerCase()==val_model){
              coherence=true;
              break;
            }
          }
        }
        if (coherence){
          event.preventDefault();
          $.post(
            ajaxurl,
            {
              "action":"recupIdCar",
              "Immatriculate" : $("#inputImmat").val(),
              "id_twp_Vintage" : $("#inputAnnee").val(),
              "id_twp_Model" :id_model,
              "id_twp_Version":id_version,
              "id_twp_Type":id_type ,
              "couleur1":id_color1,
              "couleur2":id_color2
            },
            function(response){
              id_car=response;
              $("#hidei").val(response);
              if(id_car=="erreur"){
                alert("erreur de saisie de la voiture , le modele de vehicule choisi existe deja avec des critere different ,veuillez verifier les données saisie");
              }else{
                alert("formulaire de vol envoyé");
                event.preventDefault();
                    $.post(
                ajaxurl,
                {
                "action":"saveMess",
                "idcar":id_car,
                "nomI":nomI ,
                "prenomI":prenomI,
                "mailI": mailI,
                "nomP":nomP,
                "prenomP":prenomP,
                "mailP":mailP,
                "telP":telP,
                "adresse":document.querySelector("#adresseV").value,
                "codeP":document.querySelector("#codePostalV").value,
                "ville":document.querySelector("#VilleV").value,
                "pays":document.querySelector("#valueid").value,
                "precision":document.querySelector("#precision").value

              }
            )

          }

        }
      )



    }else{
      alert("le model du véhicule ne correspond pas a la marque ");
    }

  } else {
    alert("veuillez remplir la zone sans compte ou vous connecter ");
  }

});






}
)
