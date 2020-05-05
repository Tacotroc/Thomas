$(document).ready(function() {
  var listowner=[];
  var form = $('#formModif');
  $.post(
    ajaxurl,{"action":"getAllOwner"},
    function(response){
      rep=JSON.parse(response);
      console.log(rep);
      rep.forEach(function(el){
        listowner.push(el);
      })
  }
  )
$('#inputRecherche').autocomplete({source: listowner});
document.querySelector('#validchoix').addEventListener("click",function(){remplisage()},true);
document.querySelector('#updateowner').addEventListener("click",function(){form.submit()},true);

  function remplisage()
  {
    var testing =$('#inputRecherche').val();
    var id ="";
for (var i = 0; i<listowner.length; i++) {
      if(listowner[i].value == testing )
      {
        id=listowner[i].desc;
        console.log(id);
        $.post(
          ajaxurl,{
            "action":"getOwnerId",
            "id":id

          },
          function(response){
            rep=JSON.parse(response);
            console.log(rep);
                $('#inputId').val(rep[0].id);
            $('#inputNomModif').val(rep[0].Last_Name);
            $('#inputPrenom').val(rep[0].First_Name);
            $('#inputSiret').val(rep[0].Siret);
            $('#inputEntreprise').val(rep[0].Compagny_Name);
            $('#inputPhone').val(rep[0].Phone);
            if(rep[0].Compagny==1){
              $( "#oui" ).prop( "checked", true );


            }else{
              $( "#non" ).prop( "checked", true );



            }
          }
        )
      }
    }
  }
});
