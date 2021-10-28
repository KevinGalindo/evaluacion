<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/


    //esta clase nos permite almacenar varias funciones de consulta para su posterior uso.
    //require_once "sesiones.php";
    session_start();

    if(!isset($_SESSION['rol'])){

        header('location: ../clases/error404.html');
        session_destroy();
        //header('location: ../vista/v_autenticar.php');
    }else{
        if($_SESSION['rol'] != 1 ){
            header('location: ../clases/error404.html');
            session_destroy();
        //echo "No tienes rol de admin";
        }else{
            unlink('stl.text');

            header("location: ../index.php");
        }
    }

 