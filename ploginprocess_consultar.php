<?php 

require './init.php';

use App\Request;
use App\Logger;
use App\Model\User;
use App\Session;

Session::init();

try {
    if(!$_POST){
        Logger::addInfo('Peticion vacia');
        echo 'Ud no envio datos';
        return;
    }
    $email = Request::getParam('correo');
    $password = md5(Request::getParam('password'));
    if(!$email){
        throw new \Excecption("Parametro user no recibido!");
    }
    if(!$password){
        throw new \Excecption("Parametro pass no recibido!");
    }
    Logger::addInfo("-----". User::validarCredenciales($email, $password)."---");
    if (User::validarCredenciales($email, $password)) {
        $userData = User::getByEmail($email);
        Logger::addInfo($userData[0]["id"]);
        // Guardar en session datos de promotor
        User::guardarDatosEnSession($userData);
        echo "1";
    } else {
        Logger::addInfo("Autenticación fallida Email: $email, Pass: $password ----- ".User::validarCredenciales($email, $password)."---");
        echo "2";
    }

} catch (\Excecption $exc) {
    Logger::addInfo($exc->getMessage());
}

 
?>