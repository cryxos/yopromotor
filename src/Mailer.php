<?php
namespace App;

class Mailer{

    public static function enviarCorreoConfirmacion( $nombre, $apellido , $numero , $email, $password){
        
        //Recipiente
$to = $email;

//remitente del correo
$from = 'registro@yopromotor.analyticsperu.com';
$fromName = 'YoPromotor';

//Asunto del email
$subject = 'Detalle de registro - YOPROMOTOR
'; 

//Ruta del archivo adjunto
$file = __DIR__.'/../'.'/uploads/'.$numero.'/'.$numero.'-PDF.pdf';
Logger::addInfo("La ruta del archivo es : $file");

//Contenido del Email
$htmlContent = '<!DOCTYPE html>
    <html lang="es">
            
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <style type="text/css">
            tr {
                font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0;
            }
            td {
                font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;
            }
            .tdstyle {
                font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;box-sizing:border-box;
            }
            .tamañodeletra {
                font-size:14px;
            }
            .verticalalingtop{
                vertical-align:top;
            }
            .margin {
                margin:0;
            }
            .class1{
                display:block!important;max-width:600px!important;clear:both!important;width:100%!important;margin:0 auto;padding:0;
            }
            .class2{
                max-width:600px;display:block;margin:0 auto;padding:0;
            }
            .class3{
                border-radius:3px;background-color:#fff;border:1px solid #e9e9e9;
            }
            .class4{
                font-size:16px;color:#fff;font-weight:500;text-align:center;border-radius:3px 3px 0 0;background-color:#2389e1;padding:20px;
            }
            .class5{
                text-align:center; padding:0 0 20px;
            }
            .class6{
                color:#fff;text-decoration:none;line-height:2em;font-weight:bold;text-align:center;display:inline-block;border-radius:5px;background-color:#348eda; border-color:#348eda;border-style:solid;border-width:10px 20px;
            }
            .class7{
                padding:20px;
            }
            .class8{
                padding:0 0 20px;
            }
            .class9{
                font-size:xx-small;
            }
            .class10{
                opacity: 0.01; left: 625px; top: 483px;
            }
            .class11{
                width:100%;clear:both;color:#999;
            }
            .class12{
                font-size:12px;color:#999;text-align:center;
            }
        </style>
    
        </head>
        <body>
    
            <table align="center">
                <tbody><tr >
                        <td valign="top"></td>
                        <td width="600" class="tdstyle tamañodeletra verticalalingtop class1"   valign="top">
                            <div class="tdstyle tamañodeletra class2" >
                                <table width="100%" cellpadding="0" cellspacing="0" class="tdstyle tamañodeletra margin class3" bgcolor="#fff">
                                    <tbody><tr >
                                        <td class="tdstyle verticalalingtop margin class4"   align="center" bgcolor="#2389E1" valign="top">
                                            Ficha de Postulación
                                        </td>
                                    </tr>
                                    <tr >
                                        <td class="class7" valign="top">
                                            <table width="100%" cellpadding="0" cellspacing="0" >
                                                <tbody><tr >
                                                    <td class="class8" valign="top">
                                                        Hola <strong >'.$nombre.' '.$apellido.'</strong>,
                                                    </td>
                                                </tr> 
                                                <tr >
                                                    <td class="class8" valign="top">
                                                        <p> Estimado/a Promotor/a, Gracias por su interés en participar del Programa de Voluntariado "Yo Promotor Ambiental". Revisaremos su solicitud y en breve nos contactaremos con usted para informarle si ha sido aceptado/a.</p> 
                                                        <br/><p> Cordialmente. Ministerio del Ambiente</p>
                                                        
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td class="tdstyle tamañodeletra verticalalingtop margin class5"  align="center" valign="top">
                                                        <p><b>utiliza estas credenciales para ver tu ficha de postulación por la página : </b><a href="http://yopromotor.analyticsperu.com">yopromotor.analyticsperu.com</a></p>
                                                        <p><b>E mail : </b> '.$email.'</p>
                                                        <p><b>Contraseña : </b>'.$password.'</p>
                                                    </td>
                                                </tr>
                                                 
                                                <tr >
                                                    <td class="class8" valign="top">
                                                        <p class="class9">Si no realizaste un registro, simplemente elimina este email y no pasará nada.</p>
                                                    </td>
                                                </tr>                                    
                                            </tbody></table>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td valign="top">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTND0BALi-nNkv67n3EYOKMyK-zJoNw_-ayB-whykylpUXcTnfc" width="200px" class="CToWUd a6T" tabindex="0">
                                            <div class="a6S class10" dir="ltr"  >
                                                <div id=":sr" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Descargar el archivo adjunto " data-tooltip-class="a1V" data-tooltip="Descargar">
                                                    <div class="aSK J-J5-Ji aYr"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody></table>
                                <div class="tdstyle tamañodeletra margin class7 class11" >
                                    <table width="100%" >
                                        <tbody>
                                            <tr >
                                                <td class="tdstyle verticalalingtop margin class8 class12"  align="center" valign="top">Este mensaje de correo electrónico se ha enviado desde una dirección exclusivamente para envíos. No responda a este mensaje. Para obtener más información sobre las convocatorias que ofrece el Ministerio del Ambiente.</td>
                                            </tr>                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                        <td  valign="top"></td>
                    </tr>
                </tbody>
            </table>
    
        </body>
    </html>';

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparación de archivo
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
        "Content-Description: ".basename($files[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail
//$mail = @mail($to, $subject, $message, $headers, $returnpath); 


         
        if(mail($to, $subject, $message, $headers, $returnpath)){
            Logger::addInfo("Se envió un correo satisfactoriamente a: $email");
        }else{
            Logger::addInfo("No se pudo enviar el correo  a: $email");
        }
    }

}
 