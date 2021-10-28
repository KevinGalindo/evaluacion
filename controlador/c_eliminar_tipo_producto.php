<?php
    
    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();
    //require_once 'eliminar_empresa.php';
    
    if(!empty($_GET))
    {
        $id_tipo_pro = $_GET['id'];

        $query_delete = mysqli_query($conexion, "DELETE FROM tipo_producto WHERE id_tipo_producto = $id_tipo_pro");

        if($query_delete){
            header("location: ../vista/v_tabla_tipo_producto.php");
        }else{
            echo "Error al eliminar";
            echo $query_delete;
        }
    }

?>