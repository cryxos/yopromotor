<?php

// Init backend
require './init.php';

use App\Db;

$db = Db::getDbInstance();
// $db->delete('promotor', ['idpromotor[!]'=>'1']);
$data = $db->select('promotor', ['idpromotor','nombres', 'apellidos', 'numero']);

echo '<pre>';
print_r($data);
echo '</pre>';