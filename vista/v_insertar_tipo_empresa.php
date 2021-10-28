<?php

    include("../controlador/c_insertar_tipo_empresa.php");

    /*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */

?>
<!------------------------------------------v_Inserta_tipo_empresa------------------------------------------------------------>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tipo Empresas</title>
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    <link rel = "stylesheet" type = "text/css" href="../css/css_insertar.css">
    
</head>

<body>
    
<?php  include("v_menu.php"); ?>

<section id="container">

    <div class="insertar_tipo_empresa">
    <h1>Insertar un tipo empresa</h1>
    <!-- Activa la alerta si alguno de los campos no se rellena de forma adecuada -->
    <div class="alert"><?php echo isset($aler) ? $aler : ""; ?></div>
    <form action = ""  method="POST"> 

        <!-- Label para referirse a cada campo que debe ser rellenado -->
        <!-- Input para insertar la información deseada en cada campo de la tabla -->   
        <input type = "hidden" name = "id_tipo_empresa" required maxlength="8"><br>
        <br>Nombre del tipo de empresa
        <br><input type = "text" name = "tipo_empresa" required maxlength="30"> 

        

        <p><input type="submit" value="Insertar tipo empresa" class="btn_save"></p>

    </form>
    </div>
</section>

</body>


