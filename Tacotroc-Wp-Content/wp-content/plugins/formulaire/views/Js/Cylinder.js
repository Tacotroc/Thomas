$(document).ready(function(){


    var Answer;

    $.post(
        ajaxurl,
        {
            "action": "getAllCylinder",
        },
        function (response) {
            Answer = JSON.parse(response);
            console.log(Answer);
            array_type = createArrayCylinder();
            init_autocomplete();
        }
    )


    // EVENT
    $('#buttonAddNewCylinder').on('click',function(){
        verifChampsRempli($('#inputNom').val());
        verifExisteDeja($('#inputNom').val());

        $('#formAddCylinder').submit();
    })


    $('#btnModifCylinder').on('click',function(){

        verifChampsRempli($('#oldName').val());
        verifChampsRempli($('#newName').val());


        verifNameInconnu($('#oldName').val());
        verifExisteDeja($('#newName').val());

        recupIdAModifier();

$('#formModifCylinder').submit();
    })

      // Initialisation de l'autocomplete
function init_autocomplete() {
    launch_autocomplete("#oldName", array_type);
}
// Autocomplete autocomplete() => plugin pour jQuery
function launch_autocomplete(cible, liste) {
    console.log(liste);
    $(cible).autocomplete({
        source: liste,
        minLength: 1
    });
}

  //Création tableau des types existants
  function createArrayCylinder(){
    var array = [];

    $.each(Answer, function (key, item) {
        array.push(item.Cylinder);
    })
    console.log(array);
    return array;
  }

    // Fonction utilitaires

function verifChampsRempli(name){
    if(name == ""){
        open_pop_up("Veuillez remplir tout les champs correctement");
        die();
    }
}

// fonction vérifie si la cylindrée existe déjà
function verifExisteDeja(nomaVerif){
    if(Answer.find(x => x.Cylinder == nomaVerif)){
        open_pop_up("le nom du cylindré existe déjà");
        die();
    }
}

//Verification champ rempli
function verifChampsRempli(name){
    if(name == ""){
        open_pop_up("Veuillez remplir tout les champs correctement");
        die();
    }
}
// fonction vérifie si Type existe déjà
function verifExisteDeja(nomaVerif){
    if(Answer.find(x => x.Cylinder == nomaVerif)){
        open_pop_up("le nom de la cylindrée existe déjà");
        die();
    }
}

// Verification le cylindre à modifier est inconnu
function verifNameInconnu(a){
    if(!Answer.find(x => x.Cylinder == a)){
        open_pop_up("Le cylindre à modifier ...n'existe pas");
        die();
    }
}

//Récupération id marque
function recupIdAModifier(){
    var temp = $('#oldName').val();
    if(!Answer.find(x => x.Cylinder === temp)){
      open_pop_up("Nom de cylindre invalide");
      die();
    }else{
          var cylinderId = Answer.find(x => x.Cylinder === temp).id;
          $('#idOldCylinder').val(cylinderId);
          return cylinderId;
          // alert("marque : OK");
    }
  }

})
