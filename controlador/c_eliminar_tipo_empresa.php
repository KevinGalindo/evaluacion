<?php
    
    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();
    //require_once 'eliminar_empresa.php';
    
    if(!empty($_GET))
    {
        $id_tipo_em = $_GET['id'];

        $query_delete = mysqli_query($conexion, "DELETE FROM tipo_empresa WHERE id_tipo_empresa = $id_tipo_em");

        if($query_delete){
            header("location: ../vista/v_tabla_tipo_empresa.php");
        }else{
            echo "Error al eliminar";
            echo $query_delete;
        }
    }

?>