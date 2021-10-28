<div style="font-family: Consolas;">
<link rel = "stylesheet" type = "text/css" href="../css/instalador.css">
<link rel = "stylesheet" type = "text/css" href="../css/li_copia.css">
<link rel = "stylesheet" type = "text/css" href="../css/subir_img.css">
<!--<script> src="../js/fn_menu.js" </script>-->
<script>
    var c = 0;

    function pop() {
        if(c == 0){
            document.getElementById('box').style.display = "block";
            c = 1;
        }else{
            document.getElementById('box').style.display = "none";
            c = 0;
        }
    }

    function pap() {
        if( c == 0 ){
          document.getElementById("boc").classList.add('active');
          c = 1;
        }else{
          document.getElementById("boc").classList.remove('active');
          c = 0;
        }
      }
</script>
<?php
    $ser = $_GET['servidor'];
    $usu = $_GET['usuario'];
    $pww = $_GET['contraseña'];
    $bdd = $_GET['base-de-datos'];


    $conexion = @mysqli_connect($ser, $usu,$pww, $bdd);

    if (!$conexion){
        header('Location: v-error.php');
    }else{
        echo '<div class="text2">Conexión correcta<br><hr>'; //Sertifica la conexion...

        $errores = array();


        $documentText = file_get_contents('base-de-datos.sql');
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
            echo '<br><a onclick="pop()" class="boton_ins2">Inicio</a>';
            
            echo '<div id="box">
            <h1>Antes de acceder debes registar una cuenta de administrador.</h1>
    
            <a href="../vista/register_admin.php" class="register">Registrar</a>
            <a onclick="pop()" class="register">Cerrar</a>
            </div>';
            echo '<br><a onclick="pap()" class="boton_ins2 ok">Copia de seguridad</a>';
            echo '<div class="subir_img" id="boc">

            <form enctype="multipart/form-data" method="post" action="../backup/maneja.php">
            <div class="file-field input-field">
                <div class="btn-small amber darken ">
                <input type="file" class="inputfile inputfile-7 ok" id="zip_file" name="zip_file" />
                <label for="zip_file"><br>
                    <span class="iborrainputfile"></i></span>
                    <strong>
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <p>Subir archivo ZIP </p>
                    </strong>
                </label>
                
                </div>
            </div>
           
                <input type="submit" class="login-btn active" name="submit" value="Subir" />
                <a onclick="pap()" class="btn_ok">Cerrar</a>
            </form>

        </div>';


            $archivoConexion = fopen('../clases/conexion.php', 'w');

            $lineas[] = "<?php\n";
            $lineas[] = "\n";
            $lineas[] = "/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER\n";
            $lineas[] = "* Copyright © Todos los derechos reservados\n";
            $lineas[] = "*/\n";
            $lineas[] = "\n";
            $lineas[] = "\t//Esta clase es la que nos va a conectar a la base de datos de las empresas\n";
            $lineas[] = "\tclass conexion\n";
            $lineas[] = "\t{\n";
            $lineas[] = "\t\tstatic function conectar()\n";
            $lineas[] = "\t\t{\n";
            $lineas[] = "\t\t\treturn mysqli_connect('$ser', '$usu', '$pww', '$bdd');\n";
            $lineas[] = "\t\t}\n";
            $lineas[] = "\t}\n";
            $lineas[] = "?>";    
            
            foreach($lineas as $linea){
                fputs($archivoConexion, $linea);
            }

            $nuevoArchivo = fopen("../clases/stl.text", "a");
            fputs($nuevoArchivo, "Archivo instaldo");
            
        }else{
            header('Location: v-error.php');
        }
    }
?>
</div>