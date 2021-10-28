<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/

//Este controlador sirve para insertar producto a la base de datos.

    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();
    
if(!empty($_POST))
{
    $aler="";
    if( empty($_POST['nombre_producto']) OR empty($_POST['id_tipo_producto']) OR empty($_POST['nit_empresa']) )
    {
        $aler='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{
        
    

        $a = $_POST[ 'id_producto' ];
        $b = $_POST[ 'nombre_producto' ];
        $c = $_POST[ 'id_tipo_producto' ];
        $d = $_POST[ 'nit_empresa' ];

        $id = $_GET['em'];

        $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id_producto = '$a' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $aler='<p class="msg_error">El producto ya existe.</p>';
        }else{
            $query_insert = mysqli_query($conexion,"INSERT INTO productos(  nombre_producto, id_tipo_producto, nit_empresa)
                                                                VALUES(  '$b' , '$c','$d')");

            $query_img = mysqli_query($conexion,"INSERT INTO pro_imagenes (id_productos) values('$a')");

            if($query_insert){

                $id_ultimo=mysqli_insert_id($conexion);

                $query_img = mysqli_query($conexion,"INSERT INTO pro_imagenes (id_productos) values('$id_ultimo')");

                if($query_img)
                {
                    header( "location: ../vista/v_empresas_admin.php?id=$id" );
                }else{
                    $aler='<p class="msg_error">Error al insertar img.</p>';
                }
               /*$aler='<p class="msg_save">Se Inserto Correctamente.</p>';
                $aler.="<p class='msg_save'><a h href='../vista/v_empresas_admin.php?id=$id'>Ver</a></P>";*/
            }else{
                $aler='<p class="msg_error">Error al insertar producto.</p>';
            }
        }
    }
}