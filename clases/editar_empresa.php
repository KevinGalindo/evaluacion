<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/


 // funcion para borras datos de una tabla

    include( "../clases/conexion.php" );


    class editar_empresa extends conexion
    {
        public static function editar_empresas( $nit_empresa, $nombre_empresa, $descripcion_empresa, $numero_contacto, $direccion, $id_tipo_empresa, $estado_produccion )
        {
            $salida = "";

            $conexion = self::conectar();
     
            //Aqui ejecutamos el sql para que haga lo mismo en la base de datos y pase a borrar la informacion.
            $sql  = "UPDATE empresas SET nombre_empresa='$nombre_empresa',
            descripcion_empresa='$descripcion_empresa', numero_contacto='$numero_contacto', direccion='$direccion',
            id_tipo_empresa='$id_tipo_empresa', estado_produccion='$estado_produccion' WHERE nit_empresa= '$nit_empresa' ";
            // echo $sql;
        //    die(); 
            $resultado = $conexion->query( $sql );

            if( mysqli_affected_rows( $conexion ) > 0 )
            {
                //echo "Tus datos se han editado";
                header( "location: c_seccion.php" );

            }else{
                    
                    
                }
                
        }
    }
    