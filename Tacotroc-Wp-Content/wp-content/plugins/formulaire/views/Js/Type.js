$(document).ready(function(){

var Answer;
var array_type = [];

$.post(
    ajaxurl,
    {
        "action": "getAllType",
    },
    function (response) {
        Answer = JSON.parse(response);
        console.log(Answer);
        array_type = createArrayType();
        init_autocomplete();
    }
)


// EVENT EVENT EVENT EVENT EVENT EVENT EVENT

// AJOUT
$('#ButtonAddNewType').on('click', function(){
    verifChampsRempli($('#newTypeInput').val());
    verifExisteDeja($('#newTypeInput').val());
    $('#formAddType').submit();
})

//MODIF
$('#buttonModif').on('click',function(){
    verifChampsRempli($('#oldTypeName').val());
    verifChampsRempli($('#newModifType').val());
    verifExisteDeja($('#newModifType').val());
    verifNameInconnu($('#oldTypeName').val());
    recupIdAModifier();

    $('#formModifType').submit();

})

// Verification le type à modifier est inconnu
function verifNameInconnu(a){
    if(!Answer.find(x => x.Name == a)){
        open_pop_up("Le TYPE à modifier ...n'existe pas");
        die();
    }
}

// fonction vérifie si Type existe déjà
function verifExisteDeja(nomaVerif){
    if(Answer.find(x => x.Name.toLowerCase() == nomaVerif.toLowerCase())){
        open_pop_up("le TYPE existe déjà");
        die();
    }
}

// Fonction utilitaires

function verifChampsRempli(name){
    if(name == ""){
        open_pop_up("Veuillez remplir tout les champs correctement");
        die();
    }
}

//Récupération id marque
function recupIdAModifier(){
    var temp = $('#oldTypeName').val();
    if(!Answer.find(x => x.Name === temp)){
      open_pop_up("Nom de version invalide");
      die();
    }else{
          var versionId = Answer.find(x => x.Name === temp).id;
          $('#idARecupType').val(versionId);
          return versionId;
          // alert("marque : OK");
    }
  }

  //Création tableau des types existants
  function createArrayType(){
    var array = [];

    $.each(Answer, function (key, item) {
        array.push(item.Name);
    })
    console.log(array);
    return array;
  }

  // Initialisation de l'autocomplete
function init_autocomplete() {
    launch_autocomplete("#oldTypeName", array_type);
}
// Autocomplete autocomplete() => plugin pour jQuery
function launch_autocomplete(cible, liste) {
    console.log(liste);
    $(cible).autocomplete({
        source: liste,
        minLength: 1
    });
}

})
