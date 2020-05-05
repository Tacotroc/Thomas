var fond = document.querySelector(".bg_modal");
var Anonyme = document.querySelector("#div_anonyme");
var fermeture = document.querySelector(".croix");
var background = document.querySelector("#vide");
var choix= false ;
var popup= "";
$("#inputAnonyme").click(function(){});



var pseudo =document.querySelector("#inputMail");
var mdp =document.querySelector("#inputPassword1");
btn_co=document.querySelector("#btn_co");
btn_co.addEventListener("click",
function con(event){
  var rep='';
  $.post(
    ajaxurl,
    {
      "action":"connexion",
      "Pseudo":document.querySelector("#inputMail").value,
      "Password":document.querySelector("#inputPassword1").value
    },
    function(response){
      rep=response.toString();
      if(rep.includes("tous")){
        popup = document.getElementById("myPopup2");
        popup.classList.toggle("show");
      }
     else  if (rep.includes("identifiant")) {
        popup = document.getElementById("myPopup1");
        popup.classList.toggle("show");
      }
      if (rep.includes("Vous")){
        choix=true;
        enleverModal();
        $("#rechargement").load(" #rechargement");
      }
    }

  )
})

function closepopup(el){
  if(el.classList.contains("show")){
    el.classList.toggle("show");
  }
}

btn_co.addEventListener("blur",function(){
  popup = document.getElementById("myPopup2");
  closepopup(popup);
  popup = document.getElementById("myPopup1");
  closepopup(popup);
})

background.addEventListener("click", function() {enleverModal()},true);
fermeture.addEventListener("click", function() {enleverModal()},true);

function afficher(el){
  el.classList.add('show');
  el.classList.remove('hide');
}

function disparaitre(el){
  el.classList.add('hide');
  el.classList.remove('show');
}

function displayflex(el){
  el.style.display='flex';
}

function displaynone(el){
  el.style.display='none';
}
function displaynonetrans(el){
  el.style.visibility='hidden';
  //document.querySelector("#inputMail").style.visibility='hidden';
  setTimeout(function(){
    supprimertrans(el);
  },600)
}


function displayblocktrans(el){
  affichertrans(el);
  setTimeout(function(){
    el.style.visibility='visible';
  },600)

}
function displayblock(el){
  displaynone(document.querySelector("#div_proprio"));
  el.style.display='block';
}


function affichertrans(el){
  el.classList.remove("cacher");
  el.classList.add("montrer");
}
function supprimertrans(el){
  el.classList.add("cacher");
  el.classList.remove("montrer");
}

// =============================================================================================================================
function affichermodal(){
  displaynonetrans(Anonyme);
  document.querySelector("#inputMail").required = true;
  document.querySelector("#inputPassword1").required = true;
  document.querySelector("#anoNom").required = false;
  document.querySelector("#anoPrenom").required = false;
  document.querySelector("#anoMail").required = false;
  document.querySelector("#inputMail").style.borderColor = "";
  document.querySelector("#inputMail").style.borderWidth = "1px";
  document.querySelector("#inputPassword1").style.borderColor = "";
  document.querySelector("#inputPassword1").style.borderWidth = "1px";
  document.querySelector("#anoNom").value = "";
  document.querySelector("#anoPrenom").value = "";
  document.querySelector("#anoMail").value = "";
  displayflex(fond);
  setTimeout(function(){
    afficher(fond);
  },1000)

  //document.getElementById("inputMail").focus();
}

function enleverModal()
{
  disparaitre(fond);
  setTimeout(function(){
    displaynone(fond);
  },1000)
  document.querySelector("#inputMail").required = false;
  document.querySelector("#inputPassword1").required = false;
  document.querySelector("#inputMail").value = "";
  document.querySelector("#inputPassword1").value = "";
}
// =============================================================================================================================
// selection.style.borderWidth = "1px";
// selection.style.borderColor = "";

function anonyme() {
  if(choix==false){
    document.querySelector("#anoNom").style.borderColor = "";
    document.querySelector("#anoPrenom").style.borderColor = "";
    document.querySelector("#anoMail").style.borderColor = "";
    displayblocktrans(Anonyme);
    document.querySelector("#anoNom").required = true;
    document.querySelector("#anoPrenom").required = true;
    document.querySelector("#anoMail").required = true;
    choix=!choix;
    console.log(choix);
  }
  else{
    displaynonetrans(Anonyme);
    document.querySelector("#inputMail").required = true;
    document.querySelector("#inputPassword1").required = true;
    document.querySelector("#anoNom").required = false;
    document.querySelector("#anoPrenom").required = false;
    document.querySelector("#anoMail").required = false;
    document.querySelector("#inputMail").style.borderColor = "";
    document.querySelector("#inputMail").style.borderWidth = "1px";
    document.querySelector("#inputPassword1").style.borderColor = "";
    document.querySelector("#inputPassword1").style.borderWidth = "1px";
    document.querySelector("#anoNom").value = "";
    document.querySelector("#anoPrenom").value = "";
    document.querySelector("#anoMail").value = "";
    choix=!choix;
    console.log(choix);
  }



}

// =============================================================================================================================

function estproprio(){
  displaynonetrans(document.querySelector("#div_proprio"));
  document.getElementById("checkboxNonProprio").checked = false;
  document.querySelector("#NomProprio").required = false;
  document.querySelector("#PrenomProprio").required = false;
  document.querySelector("#MailProprio").required = false;
  document.querySelector("#NomProprio").required = false;
  document.querySelector("#PrenomProprio").required = false;
  document.querySelector("#MailProprio").required = false;
  document.querySelector("#TelephoneProprio").required = false;
  document.querySelector("#NomProprio").value = "";
  document.querySelector("#PrenomProprio").value = "";
  document.querySelector("#MailProprio").value = "";
  document.querySelector("#TelephoneProprio").value = "";
  document.querySelector("#NomProprio").style.borderColor = "";
  document.querySelector("#NomProprio").style.borderWidth = "1px";
  document.querySelector("#PrenomProprio").style.borderColor = "";
  document.querySelector("#PrenomProprio").style.borderWidth = "1px";
  document.querySelector("#MailProprio").style.borderColor = "";
  document.querySelector("#MailProprio").style.borderWidth = "1px";
  document.querySelector("#TelephoneProprio").style.borderColor = "";
  document.querySelector("#TelephoneProprio").style.borderWidth = "1px";


}

function estpasproprio(){
  displayblocktrans(document.querySelector("#div_proprio"));
  document.getElementById("checkboxProprio").checked = false;
  document.querySelector("#NomProprio").required = true;
  document.querySelector("#PrenomProprio").required = true;
  document.querySelector("#MailProprio").required = true;
  document.querySelector("#TelephoneProprio").required = true;

}
