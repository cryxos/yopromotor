<?php
namespace App;

class Request {
    public static function getParam($param){
        return $_POST[$param];
    }
	
	 public static function getParamGet($param){
        return $_GET[$param];
    }


}
