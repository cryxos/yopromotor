<?php
namespace App\Model;

use App\Db;
use App\Request;
use App\Tools;
use App\Session;
use App\Ubigeo;
 

class Promotor {
    public static function create($data){
        return Db::insert('promotor', $data);
    }

    public static function update($data, $where){
        return Db::update('promotor', $data, $where);
    }
 

    public static function select($data, $where){
        return Db::select('promotor', $data, ['AND' => ['idpromotor' => $where]]);
    }
 

    public static function getByEmail($email){
        return Db::get('promotor', '*', ['email'=>$email]);
    }

    public static function validarCredenciales($email, $password){
        return Db::has('promotor', ['AND' => ['email' => $email , "hash" => $password , "estado" => "2"]]);
    }

    public static function verificarEmail($email){
        return Db::has('promotor', ['AND' => ['email' => $email]]);
    }
    
    public static function verificarNumeroDoc($numero){
        return Db::has('numerobe', ['AND' => ['numerodoc' => $numero]]);
    }
    
    public static function guardarDatosEnSession($data){
        Session::setValue('idpromotor', $data['idpromotor']);
        Session::setValue('apellidos', $data['apellidos']);
        Session::setValue('nombres', $data['nombres']);
        Session::setValue('tdocumento', $data['tdocumento']);
        Session::setValue('numero', $data['numero']);
        Session::setValue('fecha', $data['fecha']);
        Session::setValue('sexo', $data['sexo']);
        Session::setValue('direccion', $data['direccion']);
        Session::setValue('centroestudios', $data['centro_estudios']);  
        Session::setValue('carrera', $data['carrera']); 
        Session::setValue('email', $data['email']);
        Session::setValue('celular', $data['celular']);
        Session::setValue('telefono', $data['telefono']);
        Session::setValue('enlace', $data['enlace']);
        Session::setValue('opinion', $data['opinion']);
        
    }
    public static function getDatosEnSession(){
        return [
            'idpromotor' => Session::getValue('idpromotor'),
            'opinion'      => Session::getValue('opinion')
        ];
    }

   

    public static function calcularEdad($fecha){
         
        $fecha = str_replace("/","-",$fecha);
        $anio= date('Y',strtotime($fecha));
        $mes = date('m',strtotime($fecha));
        $dia = date('d',strtotime($fecha));
        $hoy = date('Y');
        
        $edad = $hoy - $anio;
        
        
        if(  date('m',strtotime($fecha)) >  date('m') ){
             
                $edadreal = $edad - 1;
                
              
        }
        
        if(date('m',strtotime($fecha)) ==  date('m')){
             
            if( date('d',strtotime($fecha)) > date('d') ){
                $edadreal = $edad-1;
                 
            } else {
                $edadreal = $edad;
                
            } 
    
        }
        
        if(date('m',strtotime($fecha)) <  date('m')){
            $edadreal = $edad;
             
        } 
        
        return $edadreal;
        
    }
    
    public static function mostrarDEPA($ubigeo)
    {
        $depaUbigeo = (int) ($ubigeo / 10000) * 10000;
        return $depaUbigeo;
    }

    public static function mostrarPROV($ubigeo)
    {
        $provUbigeo = (int) ($ubigeo / 100) * 100;
        return $provUbigeo;
    }

     
    
    public static function getPostData(){
        $data['apellidos'] = Request::getParam('txt_apellido');
        $data['nombres'] = Promotor::filtrar(Request::getParam('txt_nombre'));
        $data['tdocumento'] = Request::getParam('list_tipodocumento');
        $data['numero'] = Request::getParam('txt_numerodocumento');
        $data['fecha'] = Request::getParam('eldate');
        $data['sexo'] = Request::getParam('genero');
        $data['idubigeo'] = Request::getParam('list_distrito');
        $data['departamento'] = Ubigeo::$REGIONES[Promotor::mostrarDEPA($data['idubigeo'])];
        $data['provincia'] = Ubigeo::$PROVINCIAS[Promotor::mostrarPROV($data['idubigeo'])];
        $data['distrito'] = Ubigeo::$DISTRITOS[$data['idubigeo']];
        $data['direccion'] = Request::getParam('txt_direccion');
        $data['nivel'] = Request::getParam('list_estudios');
        $data['condicion'] = Request::getParam('condicion');
        $data['centro_estudios'] = Request::getParam('txt_centroestudios');
        $data['carrera'] = Request::getParam('txt_carrera');
        $data['email'] = Request::getParam('txt_email');
        $data['celular'] = Request::getParam('txt_celular');
        $data['telefono'] = Request::getParam('txt_telefono');
        $data['enlace'] = Request::getParam('txt_youtube');
        $data['seguro'] = Request::getParam('seguro');
        $data['tipo_seguro'] = Request::getParam('list_tiposeguro');
        $data['discapacidad'] = Request::getParam('discapacidad');
        $data['tipo_discapacidad'] = Request::getParam('list_tipodiscapacidad');
        $data['opinion'] = Request::getParam('txt_opinioambiente');
        $data['lenguaje'] = Request::getParam('leguajescod');        
        $data['certifico'] = 'Si';
        $data['edad'] = Promotor::calcularEdad(Request::getParam('eldate'));
        $data['hash'] = Tools::generarPasswordComplejo(20);
        $data['periodo'] = date("Y");
        $data['estado'] = 1;
        $data['idpromotor'] = 'id_' . $data['numero'];
        return $data;
    }
    
    public static function getPostDataUpdate(){
        
        $data['numero'] = Request::getParam('numero');  
        return $data;
    }


    public static function getPostDatalog(){
        $datalogin['email'] = Request::getParam('user');
        $datalogin['hash'] = Request::getParam('pass');
        return $datalogin;
    }

    public static function salvar($des) {
        /*
          mysqli_real_escape_string: Escapa los caracteres especiales de una cadena
          para usarla en una sentencia SQL, tomando en cuenta el conjunto de
          caracteres actual de la conexión.
         */
        $string =  mysqli_real_escape_string(mysqli_connect("localhost","elpromotor","123","yopromotor"),$des);
    
        return $string;
    }
    
    # Serie de filtros para almacenar en base de datos
    
    public static  function filtrar($string) {
    
        $res = Promotor::salvar($string);
    
        # Asignamos los parametros de busqueda
        $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
        $reemplazar = array('&aacute', '&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');
    
        # str_replace: Reemplaza todas las apariciones del string buscado con el string de reemplazo
        $res = str_replace($buscar, $reemplazar, $string);
    
        # strtolower: Convierte una cadena a minúsculas
        $res = strtolower($res);
    
        # trim: Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
        $res = trim($res);
    
        return $res;
    }




    public static function guardarArcivos($dni){

        // Guardar Scan
        $tempDir = $_FILES['file_scan']['tmp_name'];
        $pathScan = self::getFilePathDestino($dni, 'SCAN', self::getFileExtension($_FILES['file_scan']['name']));
        move_uploaded_file($tempDir, $pathScan);

        // Guardar foto
        $tempDir = $_FILES['file_foto']['tmp_name'];
        $pathFoto = self::getFilePathDestino($dni, 'FOTO', self::getFileExtension($_FILES['file_foto']['name']));
        move_uploaded_file($tempDir, $pathFoto);
        
        // Guardar sustento
        $tempDir = $_FILES['file_sustento']['tmp_name'];
        $pathSustento = self::getFilePathDestino($dni, 'SUSTENTO', self::getFileExtension($_FILES['file_sustento']['name']));
        move_uploaded_file($tempDir, $pathSustento);

        // Guardar servicio
        $tempDir = $_FILES['file_servicio']['tmp_name'];
        $pathSustento = self::getFilePathDestino($dni, 'SERVICIO', self::getFileExtension($_FILES['file_servicio']['name']));
        move_uploaded_file($tempDir, $pathSustento);

        // Guardar cv
        $tempDir = $_FILES['file_cv']['tmp_name'];
        $pathSustento = self::getFilePathDestino($dni, 'CV', self::getFileExtension($_FILES['file_cv']['name']));
        move_uploaded_file($tempDir, $pathSustento);

         
    }

    public static function guardarArcivosCarta($dni){
         // Guardar Scan
         $tempDir = $_FILES['file_carta']['tmp_name'];
         $pathCarta = self::getFilePathDestino($dni, 'CARTA', self::getFileExtension($_FILES['file_carta']['name']));
         move_uploaded_file($tempDir, $pathCarta);
    }


    public static  function getFilePathDestino( $dni,$tipo, $extension){
        return APP_FILE_UPLOAD_DIR . "/$dni/$dni-$tipo.$extension";
    }
    public static  function getFileExtension( $filePath){
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }
}
