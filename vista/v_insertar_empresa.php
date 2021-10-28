<?php
    
/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */

    include("../controlador/c_insertar_empresa.php");
?>
<!------------------------------------------v_Inserta_empresa------------------------------------------------------------>
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

        <div class="insertar_empresa">
        <h1>Insertar una empresa</h1>
        <!-- Activa la alerta si alguno de los campos no se rellena de forma adecuada -->
        <div class="alert"><?php echo isset($aler) ? $aler : ""; ?></div>
        <form action = " "  method="POST"> 

            <!-- Label para referirse a cada campo que debe ser rellenado -->
            <!-- Input para insertar la información deseada en cada campo de la tabla -->
            <br><input type = "hidden" name = "nit_empresa" autocomplete="off" maxlength ="5" required>
            <br>Nombre de la empresa
            <br><input type = "text" name = "nombre_empresa" autocomplete="off" maxlength ="50" required> 
            <br>Descripción de la empresa
            <br><textarea name = "descripcion_empresa" class="int_des" autocomplete="off" maxlength ="1000" required></textarea>
            <br>Numero de contacto
            <br><input type = "text" name = "numero_contacto" autocomplete="off" required minlength="10"maxlength="10">
            <br>Dirección de la empresa
            <br><input type = "text" name = "direccion" autocomplete="off" maxlength ="50" required>
        
            <br>Tipo de empresa<br><!-- empieza a dibujar una lista -->
            <br><select name = "id_tipo_empresa"> 

                <?php 
                
                    $sql = "SELECT id_tipo_empresa, tipo_empresa FROM tipo_empresa";/**Utiliza un select para traer dos campos de la tabla tipo_empresa */

                    //ejecuta la consulta
                    $resultado = $conexion->query( $sql );

                    //Recorre los datos que arroja la consulta
                    while( $fila = mysqli_fetch_array( $resultado ) )
                    {

                        $tmp  =  $fila[ 'tipo_empresa' ];
                        $tmp2 =  $fila[ 'id_tipo_empresa' ];

                        //Imprime los items de la lista.
                        echo "<option value='$tmp2'> $tmp </option>";

                    }

                ?>
            </select><br>  <!-- termina la lista -->
            <br>Estado de producción<br>
            Si hay producción
            <input class="input_radio_insertar_empresa" type="radio" name="estado_produccion" value="1" required>
            <br>No hay producción
            <input class="input_radio_insertar_empresa" type="radio" name="estado_produccion" value="2" required>

        
            <p><input type="submit" value="Insertar Empresa" class="btn_save"></p>
        </form>
        </div>
    </section>

</body>