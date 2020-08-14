<?php

// Init backend
require './init.php';

use App\Session;
use App\Model\User;

Session::init();
$idUser = Session::getValue('correo');
 
if(!$idUser){    
    header("location: ../consultar.php");
}
 
 
//Ruta del archivo adjunto
$file = __DIR__.'/uploads/'.$alldata[0]["numero"].'/'.$alldata[0]["numero"].'-PDF.pdf';
$message  =  basename($file);


$datosUsuario = User::getDatosEnSession(); 
$alldata  = User::selectall('*');
//print_r($alldata); 

include('function.php');
?>
 


<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>YO PROMOTOR - Consulta</title>
        <script src="../assets/js/jquery.js"></script>
        <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet"/>
        <!--<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
        <script src="../assets/js/jquery.dataTables.min.js"></script>
         
        <link rel="stylesheet" href="../assets/css/jquery.steps.css">
 
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-reboot.min.css">

        <link rel="stylesheet" href="../assets/css/main.css">

        <script src="https://kit.fontawesome.com/628f7b31c8.js" crossorigin="anonymous"></script>

        <link href="../assets/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="../assets/dist/js/datepicker.min.js"></script>
       
        <script src="../assets/dist/js/i18n/datepicker.es.js"></script>
 
        
        <style>
            body {
                background: #ffffff;
            }

            .row.header {
                background-color: white;
            }

         
            .custom-control-input:checked~.custom-control-label::before {
                color: #fff;
                border-color: #2b2d2f;
                background-color: #eac40d;
            }

            .background_div {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: #343535;
                z-index: 4;
                visibility: hidden;
                opacity: 0.6;

            }
            
            table .red {
                background-color:#e79797;
            }
            
            table .yellow {
                background-color:#ebe3a9;
            }
            
            table .green {
                background-color:#98e598;
            }
  
            #charg {
                position: fixed;
                top: 50%;
                left: 50%;
                height: 30%;
                width: 50%;
                margin: -15% 0 0 -25%;

            }

            ::-webkit-input-placeholder {
                color: #fff !important;
            }

            *::-moz-selection {
                background: #fff;
                color: #00BDFE;
            }

            *::selection {
                background: #fff;
                color: #00BDFE;
            }
            img{
			max-width: 100%;
            }
            
            input[type=checkbox] {
                transform: scale(1.5);
            }

        </style>

    </head>

    <body>
        <div class="main" id="app">
            
            <div class="container-fluid">

                <div class="row header">
                    <div class="col-md-4 mt-3">
                        <img src="../images/logo_minam_y_yopomotor.png">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <img src="../images/logo_peru_primero.png">
                    </div>

                </div>

                <div class="background_div">
                    <div id="charg">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-light" role="status" id="loadingspinner">
                                <span class="sr-only">Loading...</span>
                            </div>

                            <div class="card" id="datosenviados" style="color: white;background-color: #0CB628;border-color: #121713;" hidden>
                                <div class="card-body">
                                    <strong>Respuesta:</strong> Datos actualizados.
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <br/><br/>
                <div class="container">

                <div class="row">
                   
                   <div class="col-md">
                        <div class="card">
                            <div class="card-body">

                                <ul class="nav justify-content-center">
                                    <li class="nav-item pr-1"> 
                                        <button type="button" class="nav-link active btn btn-danger" >Rojo : Descartado<b>(D)</b></button>
                                    </li>
                                    <li class="nav-item pr-1">
                                        <button type="button" class="nav-link active btn btn-warning text-white">Amarillo: Pendiente<b>(P)</b></button>
                                    </li>
                                    <li class="nav-item pr-1">
                                        <button type="button" class="nav-link active btn btn-success" >Verde: Aprobado<b>(A)</b></button>
                                    </li>
                                    <li class="nav-item pr-1">
                                        <button type="button" class="nav-link active btn btn-info" id="submitExport"  ><b>Descargar</b></button>
                                    </li> 
                                    <form action="descargarexcel.php" method="post" target="_blank" id="formExport">
                                        <input type="hidden" id="data_to_send" name="data_to_send" />
                                    </form>
                                    <li class="nav-item pr-1">
                                        <?php echo '<a class="nav-link active btn btn-dark" href="../plogout.php">Cerrar sesión</a>';  ?>
                                    </li>
                                   
                                    
                                </ul> 
                            </div>
                        </div>
                         

                   </div>
                     
               </div>

                </div>
                <div class="row">
                    <div class="col-md" id="mytable">
                        <table class="table table-bordered table-light border-dark table-hover table-sm" id="promotores" lang="es">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nombres</th>
                                    <th scope="col">apellidos</th>
                                    <th scope="col">sexo</th>
                                    <th scope="col">tdocumento</th>
                                    <th scope="col">numero</th>
                                    <th scope="col">fecha</th>
                                    <th scope="col">edad</th>
                                    
                                    <th scope="col">departamento</th>
                                    <th scope="col">provincia</th>
                                    <th scope="col">distrito</th>
                                    <th scope="col">direccion</th>
                                    <th scope="col">celular</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">email</th>
                                    
                                    <th scope="col">carrera</th>
                                    <th scope="col">enlace</th>
                                    <th scope="col">E</th>                                     
                                  
                                    <th scope="col">
                                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody><!--<td><a  target='_blank' href='".'../uploads/'.$row["numero"]."'>".$row["numero"]."</a></td>-->
                                    <!--- <td>".$row["numero"]."</td> --->
                                <?php
                                    for($i=0; $i<= count($alldata)-1 ; $i++){
                                        $row = $alldata[$i];
                                        echo "<tr id='record-".$row["idpromotor"]."'  class=";
                                            colorEstado($row["estado"]);                                          

                                        echo " >
                                                <th scope='row'>".($i+1)."</th>
                                                <td>".$row["nombres"]."</td>
                                                <td>".$row["apellidos"]."</td>
                                                <td>".$row["sexo"]."</td>
                                                <td>".$row["tdocumento"]."</td> 
                                                <td>".$row["numero"]."</td> 
                                                
                                                <td>".$row["fecha"]."</td>
                                                <td>".$row["edad"]."</td>
                                                
                                                <td>".$row["departamento"]."</td>
                                                <td>".$row["provincia"]."</td>
                                                <td>".$row["distrito"]."</td>
                                                <td>".$row["direccion"]."</td>
                                                <td>".$row["celular"]."</td>
                                                <td>".$row["telefono"]."</td>
                                                <td>".$row["email"]."</td>
                                                
                                                <td>".$row["carrera"]."</td>
                                                <td>".$row["enlace"]."</td>

                                                <td id='status-cell-".$row["idpromotor"]."'>";
                                                    nombreEstado($row["estado"]); 
                                                echo "</td>
                                                
                                                <td style='width: 140px;'>  
                                                    <button type='button' class='btn btn-danger btnDescartar' id='".$row["idpromotor"]."' ><i class='fas fa-user-slash'></i></button>    
                                                    <button type='button' class='btn btn-warning btnPendiente' id='".$row["idpromotor"]."'><i class='fas fa-question'></i></button>
                                                    <button type='button' class='btn btn-success btnAprobar' id='".$row["idpromotor"]."' ><i class='fas fa-check'></i></button>    

                                                </td>
                                                
                                            </tr>";

                                    }
                                    ?>
                                    
                            </tbody>
                        </table>
                    </div>
                </div>

               
            </div>
    
        </div>

        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


        <script src="../assets/js/main.js"></script>

        <script src="../assets/js/jquery.steps.js"></script>
        <script src="../assets/js/jquery.validate.js"></script>
 
        <script src="../assets/appupdate.js"></script>

        
        
        <script>
            $(document).ready(function() {
                $('#promotores').DataTable();
            });
        </script>

    </body>

</html>


 
                    

              