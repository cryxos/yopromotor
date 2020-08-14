<?php
namespace App\Model;

use App\Db;
use App\Request;
use App\Tools;
use App\Session;
use App\Ubigeo;
 

class Referencia {
    public static function create($data){
        return Db::insert('promo_referencia', $data);
    }

    
    public static function getPostData($prefix){
        $data['nombre_apellido_ref'] = Request::getParam($prefix . 'nombre');
        $data['tvinculo_ref'] = Request::getParam($prefix .'tvinculo');
        $data['num_ref'] = Request::getParam($prefix .'num');
        $data['correo_ref'] = Request::getParam($prefix .'correo');
        $data['estado'] = 1; 
        return $data;
    }
      
}
