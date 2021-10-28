<?php
    include("v_inicio.php");
    include("../controlador/c_insertar_tipo_producto.php");

    /*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */
?>
<!------------------------------------------v_Inserta_tipo_producto------------------------------------------------------------>


<link rel = "stylesheet" type = "text/css" href="../css/css_insertar.css">

<section id="container">

    <div class="insertar_tipo_producto">
    <h1>Insertar un tipo producto</h1>
    <!-- Activa la alerta si alguno de los campos no se rellena de forma adecuada -->
    <div class="alert"><?php echo isset($aler) ? $aler : ""; ?></div>
    <form action = ""  method="POST"> 

        
        <!-- Label para referirse a cada campo que debe ser rellenado -->
        <!-- Input para insertar la información deseada en cada campo de la tabla -->
        <br>Codigo del tipo de producto
        <br><input type = "text" name = "id_tipo_producto" maxlength="8" required><br>
        <br>Nombre del tipo de producto
        <br><input type = "text" name = "Tipo_producto" maxlength="30" required> 

        

        <p><input type="submit" value="Insertar tipo producto" class="btn_save"></p>

    </form>
    </div>
</section>

<!----------------------------------Crea una lista de tipo producto-------------------------------------->
