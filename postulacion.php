<?php

// Init backend
require './init.php';

use App\Request;
use App\Tools;
use App\Logger;
use App\Model\Promotor;
use App\Model\Referencia;
use App\Mailer;
use App\FilePdf;

try {
    if(!$_POST){
        Logger::addInfo('Peticion vacia');
        echo 'Ud no envio datos';
        return;
    }
    // Obtenemos los datos del postulante
    $data = Promotor::getPostData();
    $ref1 = Referencia::getPostData('rf_');
    $ref2 = Referencia::getPostData('rf2_');

    //verficar el DNI (NUEVO)
    if(Promotor::verificarNumeroDoc($data['numero'])){
        echo "7";
        return;
    }
    
    // verficar email non duplicado
    if(Promotor::verificarEmail($data['email'])){
        echo "4";
        return;
    }
    
    if($data['edad'] < 18){
        echo "6";
        return;
    }
    
    //PEDIR NUMERO DE DNIPARA CREARCARPETA
    $dir_subida = __DIR__.'/uploads/'.$data['numero'].'/';

    if(file_exists($dir_subida)){
        Logger::addInfo('La carpteta ' . $data['numero'] . ' Ya existe');
        echo '5';
        return;
    }

    mkdir($dir_subida, 0777, true);

   

    // Registrar en base de datos
    if (Promotor::create($data)) {
        Promotor::guardarArcivos($data['numero']);
        // Consultar Datos de la DB
       
        //agregar tabla referencia
        
        $ref1['idpromotor'] = $data['idpromotor']; 
        Referencia::create($ref1);
         

        $ref2['idpromotor'] = $data['idpromotor'];
        Referencia::create($ref2); 
        
        FilePdf::GuardarPDF($data['nombres'], $data['apellidos'], $data['tdocumento'], $data['numero'], $data['fecha'], $data['sexo'], $data['idubigeo'], $data['departamento'], $data['provincia'], $data['distrito'], $data['direccion'], $data['nivel'], $data['condicion'], $data['centro_estudios'], $data['carrera'], $data['email'], $data['celular'], $data['telefono'], $data['enlace'], $data['seguro'], $data['tipo_seguro'], $data['discapacidad'], $data['tipo_discapacidad'], $data['opinion'], $data['periodo'], $data['certifico']);

        
        Mailer::enviarCorreoConfirmacion($data['nombres'],$data['apellidos'], $data['numero'], $data['email'], $data['hash']);
         
        echo "1";
    } else {
        echo "2";
    }

} catch (\Excecption $exc) {
    Logger::addInfo($exc->getMessage());
}


 



