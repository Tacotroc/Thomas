
function suppresionmess(element){
  let div=element.parentElement;
  ide=div.children[1].value;
  idc=div.children[0].value;
  var r = confirm("êtes -vous sur de vouloir supprimer ce message ?");
  if (r == true) {
    $.post(
      ajaxurl,
      {
        "action":"deleteMess",
        "ide":ide,
        "id_twp_car":idc
      },
      function(response){
        console.log(response);
        $("#rechargement").load(" #rechargement");// 4s pour recharcher le tableau
        // document.location.reload(true);
        //document.getElementById('rechargement').innerHTML =document.getElementById('rechargement').innerHTML ;
        //  $("#rechargement").html(response);
      }
    )
  }


}
function envoiMess(element){

  id=element.id;
  var r = confirm("êtes -vous sur de vouloir envoyer ce message ?");
  $.post(
    ajaxurl,
    {
      "action":"envoieMess",
      "mess":id
    },
    function(response){
      console.log(response);
      if(response==2){
        alert("message envoye");
      }
    }
  )

}

$("#test").toggle();
var affichage = true;
var search =document.getElementById("myInput");
search.addEventListener("keyup", function() {
  if(this.value.length==3 && affichage==true){
    $("#test").slideToggle("slow");
    $("#test2").slideToggle();
    affichage=!affichage;
  }
  if(this.value.length==2 && affichage== false)
  {
    $("#test").slideToggle("slow");
    $("#test2").slideToggle();
    affichage=!affichage;
  }
},true);


//filtrage du tableau designer a partir de n'importe quell valeur de celui-ci
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#recherche tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
