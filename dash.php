<?php

// Init backend
require './init.php';

use App\Session;
use App\Model\Promotor;

Session::init();
$idPromotor = Session::getValue('idpromotor');

if(!$idPromotor){
    header("location:index.php");
}


$datosUsuario = Promotor::getDatosEnSession(); 
$alldata  = Promotor::select('*', $idPromotor);
 
//Ruta del archivo adjunto
$file = __DIR__.'/uploads/'.$alldata[0]["numero"].'/'.$alldata[0]["numero"].'-PDF.pdf';
$message  =  basename($file);
 


?>
 


 <!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>YO PROMOTOR</title>
        <script src="assets/js/jquery.js"></script>
        <link rel="stylesheet" href="assets/css/jquery.steps.css">

       
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">

        <link type="text/css" rel="stylesheet" href="assets/css/tail.select-light.css" />
        <link type="text/css" rel="stylesheet" href="assets/css/tail.select-teal.min.css" />

        <link rel="stylesheet" href="assets/css/main.css">

        <script src="https://kit.fontawesome.com/628f7b31c8.js" crossorigin="anonymous"></script>

        <link href="assets/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="assets/dist/js/datepicker.min.js"></script>
         
        <script src="assets/dist/js/i18n/datepicker.es.js"></script>
        <script src="assets/ubigeos.js"></script>
        <script src="assets/lenguaje.js"></script>

        <style>
            .row.header {
                background-color: white;
            }

            .custom-control-input:checked~.custom-control-label::before {
                color: #fff;
                border-color: #2b2d2f;
                background-color: #141415;
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

            img {
                max-width: 100%;
            }

            .card {
    padding: 17px;
    margin-top: 35px;
    border-style: dashed;
}

.download {
    font-size: 100px;
    text-align: center;
}
        </style>

    </head>

    <body>

        <div class="main">
            <div class="container-fluid">
                <div class="row header">
                    <div class="col-md-4 mt-3">
                        <img src="images/logo_minam_y_yopomotor.png">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <img src="images/logo_peru_primero.png">
                    </div>

                </div>

                <ul class="nav justify-content-end">
                    <li class="nav-item bg-light">
                    <a class="nav-link" href="descarga.php?archivo=<?php echo $message; ?>&numero=<?php echo $alldata[0]["numero"]; ?>" target="_blank">Descargar ficha de postulación</a>
                    </li>
                    <li class="nav-item bg-light">
                        <?php echo '<a class="nav-link" href="plogout.php">Cerrar sesión</a>';  ?> 
                    </li>
                </ul>


                <div class="row">
                    
                    <div class="col-md-8">
                            <div class="card mb-3" style="max-width: 1024px;">
                                    <div class="row no-gutters">
                                      <div class="col-md-9">
                                        <div  class="card-body">
                                          <h5 class="card-title">BIENVENIDO AL PROGRAMA DE VOLUNTARIADO</h5>
                                          <p class="card-text text-justify">
                                                Para completar el proceso de selección como Promotor Ambiental, te invitamos a descargar la carta de compromiso, El cual 
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                 text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has 
                                                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised
                                                 in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                                                 software like Aldus PageMaker including versions of Lorem Ipsum.
                                                
                                          </p>
                                          <p class="card-text"><small class="text-muted">yopromotor@minam.gob.pe</small></p>
                                        </div>
                                      </div>
                                      <div class="col-md-3 ">
                                            <div class="card-body text-center">
                                                <div class="card-text justify-content-center">
                                                  <i class="fas fa-cloud-download-alt download"></i> 
                                                  <p style="font-size: 0.8em; text-align: center;">Descarga tú Carta de compromiso</p> 
                                                </div>
                                            </div>
                                            
                                          </div>
                                    </div>
                            </div>
                            <div class="card mb-3" style="max-width: 1024px;">
                                    <div class="row no-gutters">
                                            <div class="col-md-9">
                                              <div  class="card-body">
                                                <h5 class="card-title"><?php echo $alldata[0]["nombres"]." ".$alldata[0]["apellidos"] ?>, Adjunta Tú Carta de Compromiso :</h5>
                                                <p class="card-text text-justify">
                                                      Para completar el proceso de selección como Promotor Ambiental, te invitamos a descargar la carta de compromiso, El cual 
                                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                      <form id="promotorSend">
                                                        <input type="hidden" name="numero" id="numero" value="<?php echo $alldata[0]["numero"] ?>" />
                                                        <input id="file_carta" name="file_carta" type="file" class="file" data-show-preview="false">
                                                        <button type="button" class="btn btn-dark" id="cartaSend">Enviar</button>
                                                      </form> 
                                                </p>
                                                <p class="card-text"><small class="text-muted">yopromotor@minam.gob.pe</small></p>
                                              </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                  <div class="card-body text-center">
                                                      <div class="card-text justify-content-center" id="check" hidden>
                                                        <i class="fas fa-check fa-9x"></i>
                                                        <p style="font-size: 0.8em; text-align: center;">Listo</p> 
                                                      </div>
                                                  </div>
      
                                                  
                                                </div>
                                          </div>
                                  </div>
                        
                    </div>
                    <div class="col-md-4">

                        <div id="carouselExampleControls" class="carousel slide  " data-ride="carousel">
                            <div class="carousel-inner" style="height: 69.5rem;">
                                <div class="carousel-item active">
                                    <img src="images/banner02_responsive.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/promotor.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/promotoress.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
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

        <script type="text/javascript" src="assets/js/tail.select-full.js"></script>


        <script src="assets/js/main.js"></script>

        <script src="assets/js/jquery.steps.js"></script>
        <script src="assets/js/jquery.validate.js"></script>

       
        <script src="assets/appupdate.js"></script>
        
       



    </body>

</html>