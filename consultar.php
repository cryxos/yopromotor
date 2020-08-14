
<?php

// Init backend
require './init.php';

use App\Session;

Session::init();
$idUser = Session::getValue('id');
if($idUser){
  header("location: zadmin/admon.php");
}

?>
 

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YO PROMOTOR-C</title>
	
    <link rel="stylesheet" href="assets/css/jquery.steps.css">
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/jquery.steps.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
     <style>
     
        body{
            background: #ffffff;
            font-size:14px;
            color:black !important;
        }
        .simple-login-container{
            width:300px;
            max-width:100%;
            margin:50px auto;
        }
        .simple-login-container h2{
            text-align:center;
            font-size:20px;
        }
        #formFooter {
        background-color: #f6f6f6;
        border-top: 1px solid #dce8f1;
        padding: 25px;
        text-align: center;
        -webkit-border-radius: 0 0 10px 10px;
        border-radius: 0 0 10px 10px;
        }
        

        .form-controlx {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            color: #000000 !important;
            font-size: 1rem;
            line-height: 1.5;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .simple-login-container .btn-login{
            background-color:#FF5964;
            color:#fff;
        }

        #logreg-forms {
            width: 412px;
            margin: 10vh auto;
            background-color: #f3f3f3;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            padding: 20px;
            border:0px;
            border-radius: 10px;
                -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            /* box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3); */
        }
        a#olvido {
        
            color: #black;
            text-decoration: none;
            background-color: transparent;
        }

        ::-webkit-input-placeholder {
            color: #000000 !important;
        }

        *::-moz-selection {
            background: #fff;
            color: #00BDFE;
        }

        *::selection {
            background: #fff;
            color: #00BDFE;
        }


        .row.header {
            background-color: white;
        }

    </style>
</head>

<body>

    <div class="main">
        <div class="container-fluid">
            <div class="row header">
               
            </div>
        

            <div id="logreg-forms" class="main">
                                    
                <div class="col text-center">
                    <img src="images/logo.jpg" class="img-fluid" alt="Responsive image">
                </div>
                    <form id="formulario" method="post">
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <input type="email" class="form-controlx email" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Tu Email" title="Ingrese un email válido">
                            </div>
                           
                        </div>
                        <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-controlx"  id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-8 pl-5">
                            
                            </div>
                            <div class="col-md-4 pl-5">
                            <a class="registrarse" href="registro.html" role="button">Registrarse</a>
                            </div>
                        </div>
                        
                        
                        <div class="form-row group ">
                        
                        <div class="col-md-12 pt-2">
                            
                            <input type="button" name="login"  id="login" value="Ingresar" class="btn btn-success" />
                        
                        </div>
                    
                        <div id="result" ></div>
                    </form>
                </div>
                <div id="form-group row formFooter">
                    
                </div>
            </div>
        </div>
    </div>


    
    <script src="assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    
    <script src="assets/js/main.js"></script>
    
    <script src="assets/js/jquery.steps.js"></script>
    <script src="assets/js/jquery.validate.js"></script>




    <script type="text/javascript">

        
        $(document).ready(function () {
  
            var form = $("#formulario");
            form.validate({
                errorPlacement: function errorPlacement(error, element) { element.before(error); },
                
            });

           $('#login').click(function(){
             
               var correo = $('#correo').val();
               var password = $('#password').val();
               if($.trim(correo).length > 0 && $.trim(password).length > 0){
                   $.ajax({
                        url:"ploginprocess_consultar.php",
                        method: "POST",
                        data:{correo:correo, password:password},
                        cache: "false",
                        beforeSend:function(){
                            $('#login').val("conectando ....");
                        },
                        success:function(data){
                            $('#login').val("login");
                            if( data == '1' ){
                                
                                $(location).attr('href', 'zadmin/admon.php');
                                 
                            } else {
                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'> &times; </button><strong>¡Error!</strong> las credenciales son incorrectas.</div> ");
                            }
                        }
                   });
               };
           }) ;
        });

 
    </script>
</body>

</html>