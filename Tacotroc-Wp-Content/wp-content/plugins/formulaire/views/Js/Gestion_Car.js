$(document).ready(function() {

  //create global var
  {
    var array_car=[];
    var array_immat=[];
    var array_club=[];
    var array_color=[];
    var array_brand=[];
    var array_model=[];
    var array_museum=[];
    var array_cylinder=[];
    var array_country=[];
    var array_owner=[];
    var array_serie=[];
    var array_type=[];
    var array_user=[];
    var array_version=[];
    var array_brand_model=[];
    var array_total=[];
    var pos_1='';
    var pos_2='';
    var array_brand_model_list='';
  }
  //init(array & autocomplete)
  {
    $.post(
      ajaxurl,
      {
        "action":"getAll",
      },
      function(response){
        Answer = JSON.parse(response);
        array_total=Answer;
        create_all_array();
        console.log(Answer);
      }
    )

    $.post(
      ajaxurl,
      {
        "action":"getAllrel",
      },
      function(response){
        AnswerRelColor = JSON.parse(response)
      }
    )

    function create_array(Tab_Name){
      var temp=[];
      var array=[];
      $.each(Answer,function(key,item){
        if(Tab_Name==key){
          temp=item;
        }
      })
      $.each(temp,function(key,item){
        array.push(item.Name);
      })
      return array;
    }

    function create_brand_model_list(){
      var list_marque=[];
      var list_model=[];
      var list_final=[];
      var tempo='';
      $.each(Answer,function(key,item){
        if("Marque"==key){
          list_marque=item;
        }
      })
      $.each(Answer,function(key,item){
        if("Model"==key){
          list_model=item;
        }
      })
      var i = 0;
      $.each(list_model,function(key,item){
        i++;
        tempo = list_marque.find(x => x.id === item.id_twp_Brand).Name;
        var tempoarray ={id:item.id,Name:tempo+" -> "+item.Name};
        list_final.push(tempoarray);
      })
      return list_final;
    }

    function create_all_array(){
      $.each(Answer,function(key,item){
        if("Cars"==key){
          array_car=item;
        }
      })
      array_immat=create_array("Immatriculate");
      array_club=create_array("Club");
      array_color=create_array("Couleur");
      array_brand=create_array("Marque");
      array_model=create_array("Model");
      array_museum=create_array("Musée");
      array_cylinder=create_array("Cylindrée");
      array_country=create_array("Pays");
      array_owner=create_array("Propriétaire");
      array_serie=create_array("Serie");
      array_type=create_array("Type");
      array_user=create_array("Utilisateur");
      array_version=create_array("Version");
      array_brand_model=create_brand_model_list();
      array_brand_model_list=to_list();
      launch_all_autocomplete();
    }

    function to_list(){
      var e=[];
      $.each(array_brand_model,function(key,item){
        e.push(item.Name);
      })
      return e
    }

    function launch_all_autocomplete(){
      launch_autocomplete("#Recherche_Immat",array_immat);
      launch_autocomplete("#info_pays",array_country);
      launch_autocomplete("#info_couleur_1",array_color);
      launch_autocomplete("#info_couleur_2",array_color);
      launch_autocomplete("#info_version",array_version.sort());
      launch_autocomplete("#info_type",array_type.sort());
      launch_autocomplete("#info_cylinder",array_cylinder);
      launch_autocomplete("#info_owner",array_owner.sort());
      launch_autocomplete("#info_museum",array_museum);
      launch_autocomplete("#info_club",array_club);
      launch_autocomplete("#info_brand_model",array_brand_model_list.sort());
    }

    function launch_autocomplete(cible,liste){
      $(cible).autocomplete({
        source : liste,
        minLength : 1
      });
    }
  }
  //recup voiture information et affichage
  {
    $("#Button_Car").on('click',function(){
      $("#form").trigger("reset");
      $("#envoieform").trigger("reset");
      recup_information_car();
      $(".information_car").show("slow");
    })

    function recup_information_car(){
      var occurence=0;
      var color_1='';
      var color_2='';
      pos_1='';
      pos_2='';
      var choosen_car = $("#Recherche_Immat").val();
      var my_car = array_car.find(x => x.Immatriculation === choosen_car);
      $.each(AnswerRelColor.Rel,function(key,item){
        if(my_car.id==item.id){
          if(occurence == 0){
            color_1=item.id_twp_Color;
            pos_1=key;
            occurence++;
          }else{
            color_2=item.id_twp_Color;
            pos_2=key;
          }
        }
      })

      $("#info_Immat").val($("#Recherche_Immat").val());
      if(my_car.id_twp_Country!=0 && my_car.id_twp_Country!="NULL" && my_car.id_twp_Country!=null){
        $("#info_pays").val(Answer.Pays.find(x => x.id === my_car.id_twp_Country).Name);
      }
      if(my_car.id_twp_Version!=0 && my_car.id_twp_Version!="NULL" && my_car.id_twp_Version!=null){
        $("#info_version").val(Answer.Version.find(x => x.id === my_car.id_twp_Version).Name);
      }
      if(my_car.id_twp_Type!=0 && my_car.id_twp_Type!="NULL" && my_car.id_twp_Type!=null){
        $("#info_type").val(Answer.Type.find(x => x.id === my_car.id_twp_Type).Name);
      }
      if(my_car.id_twp_Cylinder!=0 && my_car.id_twp_Cylinder!="NULL" && my_car.id_twp_Cylinder!=null){
        $("#info_cylinder").val(Answer.Cylindrée.find(x => x.id === my_car.id_twp_Cylinder).Name);
      }
      if(my_car.id_twp_Owner!=0 && my_car.id_twp_Owner!="NULL" && my_car.id_twp_Owner!=null){
        $("#info_owner").val(Answer.Propriétaire.find(x => x.id === my_car.id_twp_Owner).Name);
      }
      if(my_car.id_twp_Museum!=0 && my_car.id_twp_Museum!="NULL" && my_car.id_twp_Museum!=null){
        $("#info_museum").val(Answer.Musée.find(x => x.id === my_car.id_twp_Museum).Name);
      }
      if(my_car.id_twp_Club!=0 && my_car.id_twp_Club!="NULL" && my_car.id_twp_Club!=null){
        $("#info_club").val(Answer.Club.find(x => x.id === my_car.id_twp_Club).Name);
      }
      if(my_car.Years!=0 && my_car.Years!="NULL" && my_car.Years!=null){
        $("#info_annee").val(my_car.Years);
      }
      if(color_1!='' && color_1!="NULL" && color_1!=null){
        $("#info_couleur_1").val(Answer.Couleur.find(x => x.id === color_1).Name);
        $("#old_couleur_1").val(Answer.Couleur.find(x => x.id === color_1).id);
      }
      if(color_2!='' && color_2!="NULL" && color_2!=null){
        $("#info_couleur_2").val(Answer.Couleur.find(x => x.id === color_2).Name);
        $("#old_couleur_2").val(Answer.Couleur.find(x => x.id === color_2).id);
      }
      if(my_car.id_twp_Model!=0 && my_car.id_twp_Model!="NULL" && my_car.id_twp_Model!=null){
        $("#info_brand_model").val(array_brand_model.find(x => x.id === my_car.id_twp_Model).Name);
      }
    }
  }

  //récupération nouvelle donné
  $("#button_envoie").on('click',function(){
    recup_new_id();
    // alert("les informations vont être envoyés");
    $("#envoieform").submit();
  });

  function recup_new_id(){
    if($("#info_brand_model").val()!=""){
      $("#envoie_brand_model").val(Answer.Model.find(x => x.id === array_brand_model.find(x => x.Name === $("#info_brand_model").val()).id).id);
    }
    if($("#info_Immat").val()!=""){
      $("#envoie_id").val(Answer.Cars.find(x => x.Immatriculation === $("#info_Immat").val()).id);
    }
    if($("#info_pays").val()!=""){
      $("#envoie_pays").val(Answer.Pays.find(x => x.Name === $("#info_pays").val()).id);
    }
    if($("#info_version").val()!=""){
      $("#envoie_version").val(Answer.Version.find(x => x.Name === $("#info_version").val()).id);
    }
    if($("#info_type").val()!=""){
      $("#envoie_type").val(Answer.Type.find(x => x.Name === $("#info_type").val()).id);
    }
    if($("#info_cylinder").val()!=""){
      $("#envoie_cylindre").val(Answer.Cylindrée.find(x => x.Name === $("#info_cylinder").val()).id);
    }
    if($("#info_annee").val()!=""){
      $("#envoie_annee").val($("#info_annee").val());
    }
    if($("#info_owner").val()!=""){
      $("#envoie_propriétaire").val(Answer.Propriétaire.find(x => x.Name === $("#info_owner").val()).id);
    }
    if($("#info_museum").val()!=""){
      $("#envoie_musée").val(Answer.Musée.find(x => x.Name === $("#info_museum").val()).id);
    }
    if($("#info_club").val()!=""){
      $("#envoie_club").val(Answer.Club.find(x => x.Name === $("#info_club").val()).id);
    }
    if($("#info_couleur_1").val()!=""){
      $("#envoie_couleur_1").val(Answer.Couleur.find(x=>x.Name === $("#info_couleur_1").val()).id);
    }
    if($("#info_couleur_2").val()!=""){
      $("#envoie_couleur_2").val(Answer.Couleur.find(x=>x.Name === $("#info_couleur_2").val()).id);
    }
  }
});
