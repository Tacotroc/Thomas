$(document).ready(function() {
  {
    $("#reset_box").hide();
    window.json =null;
    var mon_input = null;
    var mon_tableau = '';
    var nom_tableau = [];
    var Compteur = 0;
    var Error ='';
    var ModelError='';
    var mesmarque='';
    var mamarque='';
    var Compteur_same=0;
    var form = document.querySelector("#form");
    var Suggestion = document.querySelector("#Box_Suggestion");
    $("#reset").click(function(){resetform()});
    form.addEventListener("focus", function() {AjoutBox(event.target)},true);
    document.body.addEventListener('click', function(){if(event.target.classList.contains("suggestion_text")){ChangerValeur(event.target, function() {RetirerBox(Suggestion);});}});
    document.body.addEventListener('click', function(){TestOnClick(event.target);});
    $("#refresh").click(function(){refresh()});
    function myajax(){
      $.post(
        ajaxurl,
        {
          "action":"getAll",
        },
        function(response){
          console.log(response);
          window.json = JSON.parse(response);
          tableau_immat = [];
          tableau_immat_final = [];
          $.each(window.json, function(key, item){
            if("Immatriculate"==key){
              tableau_immat = item;
            }
          })
          $.each(tableau_immat, function(key, item){
            tableau_immat_final.push(item.Name);
          })
          tableau_immat_final.sort();
          setInterval(function(){verifimmat();}, 2000);
        }
      )
    }
    myajax();
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
  function TestOnClick(e){
    console.log("id: ",e.id);
    console.log("id: ",e.classList);
    if(!e.classList.contains("suggestion_text") && !e.classList.contains("champ_input")){
      RetirerBox(Suggestion);
    }
    else if(e.classList.contains("champ_input")){
      $("#Box_Suggestion").empty();
    }
  }

  {
    var tab_id = '';
    var tab_immat= '';
    var tab_marque='';
    var tab_model='';
    var tab_pays='';
    var tab_color='';
    var tab_version='';
    var tab_type='';
    var tab_cylindre='';
    var tab_annee='';
    var tab_owner='';
    var tab_musee='';
    var tab_club='';

    var val_marque='';
    var val_model='';
    var val_pays='';
    var val_color1='';
    var val_color2='';
    var val_version='';
    var val_type='';
    var val_cylindre='';
    var val_annee='';
    var val_owner='';
    var val_musee='';
    var val_club='';

    var id_immat='';
    var id_marque='';
    var id_model='';
    var id_pays='';
    var id_color1='';
    var id_color2='';
    var id_version='';
    var id_type='';
    var id_cylindre='';
    var id_annee='';
    var id_annee2='';
    var id_owner='';
    var id_musee='';
    var id_club='';

    var mon_model='';
    var immaticulation='';
  }
  function refresh(){
    myajax();
  }

  function ChangerValeur(e,callback){
    $('.inputfocused').val(e.textContent.replace(/^\s\s*/, '').replace(/\s\s*$/, ''));
    mon_input = $('.inputfocused').val();
    ChangerBox(Error);
    callback();
  }

  //gestion envoie formulaire
  {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });

    setInterval(function(){ValidButton();}, 1000);

    function ValidButton(){
      if($("#error_marque").text()!="" || $("#error_model").text()!="" || $("#error_country").text()!="" || $("#error_color_1").text()!="" || $("#error_color_2").text()!="" || $("#error_version").text()!="" || $("#error_type").text()!="" || $("#error_cylinder").text()!="" || $("#error_owner").text()!="" || $("#error_museum").text()!="" || $("#error_club").text()!=""){
        $(".bouton_envoie").attr("disabled", true);
      }
      else{
        $(".bouton_envoie").attr("disabled", false);
      }
    }
  }

  //gestion doublon immaticulation
  {
    function verifimmat(){
      verif = 0;
      $.each(tableau_immat_final,function(key, item){
        if($('#inputImmat').val()==item){
          verif+=1;
        }
      })
      if(verif == 0){
        $("#box_envoie").show();
        $("#reset_box").hide();
        $("#alertCopie").hide();
      }
      else{
        $("#box_envoie").hide();
        $("#reset_box").show();
        $("#alertCopie").show();
      }
    }
  }

  function resetform(){
    $("#error_marque").text("");
    $("#error_model").text("");
    $("#error_country").text("");
    $("#error_color_1").text("");
    $("#error_color_2").text("");
    $("#error_version").text("");
    $("#error_type").text("");
    $("#error_cylinder").text("");
    $("#error_owner").text("");
    $("#error_museum").text("");
    $("#error_club").text("");
    $('#inputPays').val("");
    $('#inputMarque').val("");
    $('#inputModel').val("");
    $('#inputCouleur1').val("");
    $('#inputCouleur2').val("");
    $('#inputVersion').val("");
    $('#inputType').val("");
    $('#inputCylinder').val("");
    $('#inputAnnee').val("");
    $('#inputOwner').val("");
    $('#inputMuseum').val("");
    $('#inputClub').val("");
    $('#inputImmat').val("");
    $('body').scrollTo(0);
  }

  function AjoutBox(e){
    if (e.type == "text"){
      Suggestion.style.top = e.offsetHeight+e.offsetTop+"px";
      Suggestion.style.width = e.offsetWidth+"px";
      nom_tableau = [];
      if(!e.classList.contains("inputfocused")){
        $('.inputfocused').toggleClass("inputfocused");
        $(e).toggleClass("inputfocused");
      }
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
            console.log("resultat :"+ mamarque);
          }
        })
        $.each(window.json, function(key, item){
          if(e.name==key){
            mon_tableau = item;
          }
        })
        $.each(mon_tableau, function(key, item){
          if (item.id_twp_Brand == mamarque){
            console.log(item);
            nom_tableau.push(item.Name);
          }
        })
        nom_tableau.sort();
        console.log(nom_tableau);
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
      console.log(nom_tableau);
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
    $(".inputfocused").toggleClass("inputfocused");
  }

  function ChangerBox(e){
    Compteur = 0;
    $("#Box_Suggestion").empty();
    $.each(nom_tableau, function(key, item){
      if (Compteur != 3){
        if (mon_input.toLowerCase() == item.substring(0,mon_input.length).toLowerCase()){
          Compteur +=1;
          $("#Box_Suggestion").append("<p class='suggestion_text'>"+item+"</p>");
        }
      }
    })
    Compteur_same=0;
    $('#Box_Suggestion').children('p').each(function () {
      if($(this).text().toLowerCase() == mon_input.toLowerCase())
      Compteur_same +=1;
    });
    if (Compteur == 0 && e.text().length == 0 && document.activeElement.id != "inputAnnee"){
      e.append("Element introuvable");
    }
    else if(Compteur_same == 0 && e.text().length == 0){
      e.append("Element introuvable");
    }
    else if (Compteur > 0 && Compteur_same > 0){
      e.empty();
    }
  }

  function AllTabs(){
    $.each(window.json, function(key, item){
      if(key=="ID"){
        tab_id = item;
      }
    })
    $.each(window.json, function(key, item){
      if(key=="Immatriculate"){
        tab_immat = item;
      }
    })
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
      if(key=="Pays"){
        tab_pays = item;
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
      if(key=="Cylindrée"){
        tab_cylindre = item;
      }
    })
    $.each(window.json, function(key, item){
      if(key=="Annee"){
        tab_annee = item;
      }
    })
    $.each(window.json, function(key, item){
      if(key=="Propriétaire"){
        tab_owner = item;
      }
    })
    $.each(window.json, function(key, item){
      if(key=="Musée"){
        tab_musee = item;
      }
    })
    $.each(window.json, function(key, item){
      if(key=="Club"){
        tab_club = item;
      }
    })
  }

  function test(){
    AllTabs();
    val_pays=($('#inputPays').val()).toLowerCase();
    val_marque=($('#inputMarque').val()).toLowerCase();
    val_model=($('#inputModel').val()).toLowerCase();
    val_color1=($('#inputCouleur1').val()).toLowerCase();
    val_color2=($('#inputCouleur2').val()).toLowerCase();
    val_version=($('#inputVersion').val()).toLowerCase();
    val_type=($('#inputType').val()).toLowerCase();
    val_cylindre=($('#inputCylinder').val()).toLowerCase();
    val_annee=($('#inputAnnee').val()).toLowerCase();
    val_owner=($('#inputOwner').val()).toLowerCase();
    val_musee=($('#inputMuseum').val()).toLowerCase();
    val_club=($('#inputClub').val()).toLowerCase();
    immaticulation=($('#inputImmat').val()).toLowerCase();
    id_immat = parseInt(tab_id[tab_id.length - 1].id);
    id_immat = id_immat+1;
    $.each(tab_pays, function(key,item){
      if(tab_pays[key].Name.toLowerCase()==val_pays){
        id_pays = tab_pays[key].id;
      }
    })
    $.each(tab_marque, function(key,item){
      if(tab_marque[key].Name.toLowerCase()==val_marque){
        id_marque = tab_marque[key].id;
      }
    })
    $.each(tab_model, function(key,item){
      if(tab_model[key].Name.toLowerCase()==val_model && tab_model[key].id_twp_Brand==id_marque){
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
    $.each(tab_cylindre, function(key,item){
      if(tab_cylindre[key].Name.toLowerCase()==val_cylindre){
        id_cylindre = tab_cylindre[key].id;
      }
    })
    $.each(tab_annee, function(key,item){
      if(tab_annee[key].Name.toLowerCase()==val_annee){
        id_annee2 = tab_annee[key].id;
      }
    })
    $.each(tab_owner, function(key,item){
      if(tab_owner[key].Name.toLowerCase()==val_owner){
        id_owner = tab_owner[key].id;
      }
    })
    $.each(tab_musee, function(key,item){
      if(tab_musee[key].Name.toLowerCase()==val_musee){
        id_musee = tab_musee[key].id;
      }
    })
    $.each(tab_club, function(key,item){
      if(tab_club[key].Name.toLowerCase()==val_club){
        id_club = tab_club[key].id;
      }
    })
  }

  function affectation(){
    $('#hideid').val(id_immat);
    $('#hideImmat').val();
    $('#hideModel').val(id_model);
    $('#hidePays').val(id_pays);
    $('#hideCouleur1').val(id_color1);
    $('#hideCouleur2').val(id_color2);
    $('#hideVersion').val(id_version);
    $('#hideType').val(id_type);
    $('#hideCylinder').val(id_cylindre);
    $('#hideAnnee').val(id_annee);
    $('#hideOwner').val(id_owner);
    $('#hideMuseum').val(id_musee);
    $('#hideClub').val(id_club);
  }

  $('body').scroll(function() {
    $('#refresh').css('top', $(this).scrollTop());
  });

  $('#form').submit(function(){
    $(".bouton_envoie").attr("disabled", true);
    test();
    affectation();
    console.log("idfinal:",id_immat,"marque :",id_marque,"model:",id_model,"pays:",id_pays,"couleur 1:",id_color1,"couleur 2:",id_color2,"version:",id_version,"type:",id_type,"cylindre:",id_cylindre,"annee:",id_annee,"owner:",id_owner,"musee:",id_musee,"club:",id_club,"immat:",immaticulation);
  })
});
