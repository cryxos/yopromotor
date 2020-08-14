<?php
namespace App\Model;

use App\Db;
use App\Request;
use App\Tools;
use App\Session;
 
 

class User {
    
    public static function select($data, $where){
        return Db::select('user', $data, ['AND' => ['id' => $where]]);
    }

    public static function update($data, $where){
        return Db::update('promotor', $data, $where);
    }

    public static function selectall($data){
    //public static function selectall($data, $where){
        //return Db::select('promotor', $data, ['AND' => ['estado' => $where]]);
        return Db::selectx('promotor', $data);
    }
   
    public static function getByEmail($email){
        return Db::get('user', '*', ['correo'=>$email]);
    }
 

    public static function validarCredenciales($email, $password){
        return Db::has('user', ['AND' => ['correo' => $email , "password" => $password]]);
    }
    

    public static function getPostData(){
        $data['correo'] = Request::getParam('correo');
         
        return $data;
    }

    public static function guardarDatosEnSession($data){
        
        Session::setValue('correo', $data['correo']);
               
    }
    public static function getDatosEnSession(){
        return [
            'correo' => Session::getValue('correo')             
        ];
    }
    
      
    public static function getPostDataUpdate(){
        $data['idpromotor'] = Request::getParamGet('id');      
        $data['estado'] =  Request::getParamGet('estado'); 
        return $data;
    }


    public static function getPostDatalog(){
        $datalogin['correo'] = Request::getParam('correo');
        $datalogin['password'] = Request::getParam('password');
        return $datalogin;
    }
 
}
