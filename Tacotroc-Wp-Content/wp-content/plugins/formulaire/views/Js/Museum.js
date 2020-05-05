$(document).ready(function(){



    var Answer;

    $.post(
        ajaxurl,
        {
            "action": "getAllMuseum",
        },
        function (response) {
            Answer = JSON.parse(response);
            console.log(Answer);
            array_type = createArrayMuseum();
            // init_autocomplete();
        }
    )

    // EVENT
    $('#btnAddMuseum').on('click',function(){
        verifChampsRempli($('#inputNewMuseum').val());
        verifExisteDeja($('#inputNewMuseum').val());

        verifExisteDeja($('#inputNewMuseum').val());

        $('#formAddMuseum').submit();
    })



    $('#btnModifMuseum').on('click',function(){
        verifChampsRempli($('#inputModifMuseum').val());
        verifChampsRempli($('#selectMuseum').val());


        verifExisteDeja($('#inputModifMuseum').val());

        $('#formModifMuseum').submit();

    })

        // Fonction utilitaires

function verifChampsRempli(name){
    if(name == "" || name == "--Selectionner un musée--"){
        open_pop_up("Veuillez remplir tout les champs correctement");
        die();
    }
}

// fonction vérifie si la cylindrée existe déjà
function verifExisteDeja(nomaVerif){
    if(Answer.find(x => x.Name == nomaVerif)){
        open_pop_up("le nom du musée existe déjà");
        die();
    }
}
// fonction vérifie si la cylindrée existe déjà
function verifExisteDeja(nomaVerif){
    if(Answer.find(x => x.Name == nomaVerif)){
        open_pop_up("le nom du Musée existe déjà");
        die();
    }
}

function createArrayMuseum(){
    var array = [];

    $.each(Answer, function (key, item) {
        array.push(item.Name);
    })
    console.log(array);
    return array;
}

})
