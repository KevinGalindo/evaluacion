<?php
    
    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();
    //require_once 'eliminar_empresa.php';
    
    if(!empty($_GET))
    {
        $id_empresa = $_GET['id'];

        $query_delete = mysqli_query($conexion, "DELETE FROM empresas WHERE nit_empresa = $id_empresa");

        if($query_delete){
            header("location: ../vista/v_lista_empresas_admin.php");
        }else{
            echo "Error al eliminar";
            echo $query_delete;
        }
    }

?>