$(document).ready(function() {
  $.post(
    ajaxurl,
    {
      "action":"getallclub"
    },
    function(response){
      Answer = JSON.parse(response);
      init();
    }
  )

  function init(){
    var array_club=[];
    $.each(Answer,function(key,item){
      array_club.push(item.Name);
    })
    $("#input_modif_club").autocomplete({
      source : array_club,
      minLength : 1
    });
    console.log(array_club);
  }


  $("#button_modif").on("click",function(){
    recupid();
    test();
  })

  function recupid(){
    $("#hidden_id").val("");
    if(Answer.find(x => x.Name === $("#input_modif_club").val())){
      $("#hidden_id").val(Answer.find(x => x.Name === $("#input_modif_club").val()).id);
    }
  }

  function test(){
    if($("#input_modif_club").val()===""){
      open_pop_up("Aucun club sélectionné");
    }
    else{
      if($("#hidden_id").val()===""){
        open_pop_up("le club n'existe pas !");
      }
      else{
        if(Answer.find(x => x.Name === $("#input_New_Nom").val())){
          open_pop_up("Ce club existe déja.");
        }
        else{
          if($("#input_New_Nom").val()==""){
            open_pop_up('Le champ "Nouveau Nom" est vide');
          }
          else {
              $("#form_modif").submit();
          }
        }
      }
    }
  }

});
