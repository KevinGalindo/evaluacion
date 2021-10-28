<?php

    /**AUTORES: GRUPO PROYECTO FONDO EMPRENDER
     * Copyright © Todos los derechos reservados
     %*f(iDiWTJ2af*gHXA5d
     f|<m8LKuA?G8(v~E
     */

    //Redirección.
    if (!file_exists("clases/stl.text")){
        
        // Si el archivo no esxiste ejecutamos el instalador.
        header('Location: instalador/v-instalador.php');

    }else{
        
        // LLamaos al inio de la paginas
        header( "location: vista/v_autenticar.php" );

    }