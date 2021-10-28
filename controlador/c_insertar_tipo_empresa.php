<?php
/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/

//Este controlador sirve para insertar los datos de las empresas en la base de datos.

include ("../clases/conexion.php"); 
$conexion = conexion::conectar();
    
if(!empty($_POST))
{
    $aler="";
    if( empty($_POST['tipo_empresa']) )
    {
        $aler='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{
        

        $a = $_POST[ 'id_tipo_empresa' ];
        $b = $_POST[ 'tipo_empresa' ];
        
        
        $query = mysqli_query($conexion, "SELECT * FROM tipo_empresa WHERE id_tipo_empresa = '$a' OR tipo_empresa = '$b' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $aler='<p class="msg_error">El tipo empresa ya existe.</p>';
        }else{
            $query_insert = mysqli_query($conexion,"INSERT INTO tipo_empresa( tipo_empresa )
                                                                VALUES( '$b')");

            if($query_insert){
                header( "location: ../vista/v_tabla_tipo_empresa.php" );
                /*$aler='<p class="msg_save">Se Inserto Correctamente.</p>';
                $aler.='<p class="msg_save"><a h href="../vista/v_tabla_tipo_empresa.php">Ver tabla</a></P>';*/
            }else{
                $aler='<p class="msg_error">Error al insertar tipo empresa.</p>';
            }
        }
    }
}