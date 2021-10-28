<?php
/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/

//Este controlador nos sirve para capturar el nit_empresa mediante el GET y asi ejecutar la funcion de borrado de empresas

    include( "../clases/m_borrar.php" );
    m_borrar::borrar_empresas( $_GET[ 'id' ] );