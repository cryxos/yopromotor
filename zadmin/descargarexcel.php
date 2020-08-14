<?php
/* header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=archivo.xls");
header("Pragma: no-cache");
header("Expires: 0"); */

header("lang=es");
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=archivo.xls');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
 
flush(); // Flush system output buffer

if (isset($_POST['data_to_send']) && $_POST['data_to_send'] != '') {
    echo $_POST['data_to_send'];
}
  
?>