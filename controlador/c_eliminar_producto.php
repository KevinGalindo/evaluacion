<?php
    
    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();
    //require_once 'eliminar_empresa.php';
    
    if(!empty($_GET))
    {
        $id_producto = $_GET['id'];
        $id_em = $_GET['em'];

        $query_delete = mysqli_query($conexion, "DELETE FROM productos WHERE id_producto = $id_producto");

        if($query_delete){
            header("location: ../vista/v_empresas_admin.php?id=$id_em");
        }else{
            echo "Error al eliminar";
            echo $query_delete;
        }
    }

?>