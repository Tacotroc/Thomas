function closeImg(element) {
  let cross = document.getElementById("selectImg3");
  cross.setAttribute("src", "../Image/selectImg.png");
  element.style.display = "none";
}

function closeImg2(element) {
  let cross = document.getElementById("selectImg2");
  cross.setAttribute("src", "../Image/selectImg.png");
  element.style.display = "none";
}

function closeImg3(element) {
  let cross = document.getElementById("selectImg");
  cross.setAttribute("src", "../Image/selectImg.png");
  element.style.display = "none";
}

var form = document.getElementById("form");
form.addEventListener("blur", function() {surligne(event.target)},true);
function surligne(selection)
{
  if(selection.type!="submit"){
    if(selection.value=="" && !selection.classList.contains("facultatif")){
      selection.style.borderColor = "#DC143C";
      selection.style.borderWidth = "1.5px";
    }
    else{
      selection.style.borderWidth = "1px";
      selection.style.borderColor = "";
    }
  }
}
form.addEventListener("focus", function(){grosse_bordure(event.target)},true);
function grosse_bordure(selection){
  if(selection.type!="submit" && selection.type !="button")
  {
    selection.style.borderWidth = "1.5px";
  }
}
