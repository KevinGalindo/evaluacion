<div style="font-family: Consolas;">
<link rel = "stylesheet" type = "text/css" href="../css/instalador.css">
<!--<script> src="../js/fn_menu.js" </script>-->

<?php
    
    include("../clases/conexion.php");
    $conexion = conexion::conectar();


    if (!$conexion){
        //header('Location: v-error.php');
        echo "mal 1";
    }else{
        echo '<div class="text2">Conexión correcta<br><hr>'; //Sertifica la conexion...

        $errores = array();


        $documentText = file_get_contents('../db_empresas.sql');
        $documentText = rtrim($documentText,"\n");
        $documentText = str_replace("//", "", $documentText);
        $documentText = str_replace("DELIMITER ;", "DELIMITER", $documentText);


        $scrips = explode('DELIMITER', trim($documentText));

        $tablas = explode(";", array_shift($scrips));

        $scrips = array_merge($tablas, $scrips);

        foreach($scrips as $sql){
            if ( strlen( trim( $sql ) ) > 0){
                $r = $conexion->query($sql);

                if ($r == false){
                    $arrores[] = $conexion->error;
                }
            }   
        }


        if (count($errores) == 0){
            echo "ejecucion correcta</div>"; //Sertifica que se haya instalado correctamente en la base de datos...
        
            unlink('../db_empresas.sql');
           
            header("location: ../controlador/salir.php");
            /*$nuevoArchivo = fopen("stl.text", "a");
            fputs($nuevoArchivo, "Archivo instaldo");*/
            
        }else{
            //header('Location: v-error.php');
            echo "mal 2";
        }
    }
?>
</div>