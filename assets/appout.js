 

function LimitAttach(tField, iType) {
    file = tField.value;
    if (iType == 1) {
        extArray = new Array(".jpg",".jpeg",".png");
    }
    allowSubmit = false;
    if (!file) return false;
    while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
    ext = file.slice(file.indexOf(".")).toLowerCase();
    for (var i = 0; i < extArray.length; i++) {
        if (extArray[i] == ext) {
            allowSubmit = true;
            break;
        }
    }
    if (allowSubmit) {
        return true
    } else {
        tField.value = "";
        alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n con un peso maximo de 8 MB");
        return false;
        setTimeout("location.reload()", 2000);
    }
}
 

function LimitAttachDoc(tField, iType) {
    file = tField.value;
    if (iType == 1) {
        extArray = new Array(".jpg", ".doc", ".docx", ".pdf", ".png", ".jpeg");
    }
    allowSubmit = false;
    if (!file) return false;
    while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
    ext = file.slice(file.indexOf(".")).toLowerCase();
    for (var i = 0; i < extArray.length; i++) {
        if (extArray[i] == ext) {
            allowSubmit = true;
            break;
        }
    }
    if (allowSubmit) {
        return true
    } else {
        tField.value = "";
        alert("Sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n ");
        return false;
        setTimeout("location.reload()", 2000);
    }
}

 
function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if ((campo.match(RegExPattern)) && (campo!='')) {
          return true;
    } else {
          return false;
    }
}

function existeFecha(fecha){
    var fechaf = fecha.split("/");
    var day = fechaf[0];
    var month = fechaf[1];
    var year = fechaf[2];
    var date = new Date(year,month,'0');
    if((day-0)>(date.getDate()-0)){
          return false;
    }
     
    return true;
}

function validarFechaMenorActual(date){
      var x=new Date();
      var fecha = date.split("/");
      x.setFullYear(fecha[0],fecha[1]-1,fecha[2]);
      var today = new Date();
 
      if (x >= today)
        return false;
      else
        return true;
}
 

$(document).ready(function () {

     $('.toast').toast();
    
     tail.select("#listLenguaje", {
        search: true,
        descriptions: true, 
        multiLimit: 47,
        hideSelected: true,
        hideDisabled: true,
        multiShowCount: false,
        multiContainer: '.move',
        
    });



    $("#eldate").change(function (e) {
        var fecha = $("#eldate").val();
        if(validarFormatoFecha(fecha)){
            if(existeFecha(fecha)){
                
                    
            }else{
                    alert("La fecha introducida no existe.");
                    $("#eldate").val("");
            }
        }else{
                alert("El formato de la fecha es incorrecto.");
                $("#eldate").val("");
        }
    });

    
    //datepicker
    // Initialization
    $('#eldate').datepicker({
        language: 'es',
        maxDate: new Date(2001, 11, 31, 0, 0, 0, 0)

    });
    // Access instance of plugin
    $('#eldate').data('datepicker')
    //end datepicker


    $("#file_foto").change(function (e) {


        //alert("NOMBRE DE ARCHIVO : "+$('#file_foto').val());
        var image, file;

        if ((file = this.files[0])) {

            var sizeByte = this.files[0].size;
            var sizekiloBytes = parseInt(sizeByte / 1024);

            if (sizekiloBytes > $('#file_foto').attr('size')) {
                alert('El tamaño supera el limite permitido!');
                $('#file_foto').val('');

            } else {

                LimitAttach(this, 1);

            }

        }

    });

    $("#file_sustento").change(function (e) {
        LimitAttachDoc(this, 1);
    });

    $("#file_servicio").change(function (e) {
        LimitAttachDoc(this, 1);
    });


    $("#file_cv").change(function (e) {
        LimitAttachDoc(this, 1);
    });


   /*  $("#certifico").click(function () {
        if ($(this).is(":checked")) {

            $("#certifico").attr('value', 'si');
            $(".botom1").css("pointer-events","");
            $("#alert-cetifico").attr('hidden', 'true');
              
        } else {
            
            $("#certifico").attr('value', 'no');
            $(".botom1").removeAttr('style');
            
        }
    }); */

    /* $(".botom1").hover(function (e) {
        var url = $(this).attr('href');
        if(url == "#finish"){
             
            if(!$("#certifico").is(":checked")){
                
                $("#alert-cetifico").removeAttr('hidden');
                $(".botom1").css("pointer-events","none");
            }
            
        }
        
    }); */

    $('#alert-cetifico').alert();

    

    $("#segurosi").change(function (e) {
        
        if ($('input:radio[name=seguro]:checked').val() == "si") {
            $("#div_list_tiposeguro").removeAttr('hidden');
        }
    });

    $("#segurono").change(function (e) {
        if ($('input:radio[name=seguro]:checked').val() == "no") {
            $("#div_list_tiposeguro").attr('hidden', 'true');
        }
    });

    $("#discapacidadsi").change(function (e) {
        
        if ($('input:radio[name=discapacidad]:checked').val() == "si") {
            $("#div_listdiscapacidad").removeAttr('hidden');
        }
    });

    $("#discapacidadno").change(function (e) {
        if ($('input:radio[name=discapacidad]:checked').val() == "no") {
            $("#div_listdiscapacidad").attr('hidden', 'true');
        }
    });

     
    $("#list_tipodocumento").change(function (e) {
        if ($('#list_tipodocumento').val() == "DNI") {
            $("#txt_numerodocumento").attr('maxlength', '8');
            $("#txt_numerodocumento").attr('minlength', '8');

        } else {
            $("#txt_numerodocumento").attr('maxlength', '9');
            $("#txt_numerodocumento").attr('minlength', '9');

        }
    });

   /*  $(".dropdown-option").click(function (){ 
       if($(this).attr('data-key') == 'Ninguno'){
            //
       } 
    }); */

    

    

    $("#btncheck").on("click",function(){
        if($("#mySelect")[0].selectedIndex <= 0){
            alert("No Option Selected")
        } else {
            alert("Option Selected")
        }
    });

    var strin;

    $("#enviarregistro").click( function() { 
        
        var matrizzz = ($("#listLenguaje").val().length);

        if (matrizzz == "0") {
            alert("en selectx no hay nada");
            console.log("en selectx no hay nada :"+$("#listLenguaje").val().length);
            strin = "Ninguno";
        }else{
            console.log("en selectx si hay algo : "+$("#listLenguaje").val().length);
            var selectx = $("#listLenguaje").val();
             
            for(var i=0;i<selectx.length;i++){
                
                if(i==0){
                    strin = selectx[i];
                }else{
                    strin = selectx[i]+", "+strin;
                }

            }
        }
        
        $('#leguajescod').val(strin);
 
        var formData = new FormData(document.getElementById("myform"));
         
        $.ajax({
            url: "postulacion.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                 
                $("#enviarregistro").attr("disabled","false");
                $("#enviarregistro").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
            },
            success: function (data) {
                 
                if (data == '1') {
                    $("#mensajeok").html("<div class='alert alert-success '><strong>Datos enviados</strong> Por Favor revise su Correo electrónico.</div>");
                    setTimeout(function () { $(location).attr('href', 'index.php') }, 5000);


                } else if (data == '4') {
                     
                    $("#enviarregistro").attr("disabled","true");
                    $("#mensajeok").html("<div class='alert  alert-warning'><strong>¡Error!</strong> Verfique su direccion de correo electronico.</div>");
                    $("#enviarregistro").html(" enviar ");

                } else if (data == '5') {
                     
                    $("#enviarregistro").attr("disabled","true");
                    $("#mensajeok").html("<div class='alert  alert-warning'><strong>¡Error!</strong> Su numero de documento ya fue registrado.</div>");
                    $("#enviarregistro").html(" enviar "); 
                }else if (data == '6') {
                     
                    $("#enviarregistro").attr("disabled","true");
                    $("#mensajeok").html("<div class='alert  alert-warning'><strong>¡Error!</strong> Debes ser mayor de 18 años.</div>");
                    $("#enviarregistro").html(" enviar "); 
                } else if (data == '7') {
                     
                    $("#enviarregistro").attr("disabled","true");
                    $("#mensajeok").html("<div class='alert  alert-warning'><strong>Estimado/a Promotor/a</strong> ,Usted ya formó parte del Programa Voluntariado 'Yo Promotor Ambiental'. Cordialmente. Ministerio del Ambiente.</div>");
                    $("#enviarregistro").html(" enviar "); 
                } else {
                     
                    $("#enviarregistro").attr("disabled","true");
                    $("#mensajeok").html("<div class='alert  alert-danger'><strong>¡Error!</strong> Hubo un problema al enviar sus datos, porfavor verfique los campos requeridos.</div>");
                    $("#enviarregistro").html(" enviar ");
                }
            },


        })
 
    });
     
});

var form = $("#myform");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        c_email: {
            equalTo: "#txt_email"
        },
        txt_numerodocumento: {

        },
        eldate: {
            required: true,
             
        }

    }
});

        

form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
             
            
            $("#enviarregistro").removeAttr("disabled");
            $("#enviarregistro").html(" enviar ")
            $("#mensajeok").html("");
            $('#exampleModal').modal();
    }
});

 

$('.custom-file-input').on('change', function (event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
});

$(function () {
    $('[data-toggle="popover"]').popover({
        placement: "bottom",
        trigger: "hover"
    })
})