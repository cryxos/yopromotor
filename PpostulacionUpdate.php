<?php 
session_start();
require './init.php';
use App\Request;
use App\Tools;
use App\Logger;
use App\Model\Promotor;
use App\Mailer;


try {
    if(!$_POST){
        Logger::addInfo('Peticion vacia');
        echo "3";
        return;
    }
     
    $data = Promotor::getPostDataUpdate();

    if(!$_FILES['file_carta']['tmp_name']){
        echo "4";
    }else{
        Promotor::guardarArcivosCarta($data['numero']);
        echo "1";
    }
    
    
     
         
     

} catch (\Excecption $exc) {
    Logger::addInfo($exc->getMessage());
    echo "2";
}

 
?>