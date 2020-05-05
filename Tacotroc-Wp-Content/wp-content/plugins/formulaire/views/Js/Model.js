$(document).ready(function() {

  $.post(
    ajaxurl,
    {
      "action":"getModelBrand",
    },
    function(response){
      Answer = JSON.parse(response);
      console.log(Answer);
      init_autocomplete();
      console.log(array_model);
    }
  )

  //var
  {
    var array_model=[];
    var array_brand=[];
    var array_model_list=[];
  }


  //Event
  {


    $("#Button_Info").on("click",function(){
      $("#form_modification").trigger("reset");
      recup_info_model();
      $(".information_car").show("slow");
    })

    $("#button_envoie").on("click",function(){
      send_info();
      alert("Les modification vont être envoyé");
      $("#form_modification").submit();
    })

    // Récupération de l'ID de la marque concernée et du Nom du modèle ajouté
    $('#AddModelButton').on("click",function(){
      recupNameModel();
      recupIdBrand();
      verifExisteModelBrand();
      $('#formAddModel').submit();

    })

  }

  function verifExisteModelBrand(){
    var tempModel = $('#inputNom').val();
    var tempNameBrand = $('#input_Brand').val();

    console.log(Answer.Model);
    var tabAssociation = new Array;
    //Création du tableau avec apparition du modèle existant
    $.each(Answer.Model, function(key,item){
      //Les 2 Nom à comparer tout les deux en majuscules
      if(toUpper(item.Name) == toUpper(tempModel)){
        tabAssociation.push(item);
      }
    })
    //Si l'id de la marque existe dans ce tableau => affichage du message
    var idBrand = recupIdBrand();
    $.each(tabAssociation, function(key,item){
      if(idBrand == item.id_twp_Brand){
      open_pop_up("Le modèle existe déjà pour cette marque! =) ")
      die();
      }
    })


    console.log(tabAssociation);


    // if(Answer.Model.find(x => x.Name === tempModel) && Answer.Marque.find(y => y.Name === tempNameBrand)){
    //   alert("Le modèle existe déjà pour cette marque! =) ")
    //   die();
    // }
  }

  function toUpper(str) {
    return str
        .toLowerCase()
        .split(' ')
        .map(function(word) {
            return word[0].toUpperCase() + word.substr(1);
        })
        .join(' ');
     }

  //Récupération nom modèle
  function recupNameModel(){
    if($('#inputNom').val() == ""){
      open_pop_up("Veuillez entrer un nom de modèle");
      die();
    }else{
    $('#model_name').val($('#inputNom').val());
    // alert("Modèle : OK")
    }
  }

  //Récupération id marque
  function recupIdBrand(){
    var temp = $("#input_Brand").val();
    if(!Answer.Marque.find(x => x.Name === temp)){
      open_pop_up("Nom de marque invalide");
      die();
    }else{
          var brand_id = Answer.Marque.find(x => x.Name === temp).id;
          $('#brand_id').val(brand_id);
          return brand_id;
          // alert("marque : OK");
    }
  }


  //Function prin
  {
    function init_autocomplete(){
      array_model = create_model_list();
      array_brand = create_brand_list();
      array_model_list=to_list();
      launch_autocomplete("#select_model",array_model_list);
      launch_autocomplete("#info_marque",array_brand);
      launch_autocomplete("#input_Brand",array_brand);
    }

    function recup_info_model(){
      var temp = $("#select_model").val();
      var my_id=array_model.find(x => x.Name === temp).id;
      $("#model_id").val(my_id);
      var mon_model = Answer.Model.find(x => x.id === my_id);
      $("#info_model").val(mon_model.Name);
      $("#info_marque").val(Answer.Marque.find(x => x.id === mon_model.id_twp_Brand).Name);
    }




    function send_info(){

      if($("#info_model").val()==''){
        open_pop_up("Le modéle est vide.");
        die();
      }
      else{
        var temp_model = $("#info_model").val();
        if($("#info_marque").val()==''){
          open_pop_up("la marque est vide.");
          die();
        }
        else{

          if(Answer.Marque.find(x => x.Name === $("#info_marque").val()))
          {
            var temp_brand = $("#info_marque").val();
            var id_marque_final = Answer.Marque.find(x => x.Name === temp_brand).id;
            if(Answer.Model.find(x => x.Name === temp_model).id_twp_Brand === id_marque_final){
              open_pop_up("Cette association Marque/Modéle existe déja.");
              die();
            }
            else{
              $("#new_model").val(temp_model);
              $("#new_brand").val(Answer.Marque.find(x => x.Name === temp_brand).id);
            }
          }
          else{
            open_pop_up("Cette marque n'existe pas");
            die();
          }
        }
      }
    }


  }



  //Function 2²
  {

    function to_list(){
      var e=[];
      $.each(array_model,function(key,item){
        e.push(item.Name);
      })
      return e
    }

//création liste des marques existantes
    function create_brand_list(){
      var temp=[];
      var array=[];
      $.each(Answer,function(key,item){
        if("Marque"==key){
          temp=item;
        }
      })
      $.each(temp,function(key,item){
        array.push(item.Name);
      })
      return array;
    }

    //création liste modèles existants
    function create_model_list(){
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

    //fonction d'autocomplétion
    function launch_autocomplete(cible,liste){
      console.log(liste);
      $(cible).autocomplete({
        source : liste,
        minLength : 1
      });
    }

  }


});
