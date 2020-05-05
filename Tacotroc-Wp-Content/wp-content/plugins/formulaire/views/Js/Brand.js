$(document).ready(function () {

    var Answer = "";
    var array_brand = [];

    $.post(
        ajaxurl,
        {
            "action": "getAllBrand",
        },
        function (response) {
            Answer = JSON.parse(response);
            console.log(Answer);
            array_brand = create_brand_list();
            init_autocomplete();
        }
    )

    ///////////////////////////////////////////////////////
    // EVENT

    //Evenement MODIFICATION
    $('#modifButton').on("click", function () {

        verifChampsRempli($('#info_marque').val());
        verifChampsRempli($('#inputNom').val());

        $('#idModifBrand').val(recupIdBrand());

        verif();
        alert("Les modification vont être envoyé");
        $("#formModifBrand").submit();

    })

    // Evenement AJOUT
    $('#btnAjout').on("click",function(){
        verifChampsRempli($('#inputNewName').val());
        
        verifExistName($('#inputNewName').val());
        $('#formAddBrand').submit();

    })

    ///////////////////////////////////////////////////////
    // FONCTIONS UTILITAIRES

    function verifChampsRempli(name){
        if(name == "" || name == "--Selectionner un musée--"){
            open_pop_up("Veuillez remplir tout les champs correctement");
            die();
        }
    }

    //Verification si la marque à ajouter n'existe pas déjà
    function verifExistName(nomVerif){
        if(Answer.find(x => x.Name.toUpperCase() === nomVerif.toUpperCase())){
            open_pop_up("Cette marque existe déjà");
            die();
        }
    }


    // Vérification même nom et CHAMPS VIDES
    function verif(){
        var oldName = $('#info_marque').val();
        var newNom = $('#inputNom').val();
        if(newNom == ""){
            open_pop_up("Veuillez entrer un nouveau nom");
            die();
        }else if( oldName == ""){
            open_pop_up("Veuillez sélectionner une marque à modifier");
            die();
        }else if(newNom == oldName){
            open_pop_up("Il n'y a aucune différence");
            die();
        }else if(Answer.find(x => x.Name === newNom.toUpperCase())){
            open_pop_up("Cette marque existe déjà");
            die();
        }
    }


    // Initialisation de l'autocomplete
    function init_autocomplete() {
        launch_autocomplete("#info_marque", array_brand);
    }

    // Autocomplete autocomplete() => plugin pour jQuery
    function launch_autocomplete(cible, liste) {
        console.log(liste);
        $(cible).autocomplete({
            source: liste,
            minLength: 1
        });
    }

    // Création de la liste des marques existantes
    function create_brand_list() {

        var array = [];

        $.each(Answer, function (key, item) {
            array.push(item.Name);
        })
        console.log(array);
        return array;
    }

    //Récupération id marque
    function recupIdBrand() {
        var temp = $("#info_marque").val();
        console.log(temp);
        if(!Answer.find(x => x.Name === temp)){
          open_pop_up("Nom de marque invalide");
          die();
        }else{
              var brand_id = Answer.find(x => x.Name === temp).id;
              $('#brand_id').val(brand_id);
              console.log(brand_id);
              return brand_id;
        }
    }
});
