$(document).ready(function() {
  $("body").append('<div id="Grey_Filter" class="Grey_Filter" style="display:none"></div>')
  $("body").append('<div id="pop_up" style="display:none"></div>')
  $("#pop_up").append('<p id="pop_up_msg">Useless Text</p>')
});

function open_pop_up(content){
  $("#pop_up").html("<p class='pop_up_msg'>"+content+"</p>");
  $("#Grey_Filter").css("display","block");
    var pop_up = $("#pop_up").dialog({
    dialogClass: "no-close pop_up",
    title:"/!\\ Erreur /!\\",
    buttons: [
      {
        text: "Compris !",
        class:"pop_up-btn",
        click: function() {
          $(pop_up).dialog('close');
          $("#Grey_Filter").css("display","none");
        }
      }
    ],
    modal:true,
    draggable:false,
    closeOnEscape:true
  });
}
