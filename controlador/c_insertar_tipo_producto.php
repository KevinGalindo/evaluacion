<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/

//Este controlador sirve para insertar datos en la tabla tipo_producto.

include ("../clases/conexion.php"); 
$conexion = conexion::conectar();
    
if(!empty($_POST))
{
    $aler="";
    if(empty($_POST['id_tipo_producto']) OR empty($_POST['Tipo_producto']) )
    {
        $aler='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{
        
        //include( "clases/conexion.php" );

        $a = $_POST[ 'id_tipo_producto' ];
        $b = $_POST[ 'Tipo_producto' ];
        
        
        $query = mysqli_query($conexion, "SELECT * FROM tipo_producto WHERE id_tipo_producto = '$a' OR Tipo_producto = '$b' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $aler='<p class="msg_error">El tipo producto ya existe.</p>';
        }else{
            $query_insert = mysqli_query($conexion,"INSERT INTO tipo_producto( id_tipo_producto, Tipo_producto)
                                                                VALUES( '$a', '$b')");

            if($query_insert){
                $aler='<p class="msg_save">Se Inserto Correctamente.</p>';
                $aler.='<p class="msg_save"><a h href="../vista/v_tabla_tipo_producto.php">Ver tabla</a></P>';
            }else{
                $aler='<p class="msg_error">Error al insertar tipo producto.</p>';
            }
        }
    }
}