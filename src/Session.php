<?php
namespace App;

class Session{
    public static function init(){
        session_start();
    }
    public static function setValue($key, $value){
        $_SESSION[$key] = $value;
    }
    public static function getValue($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
	  
}
