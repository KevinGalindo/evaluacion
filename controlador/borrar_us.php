<?php

include ("../clases/conexion.php"); 
$conexion = conexion::conectar();

if(!empty($_GET) AND $_GET['id'] != 1 AND $_GET['id'] != 2)
{

    $id_us = $_GET['id'];

    $query_delete = mysqli_query($conexion, "DELETE FROM acceso_administrador WHERE id_admin = $id_us");

    if($query_delete){
        header("location: ../vista/v_registros.php");
    }else{
        echo "Error al eliminar";
        echo $query_delete;
    }
}else{
    header("location: ../vista/v_registros.php");
}

?>