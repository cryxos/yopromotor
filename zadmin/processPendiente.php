<?php 
session_start();
require './init.php';
use App\Request;
use App\Logger;
use App\Model\User;
use App\Mailer;


try {
    if(!$_GET){
        Logger::addInfo('Peticion vacia');
        echo 'Ud no envio datos';
        return;
    }
     
    $data = User::getPostDataUpdate();

    User::update($data, ["idpromotor" => $data['idpromotor']]);
    Logger::addInfo($data['idpromotor'] ."  -- ".$data['estado']);


    $datosUsuario = User::getDatosEnSession(); 
    $alldata  = User::selectall('*');
    //print_r($alldata); 

    echo "1";

} catch (\Excecption $exc) {
    Logger::addInfo($exc->getMessage());
}

 
?>
