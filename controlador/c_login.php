<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/


    //Incluimos las clases
    include( "../clases/conexion_bd_admin.php" );
    include( "../clases/Vimprimir.php" );
    include( "../clases/sesiones.php" );

    sesiones::iniciar_sesion();

    //Capturamos variables del formulario
    $contrasena_administrador = $_POST[ 'contrasena_administrador' ];
    $correo_administrador = $_POST[ 'correo_administrador' ];

    //echo $documento." ".$clave;

    //Usamos el método autenticar.
    $r = autenticar::autenticacion( $contrasena_administrador, $correo_administrador );
    $r = Vimprimir::imprimir( $r, 1 ); 
    //Imprimir si estamos autenticados o no.
    if( $r  == 1 )
    {
        $_SESSION[ 'contrasena_administrador' ] = $contrasena_administrador;
        header( "location: c_seccion.php" );

    }else{
            header( "location: c_autenticar.php" );
        }