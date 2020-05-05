$(document).ready(function(){

var Answer;

$.post(
    ajaxurl,
    {
        "action": "getAllColor",
    },
    function (response) {
        Answer = JSON.parse(response);
        console.log(Answer);
        // arrayCountry = create_country_list();
        // init_autocomplete();
    }
)

// EVENT
////////////////////////////////////////////////////////////////////////////

$('#AddNewColorButton').on('click',function(){

    var newName = $('#inputNewNom').val();

    verifRemplissageNewName("#inputNewNom")
    verifExisteDeja(newName);
    $('#formNewColor').submit();

})


$('#buttonModif').on('click',function(){
    var colorModif = $('#selectColor').val();
    var newNameColor = $('#inputModifNameColor').val();

    verifExisteDeja(newNameColor);
    verifRemplissageNewName("#inputModifNameColor");

    $('#formModif').submit();
})


    //Vérification si la couleur existe déjà
    function verifExisteDeja(nomVerif) {
        if (Answer.find(x => x.Name.toUpperCase() === nomVerif.toUpperCase())) {
            open_pop_up("Cette couleur existe déjà");
            die();
        }
    }

    //Vérification du remplissge du champ
    function verifRemplissageNewName(nomDuChamp){
        if($(nomDuChamp).val() == "" || $(nomDuChamp).val() < 2){
            open_pop_up("Veuillez remplir tout les champs et entrer un nom valide");
            die();
        }
    }


});
