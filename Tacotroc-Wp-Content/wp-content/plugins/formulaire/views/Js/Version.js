$(document).ready(function(){

var Answer;
var array_version = [];

$.post(
    ajaxurl,
    {
        "action": "getAllVersion",
    },
    function (response) {
        Answer = JSON.parse(response);
        console.log(Answer);
        array_version = createArrayVersion();
        init_autocomplete();
    }
)

// EVENT
//_________________________________________________

// AJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUTAJOUT
$('#buttonNewName').on('click',function(){
    var newName = $('#inputNewName').val();
    verifChampsRempli(newName);
    verifExisteDeja(newName);

    $('#formAddVersion').submit();
})

// MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF MODIF
$('#buttonModifNameVersion').on('click',function(){

var oldName = $('#oldNameVersion').val();
var newNameModif = $('#NameReplace').val();

verifChampsRempli(oldName);
verifChampsRempli(newNameModif);

verifNameInconnu(oldName);

verifExisteDeja(newNameModif);
sameName(oldName,newNameModif);

recupIdAModifier();
$('#formModifVersion').submit();

})

// Verification la version à modifier est inconnu
function verifNameInconnu(a){
    if(!Answer.find(x => x.Name == a)){
        open_pop_up("La version à modifier ...n'existe pas");
        die();
    }
}


// 2 champs identique
function sameName(a,b){
    if(a == b){
        open_pop_up("Les 2 champs sont identique");
        die();
    }
}
//Récupération id marque
function recupIdAModifier(){
    var temp = $('#oldNameVersion').val();
    if(!Answer.find(x => x.Name === temp)){
      open_pop_up("Nom de version invalide");
      die();
    }else{
          var versionId = Answer.find(x => x.Name === temp).id;
          $('#idAModifier').val(versionId);
          return versionId;
          // alert("marque : OK");
    }
  }

// fonction vérifie si version existe déjà
function verifExisteDeja(nomaVerif){
    if(Answer.find(x => x.Name == nomaVerif)){
        open_pop_up("la version existe déjà");
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

// Création tableau des versions
function createArrayVersion(){

    var array = [];

    $.each(Answer, function (key, item) {
        array.push(item.Name);
    })
    console.log(array);
    return array;
}

// Initialisation de l'autocomplete
function init_autocomplete() {
    launch_autocomplete("#oldNameVersion", array_version);
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
