<?php 
 

function nombreEstado($estado){
    if($estado==1){
        echo "Pendiente";
    }else if($estado==0){
        echo "Descartado";
    }else if($estado==2){
        echo "Aprobado";
    }
    
}

function colorEstado($estado){
    if($estado==1){
        echo "white";
    }else if($estado==0){
        echo "red";
    }else if($estado==2){
        echo "green";
    }
}
  




?>