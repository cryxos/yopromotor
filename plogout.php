<?php

    session_start();
    session_destroy();
    header("location: consultar.php");

?>
