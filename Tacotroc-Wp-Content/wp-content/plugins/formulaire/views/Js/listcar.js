
var tab_id = [];
var tab_immat= [];
var tab_marque=[];
var tab_model=[];
var tab_pays=[];
var tab_color=[];
var tab_version=[];
var tab_type=[];
var tab_cylindre=[];
var tab_annee=[];
var tab_owner=[];
var tab_musee=[];
var tab_club=[];
var tab_user=[];
var tab_serie=[];
var  tempo=[];
window.json =null;


function suppresionCar2(element){
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
        element.parentElement.parentElement.parentElement.parentElement.removeChild(element.parentElement.parentElement.parentElement);

        chargement();



      }
    )
  }
}
chargement();

function chargement(){
  tab_id = [];
  tab_immat= [];
  tab_marque=[];
  tab_model=[];
  tab_pays=[];
  tab_color=[];
  tab_version=[];
  tab_type=[];
  tab_cylindre=[];
  tab_annee=[];
  tab_owner=[];
  tab_musee=[];
  tab_club=[];
  tab_user=[];
  tab_serie=[];
  tempo=[];

  window.json =null;
  $.post(
    ajaxurl,
    {
      "action":"getAll",
    },
    function(response){
      window.json = JSON.parse(response);
      AllTabs();
      $('#myImmat').autocomplete({source:tab_immat});
      $('#years').autocomplete({source:tab_annee});
      $('#color1').autocomplete({source:tab_color});
      $('#color2').autocomplete({source:tab_color});
      $('#myBrand').autocomplete({source:tab_marque});
      $('#myModel').autocomplete({source:tab_model});
      $('#myVersion').autocomplete({source:tab_version});
      $('#myType').autocomplete({source:tab_type});
      $('#myOwner').autocomplete({source:tab_owner});
      $('#myUser').autocomplete({source:tab_user});
      $('#myClub').autocomplete({source:tab_club});
      $('#myMusee').autocomplete({source:tab_musee});
      $('#myCountry').autocomplete({source:tab_pays});
      $('#cylindre').autocomplete({source:tab_cylindre});
      $('#mySerie').autocomplete({source:tab_serie});


    }
  )
}

function rbdd(){

  $.post(
    ajaxurl,
    {
      "action":"remplissageBDD",
    },
    function(response){
      rep = JSON.parse(response);
      str="INSERT INTO rel_car_color(id, id_twp_Color) VALUES (";
      str1=",NULL);";
      envoie=""
      rep.forEach(function(el){
        envoie+=str+el.id+str1;
      })
      console.log(envoie);

    }
  )
}



function AllTabs(){
  $.each(window.json, function(key, item){
    if(key=="ID"){
      tab_id = item;
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Immatriculate"){
      item.forEach(function(el){
        tab_immat.push(el.Name);
      })

    }
  })
  $.each(window.json, function(key, item){
    if(key=="Marque"){
      item.forEach(function(el){
        tab_marque.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Model"){
      item.forEach(function(el){
        tab_model.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Couleur"){
      item.forEach(function(el){
        tab_color.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Pays"){
      item.forEach(function(el){
        tab_pays.push(el.Name);
      })

    }
  })
  $.each(window.json, function(key, item){
    if(key=="Version"){
      item.forEach(function(el){
        tab_version.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Serie"){
      item.forEach(function(el){
        tab_serie.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Type"){
      item.forEach(function(el){
        tab_type.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Cylindrée"){
      item.forEach(function(el){
        tab_cylindre.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Cars"){
      item.forEach(function(el){
        tab_annee.push(el.Years);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Propriétaire"){
      item.forEach(function(el){
        tab_owner.push(el.Name);
      })

    }
  })
  $.each(window.json, function(key, item){
    if(key=="Utilisateur"){
      item.forEach(function(el){
        tab_user.push(el.value);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Musée"){
      item.forEach(function(el){
        tab_musee.push(el.Name);
      })
    }
  })
  $.each(window.json, function(key, item){
    if(key=="Club"){
      item.forEach(function(el){
        tab_club.push(el.Name);
      })
    }
  })
}


function filtrage2(){
  $.post(ajaxurl,
    {"action":"filtrage",
    "filter" : $("#myImmat").val(),
    "filter2":$("#years").val(),
    "filter3":$("#myUser").val(),
    "filter4":$("#color1").val(),
    "filter5":$("#color2").val(),
    "filter6":$("#myBrand").val(),
    "filter7":$("#myModel").val(),
    "filter8":$("#myVersion").val(),
    "filter9":$("#myType").val(),
    "filter10":$("#cylindre").val(),
    "filter11":$("#mySerie").val(),
    "filter12":$("#myOwner").val(),
    "filter13":$("#myCountry").val(),
    "filter14":$("#myMusee").val(),
    "filter15":$("#myClub").val(),
  },function(response){
    rep=JSON.parse(response);

    $("#idtable").empty();
    $("#idtable").append(
      "<thead class="+    "thead-dark"+    "><tr><th scope="+    "col"+    ">Immatriculation</th><th scope="+    "col"+
      ">Commentaire</th><th scope="    +"col"    +">Restoration</th><th scope="+    "col"+    ">User</th><th scope="+"col"+">Année</th><th scope="+
      "col"+    ">Couleur1</th><th scope="+    "col"+    ">Couleur2</th><th scope="+    "col"+    ">Marque</th><th scope="+    "col"+
      ">Modéle</th><th scope="+    "col"+    ">Version</th><th scope="+    "col"+    ">Type</th><th scope="+    "col"+    ">Cylindrée</th><th scope="+
      "col"+    ">Serie</th><th scope="+    "col"+    ">Propriétaire</th><th scope="+    "col"+    ">Pays</th><th scope="+    "col"+    ">Musée</th><th scope="+
      "col"+    ">Club</th><th scope="+    "col"+    ">Action</th>    </tr>");
      console.log(rep.length);
      if(rep.length>50){alert("trop de resutat pour votre recherche , veuillez affiner votre recherche");}
      else{
        rep.forEach((function(el){
          $.post(
            ajaxurl,
            {
              "action":"recupInfoCar",
              "id":el.id,
              "user":el.id_twp_User,
              "model":el.id_twp_Model,
              "version":el.id_twp_Version,
              "type":el.id_twp_Type,
              "cylindre":el.id_twp_Cylinder,
              "serie":el.id_twp_Serie,
              "owner":el.id_twp_Owner,
              "musee":el.id_twp_Museum,
              "club":el.id_twp_Club,
              "pays":el.id_twp_Country
            },
            function(response){
              $("#rechargement").load(" #rechargement");
              rep2=JSON.parse(response);
              rep1=rep2[0];
              rep12=rep2[1];
              var str="";
              str+="<tbody><tr><td>"+rep1.Immatriculation+"</td><td>";
              if(rep1.Comment){str+=rep1.Comment;}
              str+="</td><td>"+rep1.Restoration+"</td><td>";

              if(el.id_twp_User!=null && el.id_twp_User!=0  )
              {str+="<p><strong>Nom :</strong>"+rep1.Last_Name+" </p><p><strong>Prenom: </strong> "+rep1.First_Name+"</p><?php endif; ?><p><strong>Phone : </strong>"+rep1.Phone;}
              str+="</td><td>"+rep1.Years;
              str+="</td><td> <p>";if(rep1.id_twp_Color){str+=rep1.id_twp_Color;}str+=" </p></td><td><p>";
              if(rep12){str+=rep12.id_twp_Color;}str+=" </p> </td><td>";
              if(rep1.Brand){str+=rep1.Brand;}
              str+="</td><td>";if(rep1.Model){str+=rep1.Model;}
              str+="</td><td> ";if(rep1.Version){str+=rep1.Version;}
              str+="</td> <td>";if(rep1.Type){str+=rep1.Type;}
              str+="</td><td> ";if(rep1.Cylinder){str+=rep1.Cylinder;}
              str+="</td><td>";if(rep1.Serie){str+=rep1.Serie}
              str+= "</td><td>";if(el.id_twp_Owner!=null && el.id_twp_Owner!=0  )
              {str+="<p><strong>Nom :</strong>"+rep1.nom+" </p><p><strong>Prenom: </strong> "+rep1.prenom+"</p><?php endif; ?><p><strong>Phone : </strong>"+rep1.tel;}
              str+="</td> <td>";if(rep1.Country){str+=rep1.Country;}
              str+="</td><td>";if(rep1.Museum){str+=rep1.Museum;}
              str+="</td><td>";if(rep1.Club){str+=rep1.Club;}
              str+="</td><td><div name='"+rep1.id+"'> <input type='button' class='btn btn-danger' value='Supprimer' name='"+rep1.id+"' onclick='suppresionCar2(this)'></div></td></tr></tbody>";
              $("#idtable").append(str);
            }
          )






        })

      )}
    })
  }
