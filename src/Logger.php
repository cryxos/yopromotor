<?php
namespace App;

class Logger{

    public static function addInfo($message){
      $file = fopen(APP_LOGS_DIR . '/app.log', 'a');
      fwrite($file, '[' . date('Y-m-d H:i:s') . '] ' . $message . "\n");
      fclose($file);
    }

}