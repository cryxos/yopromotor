<?php 

require './init.php';

use App\Request;
use App\Tools;
use App\Logger;
use App\Model\Promotor;
use App\Session;

Session::init();

try {
    if(!$_POST){
        Logger::addInfo('Peticion vacia');
        echo 'Ud no envio datos';
        return;
    }
    $email = Request::getParam('user');
    $password = Request::getParam('pass');
    if(!$email){
        throw new \Excecption("Parametro user no recibido!");
    }
    if(!$password){
        throw new \Excecption("Parametro pass no recibido!");
    }
    if (Promotor::validarCredenciales($email, $password)) {
        $userData = Promotor::getByEmail($email);
        // Guardar en session datos de promotor
        Promotor::guardarDatosEnSession($userData);
        echo "1";
    } else {
        Logger::addInfo("Autenticación fallida Email: $email, Pass: $password");
        echo "2";
    }

} catch (\Excecption $exc) {
    Logger::addInfo($exc->getMessage());
}

 
?>