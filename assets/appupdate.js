var aprobarTpl = `Aprobado`;
var aprobarTp2 = `Descartado`;
var aprobarTp3 = `Pendiente`;
$("#enviarSearch").click( function() { 

   
    var formData = new FormData(document.getElementById("searchform"));
     
    $.ajax({
        url: "search.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
             
            $("#enviarSearch").attr("disabled","false");
            $("#enviarSearch").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
        },
        success: function (data) {
              
        },


    })

});

var correo = [];

$(".chekedPostulante").click(function () {
    if ($(this).is(":checked")) {   
        correo.push($(this).val());
        console.log($(this).val());
    } else {
         
        var i = correo.indexOf( $(this).val() );
        correo.splice( i, 1 );
          
    }
});
 

/* document.getElementById('submitExport').addEventListener('click', function(e) {
    e.preventDefault();
    let export_to_excel = document.getElementById('promotores');
    let data_to_send = document.getElementById('data_to_send');
    data_to_send.value = export_to_excel.outerHTML;
    document.getElementById('formExport').submit();
}); */

$(".btnDescartar").click(function () {
 
    var id = $(this).attr('id'); 
    var identificadorx = String("#record-"+id);
    $(identificadorx).removeClass("yellow");
    $(identificadorx).removeClass("green");

    $.get( "processDescartar.php", { id: id, estado: "0" },
        function( data ) {
        console.log(data);
        var cellNode= document.getElementById('status-cell-'+ id);
        $(identificadorx).addClass("red");
        if(cellNode){            
            cellNode.innerHTML = aprobarTp2;            
        }
      }); 

}); 

$(".btnAprobar").click(function () {
 
    var id = $(this).attr('id');   
    var identificadorx = String("#record-"+id);
    
    $.get( "processDescartar.php", { id: id, estado: "2" },
        function( data ) {
        console.log(data);
        var cellNode= document.getElementById('status-cell-'+ id);
        
        $(identificadorx).addClass("green");
        if(cellNode){            
            cellNode.innerHTML = aprobarTpl;            
        }
      }); 

}); 

$(".btnPendiente").click(function () {
 
    var id = $(this).attr('id');   
    var identificadorx = String("#record-"+id);
    $(identificadorx).removeClass("green");
    
    $.get( "processDescartar.php", { id: id, estado: "1" },
        function( data ) {
        console.log(data);
        var cellNode= document.getElementById('status-cell-'+ id);
        
        $(identificadorx).addClass("yellow");
        if(cellNode){            
            cellNode.innerHTML = aprobarTp3;            
        }
      }); 

}); 

$(document).ready(function(){
    /* $("#record-id_32423423").click(function () {
        $('#exampleModal').modal();
    }); */

   /*  $("tr").click(function () {
        var textid = $(this).attr("id");
        var idonly = textid.substr(10,11); 
        

        $('#exampleModal').modal();
        $("#idseleccion").html(idonly);
        // alert($(this).attr("id"));
    }); */
});