<?php

namespace App;
// Init backend
require './init.php';
use Spipu\Html2Pdf\Html2Pdf;

class FilePdf{

    public static function GuardarPDF($nombres, $apellidos, $tdocumento, $numero, $fecha, $sexo, $idubigeo, $depa , $prov, $dist, $direccion, $nivel, $condicion, $centro_estudios, $carrera, $email, $celular, $telefono, $enlace, $seguro, $tipo_seguro, $discapacidad, $tipo_discapacidad, $opinion, $periodo, $certifico){

        $html2pdf = new Html2Pdf('L', 'LEGAL', 'es', true, 'UTF-8', 0);
        $html2pdf->writeHTML("
        
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
            <title>FICHA POSTULACION </title>
             <style type='text/css'>
			.tg  {border-collapse:collapse;border-spacing:0;width: 21cm !important;}
			.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
			.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
			.tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
			.tg .tg-49pp{background-color:#105b80;color:#000000;border-color:#105b80;text-align:left;vertical-align:top}
			.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
			.tg .tg-fbuf{background-color:#105b80;border-color:#105b80;text-align:left;vertical-align:top}
			.tg .tg-0pky{border-color:inherit;text-align:center;vertical-align:top;width: 200px;}
			.tg .tg-73a0{font-size:12px;border-color:inherit;text-align:left;vertical-align:top}
			.wrap{word-wrap: break-word;}
			</style>
        </head> 
        <body>
            
            <div style='text-align:center;'>
              
				 <table class='tg' align='center'>
				  <tr>
					<th class='tg-lboi' colspan='6'><span style='font-weight:bold'>FICHA DE POSTULACIÓN - PROGRAMA DE VOLUNTARIADO 'YO PROMOTOR AMBIENTAL'</span></th>
				  </tr>
				  <tr>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
				  </tr>
				  <tr>
					<td class='tg-0pky'>Nombres</td>
					<td class='tg-c3ow' colspan='5'>".$nombres."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Apellidos</td>
					<td class='tg-c3ow' colspan='5'>".$apellidos."</td> 
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Tipo de documento</td>
					<td class='tg-c3ow' colspan='2'>".$tdocumento."</td>
					<td class='tg-0pky'>N° de documento</td>
					<td class='tg-0pky' colspan='2'>".$numero."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Fecha de nacimiento</td>
					<td class='tg-c3ow' colspan='2'>".$fecha."</td>
					<td class='tg-0pky'>Género</td>
					<td class='tg-0pky' colspan='2'>".$sexo."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Departamento</td>
					<td class='tg-c3ow'>".$depa."</td>
					<td class='tg-0pky'>Provincia</td>
					<td class='tg-c3ow'>".$prov."</td>
					<td class='tg-0pky'>Distrito</td>
					<td class='tg-c3ow'>".$dist."</td>
				  </tr>
				  <tr>
					<td class='tg-0pky'>Dirección</td>
					<td class='tg-c3ow' colspan='5'>".$direccion."</td>
				  </tr>
				  <tr>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
				  </tr>
				  <tr>
					<td class='tg-0pky'>Estudios superiores</td>
					<td class='tg-c3ow' colspan='5'>".$nivel."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Condición</td>
					<td class='tg-c3ow' colspan='5'>".$condicion."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Centro de estudios</td>
					<td class='tg-c3ow' colspan='5'>".$centro_estudios."</td> 
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Carrera profesional/técnica</td>
					<td class='tg-c3ow' colspan='5'>".$carrera."</td> 
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Email</td>
					<td class='tg-c3ow' colspan='5'>".$email."</td>
                  
				  </tr>
				  <tr>
					<td class='tg-0pky'>N° teléfono móvil</td>
					<td class='tg-c3ow' colspan='2'>".$celular."</td>
					<td class='tg-0pky'>N° teléfono:</td>
					<td class='tg-c3ow' colspan='2'>".$telefono."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-49pp'></td>
					<td class='tg-49pp'></td>
					<td class='tg-49pp'></td>
					<td class='tg-49pp'></td>
					<td class='tg-49pp'></td>
					<td class='tg-49pp'></td>
				  </tr>
				  <tr>
					<td class='tg-0pky'>Enlace Youtube</td>
					<td class='tg-c3ow' colspan='5'>".$enlace."</td> 
					 
				  </tr>
				  <tr>
					<td class='tg-0pky'>Cuenta Ud. con seguro de salud</td>
					<td class='tg-c3ow'>".$seguro."</td>
					<td class='tg-0pky'>Tipo&nbsp;&nbsp;de seguro</td>
					<td class='tg-c3ow' colspan='2'>".$tipo_seguro."</td> 
					<td class='tg-0pky'></td>
				  </tr>
				  <tr>
					<td class='tg-0pky'>Discapacidad</td>
					<td class='tg-c3ow'>".$discapacidad."</td>
					<td class='tg-0pky'>Tipo de discapacidad</td>
					<td class='tg-c3ow' colspan='3'>".$tipo_discapacidad."</td>
					 
				  </tr>
				  <tr>
					<td class='tg-0pky' colspan='2'>¿Qué opinión tienes sobre la gestión ambiental en el país?</td>
					<td class='tg-0pky' colspan='4'><p align='left' class='wrap'>".$opinion."</p></td> 
				  </tr>
				  <tr>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
					<td class='tg-fbuf'></td>
				  </tr>
				  <tr>
					<td class='tg-73a0' colspan='6'><p align='center'>DECLARO BAJO JURAMENTO NO REGISTRAR ANTECEDENTES POLICIALES, NI JUDICALES, POR DELITOS COMETIDOS<br/> EN CONTRA DE LA LIBERTAD SEXUAL, HOMICIDIO, FEMINICIDIO, TRÁFICO ILICITO DE DROGAS, TERRORISMO, CONTRA EL PATRIMONIO,<br/> LESIONES GRAVES, EXPOSICION DE PERSONAS AL PELIGRO O SECUESTRO.</p></td>
				  </tr>
				  <tr>
					<td class='tg-73a0' colspan='6'><p align='center'>DECLARO QUE LA INFORMACIÓN Y/O DATOS CONSIGNADOS EN EL PRESENTE FORMULARIO Y LOS DOCUMENTOS QUE <br/>SE ADJUNTAN SON VERDADEROS Y ME SOMETO A LAS SANCIONES ESTIPULADAS EN LAS NORMAS LEGALES VIGENTES EN CASO DE HABER DADO<br/> INFORMACIÓN FALSA.</p></td>
				  </tr>
				  <tr>
					<td class='tg-73a0' colspan='6'><p align='center'>EN TAL SENTIDO, ACEPTANDO LOS TÉRMINOS Y/O CONDICIONES ESTABLECIDAS SEGÚN LA DIRECTIVA N° 003-2018-MIANM/DM,<br/> SOLICITO MI <br/> POSTULACIÓN AL PROGRAMA DE VOLUNTARIADO 'YO PROMOTOR AMBIENTAL' DEL MINISTERIO <br/>DEL AMBIENTE.</p></td>
				  </tr>
				  <tr>
					<td class='tg-c3ow'>Acepto</td>
					<td class='tg-c3ow' colspan='5'>".$certifico."</td>
				  </tr>
				                     
                    
                </table>
            </div>
        </body> 
    </html>
        
        ");
        $html2pdf->output(__DIR__.'/../'.'/uploads/'.$numero.'/'.$numero.'-PDF.pdf', 'F');

    }


}


?>
