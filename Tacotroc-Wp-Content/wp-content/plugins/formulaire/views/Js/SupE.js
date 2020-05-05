var bool=true;
var couleur1,couleur2;
var tab_immat= [];
var tab_immat2= [];
var idv;

ajaxload();
function ajaxload(){
    $.post(
        ajaxurl,
        {
            "action":"getAllCar",
          },
          function(response){
              rep= JSON.parse(response);
              rep.forEach(function(el){
                  tab_immat.push(el);
                  tab_immat2.push(el.label);
                })
              }
            )
          }
$('#inputImmatV').autocomplete({source:tab_immat2});



function suppresionCar(element){

  idd=element.name;
  console.log(idd);
  var r = confirm("êtes -vous sur de vouloir supprimer ce vehicule  ?");
  if (r == true) {
    $.post(
      ajaxurl,
      {
        "action":"deleteCar",
        "id_twp_car":idd
      },
      function(response){
        console.log(response);
        $("#rechargement").load(" #rechargement");
      }
    )
  }
}

// $('#confirm').on('tap', function(){
//   confirmation();
// })

$('#confirm').on('click', function(){
  confirmation();
})

function confirmation(){
    console.log($("#inputImmatV").val());
    tab_immat.forEach(function(el){
      if(el.label==$("#inputImmatV").val())
      idv=el.value;
    })
      event.preventDefault();

  console.log($("#inputImmatV").val());
  tab_immat.forEach(function(el){
    if(el.label==$("#inputImmatV").val())
    idv=el.value;
  })
  console.log(idv);
  $.post(
    ajaxurl,{
      "action":"recupCar",
      "id":idv
    },
    function(response){
      var rep = JSON.parse(response);
      console.log(rep);
      if(rep.Immatriculation!=null){
        $("#inputImmat").val(rep.Immatriculation);
      }
      else{
        $("#inputImmat").val("NULL");
      }
      if(rep.Details_Color_1!=null && rep.Details_Color_1!=0){
        $("#inputcouleur1").val(rep.Details_Color_1);
      }
      else{
        $("#inputcouleur1").val("NULL");
      }
      if(rep.Details_Color_2!=null && rep.Details_Color_2!=0){
        $("#inputcouleur2").val(rep.Details_Color_2);
      }
      else{
        $("#inputcouleur2").val("NULL");
      }
      if(rep.id_twp_Model!=null && rep.id_twp_Model!=0){
        $("#inputModel").val(rep.id_twp_Model);
      }
      else{
        $("#inputModel").val("NULL");
      }
      if(rep.id_twp_Version!=null && rep.id_twp_Version!=0){
        $("#inputVersion").val(rep.id_twp_Version);
      }
      else{
        $("#inputVersion").val("NULL");
      }
      if(rep.id_twp_Type!=null && rep.id_twp_Type!=0){
        $("#inputType").val(rep.id_twp_Type);
      }
      else{
        $("#inputType").val("NULL");
      }
      if(rep.id_twp_Cylinder!=null && rep.id_twp_Cylinder!=0){
        $("#inputCylinder").val(rep.id_twp_Cylinder);
      }
      else{
        $("#inputCylinder").val("NULL");
      }
      if(rep.id_twp_Serie!=null && rep.id_twp_Serie!=0){
        $("#inputSerie").val(rep.id_twp_Serie);
      }
      else{
        $("#inputSerie").val("NULL");
      }
      if(rep.id_twp_Owner!=null && rep.id_twp_Owner!=0){
        $("#inputOwner").val(rep.id_twp_Owner);
      }
      else{
        $("#inputOwner").val("NULL");
      }
      if(rep.id_twp_Country!=null && rep.id_twp_Country!=0){
        $("#inputCountry").val(rep.id_twp_Country);
      }
      else{
        $("#inputCountry").val("NULL");
      }
      if(rep.id_twp_Museum!=null && rep.id_twp_Museum!=0){
        $("#inputMusee").val(rep.id_twp_Museum);
      }
      else{
        $("#inputMusee").val("NULL");
      }
      if(rep.id_twp_Club!=null && rep.id_twp_Club!=0){
        $("#inputClub").val(rep.id_twp_Club);
      }
      else{
        $("#inputClub").val("NULL");
      }
      if(rep.Years!=null){
        console.log("rep years ="+ rep.Years);
        if(rep.Years==0){
          $("#inputYears").val('');
        }else{
          $("#inputYears").val(rep.Years);
        }
      }
      else{
        $("#inputYears").val('');
      }
      if(rep.Comment!=null){
        $("#commentaire").val(rep.Comment);
      }
      else{
        $("#commentaire").val("");
      }
      if(rep.Restoration==1){
        $( "#restauration" ).prop( "checked", true );
      }else{
        $( "#restaurationf" ).prop( "checked", true );
      }
      if(rep.id_twp_User!=null && rep.id_twp_User!=0){
        $("#inputUser").val(rep.id_twp_User);
      }
      couleur1=rep.Details_Color_1;
      couleur2=rep.Details_Color_2;
      if(bool==true){
        $("#modifcar").slideToggle("slow");
        bool=false;
      }
    }
  )
}

$('#form').submit(function(event){
  event.preventDefault();
  $.post(ajaxurl,
    {
      "action":"modifCar",
      "id":idv,
      "immatv":$("#inputImmat").val(),
      "restauration":$("input:checked").val(),
      "idc1":$("#inputcouleur1").val(),
      "idc2":$("#inputcouleur2").val(),
      "couleur1":couleur1,
      "couleur2":couleur2,
      "years":$("#inputYears").val(),
      "idm":$("#inputModel").val(),
      "idv": $("#inputVersion").val(),
      "idt":$("#inputType").val(),
      "idcy":$("#inputCylinder").val(),
      "ids":$("#inputSerie").val(),
      "ido":$("#inputOwner").val(),
      "idp":$("#inputCountry").val(),
      "idmu":$("#inputMusee").val(),
      "idcl":$("#inputClub").val(),
      "commentaire":$("#commentaire").val(),
      "idu":$("#inputUser").val(),
    },
    function(response){
      alert(response);
      $("#rechargement").load(" #rechargement");
      bool=true;
      location.reload(true);
    }
  );
})
