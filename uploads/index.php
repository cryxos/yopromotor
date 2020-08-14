<?php
// Init backend
    require '../zadmin/./init.php';

    use App\Session;

    Session::init();
    
     
        header("location: ../consultar.php");
     
?>