<?php
    include("../controlador/c_insertar_producto.php");
    /*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */
    
?>
<!------------------------------------------v_Inserta_producto------------------------------------------------------------>
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

    <section id="container" >

        <div class="insertar_producto">
        <h1>Insertar un producto</h1>
        <!-- Activa la alerta si alguno de los campos no se rellena de forma adecuada -->
        <div class="alert"><?php echo isset($aler) ? $aler : ""; ?></div>
        <form action = ""  method="POST"> 

            Nombre del producto
            <br><input type = "text" name = "nombre_producto" maxlength="50" required><br>
            Tipo de producto
            <br><select name = "id_tipo_producto"> <!-- empieza a dibujar una lista -->
            
            <?php 

            //Construye una consulta pero solo es texto
                $sql = "SELECT id_tipo_producto, Tipo_producto FROM tipo_producto";//------- dos campos
            //echo $sql;

            //ejecuta la consulta
            $resultado = $conexion->query( $sql );

            //Recorre los datos que arroja la consulta
            while( $fila = mysqli_fetch_array( $resultado ) )
            {

                $tmp = $fila[ 'id_tipo_producto' ] ;//--------- muestra los dos campos de una
                $tmp2 = $fila[ 'Tipo_producto' ];
                
                //Ojo con el value. Imprime los items de la lista.
                echo "<option value='$tmp'> $tmp2 </option>";

            }

            ?>
            </select><br> <!--Termina la lista-->
            <input type = "hidden" name = "nit_empresa" value="<?php echo  $_GET['em']; ?>">
        
        <p><input type="submit" value="Insertar Producto" class="btn_save"></p>

        </form>
        </div>
    </section>

</body>