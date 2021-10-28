<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/


    //Esta clase es la que nos va a ocnectar a la base de datos del administrador

    include ("../clases/conexion.php"); 
    

     class autenticar
     {
        static function autenticacion( $contrasena_administrador, $correo_administrador )
     {              
     
        $conexion = conexion::conectar();

         //Esta clase es del modelo.
         $sql  = " SELECT 1 ";
         $sql .= " FROM acceso_administrador ";
         $sql .= " WHERE contrasena_administrador = '$contrasena_administrador' ";
         $sql .= " AND correo_administrador  = '$correo_administrador' ";
         //echo $sql;
         $resultado = $conexion->query( $sql );

         return $resultado;
     }
    
     }
     