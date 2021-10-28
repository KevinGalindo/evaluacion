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
    if(empty($_POST['id_producto']) OR empty($_POST['nombre_producto']) OR empty($_POST['id_tipo_producto']) OR empty($_POST['nit_empresa']) )
    {
        $aler='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{
        
        //include( "clases/conexion.php" );

        $a = $_POST[ 'id_producto' ];
        $b = $_POST[ 'nombre_producto' ];
        $c = $_POST[ 'id_tipo_producto' ];
        $d = $_POST[ 'nit_empresa' ];

        
        $query = mysqli_query($conexion, "SELECT * FROM productos 
                                            WHERE nombre_producto = '$b' AND id_producto != '$a';");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $aler='<p class="msg_error">El producto ya existe.</p>';
        }else{
            $query_update = mysqli_query($conexion,"UPDATE productos
                                                    SET nombre_producto = '$b' , id_tipo_producto = '$c' , nit_empresa = '$d'
                                                    WHERE id_producto = '$a'");

            if($query_update){
                header(  "location: ../vista/v_empresas_admin.php?id=$d" );
            }else{
                $aler='<p class="msg_error">Error al insertar producto.</p>';
            }
        }
    }
}

    if(empty($_GET['id']))
    {
        header("location: v_empresas_admin.php?id=$d");
    }
    $idpro = $_GET['id'];

    $sql = mysqli_query($conexion, "SELECT t1.id_producto, t1.nombre_producto, t2.Tipo_producto, t3.nombre_empresa FROM productos t1
    JOIN tipo_producto t2 on t1.id_tipo_producto = t2.id_tipo_producto
    JOIN empresas t3 on t1.nit_empresa = t3.nit_empresa
    WHERE t1.id_producto = $idpro");

    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0 )
    {
        header("location: v_empresas_admin.php?id=$d");
    }else{
        while($data = mysqli_fetch_array($sql)){

            $id_producto = $data['id_producto'];
            $nombre = $data['nombre_producto'];
            $tipo = $data['Tipo_producto'];
            $empresa = $data['nombre_empresa'];

        }
    }