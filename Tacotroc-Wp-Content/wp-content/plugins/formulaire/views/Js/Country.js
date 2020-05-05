$(document).ready(function () {
    var Answer = "";
    var arrayCountry = [];

    $.post(
        ajaxurl,
        {
            "action": "getAllCountry",
        },
        function (response) {
            Answer = JSON.parse(response);
            console.log(Answer);
            arrayCountry = create_country_list();
            init_autocomplete();
        }
    )

    // EVENT
    ////////////
    $('#addNewCountry').on('click', function () {
        var nameAdd = $('#inputNom').val();
        verifExistName(nameAdd);
        $('#formAddCountry').submit();
    })

    $('#btnModifCountry').on('click', function () {
        var oldName = $('#inputNomModif').val();
        var newName = $('#inputName').val();

        verif(oldName,newName);
        verifExistName(newName);

      $('#id').val(recupIdCountry());

        $('#formModifCountry').submit();
    })


    // FONCTION UTILITAIRES

    function recupIdCountry(){
            var temp = $("#inputNomModif").val();
            console.log(temp);
            if(!Answer.find(x => x.Name === temp)){
              open_pop_up("Nom de pays invalide");
              die();
            }else{
                  var idCountry = Answer.find(x => x.Name === temp).id;
                  $('#id').val(idCountry);
                  console.log(idCountry);
                  return idCountry;
            }

    }

    //Vérification si le pays existe déjà
    function verifExistName(nomVerif) {
        if (Answer.find(x => x.Name.toUpperCase() === nomVerif.toUpperCase())) {
            open_pop_up("Ce pays existe déjà");
            die();
        }
    }

    // Création de la liste des marques existantes
    function create_country_list() {

        var array = [];

        $.each(Answer, function (key, item) {
            array.push(item.Name);
        })
        console.log(array);
        return array;
    }

    // Initialisation de l'autocomplete
    function init_autocomplete() {
        launch_autocomplete("#inputNomModif", arrayCountry);
    }

    // Autocomplete autocomplete() => plugin pour jQuery
    function launch_autocomplete(cible, liste) {
        console.log(liste);
        $(cible).autocomplete({
            source: liste,
            minLength: 1
        });
    }


    //Vérification même nom et CHAMPS VIDES
    function verif(oldName, newName) {

        if(oldName == "" || oldName < 2 || newName == "" || newName < 2){
            open_pop_up("Veuillez remplir tout les champs correctement");
            die();
        }
        // $.each(Answer,function(key,item){
        //     if(!oldName.toLowerCase() == item.Name.toLowerCase()){
        //         alert("Le pays à modifier n'existe pas")
        //     }
        // })

    }

    function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);}

});
