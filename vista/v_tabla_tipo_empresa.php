<?php

    include ("../clases/conexion.php"); 
        $conexion = conexion::conectar();

    /*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresas</title>
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    <link rel = "stylesheet" type = "text/css" href="../css/css_tablas.css">
    
</head>

<body>

<?php  include("v_menu.php"); ?>

<section id="container">

    <div class="contenedor_tb">
        <h1 class="titulos">Tipo empresa</h1>

        <form action=" v_insertar_tipo_empresa.php"><input type="submit" value="Insertar tipo de empresa" class="boton_insertar"></form>

        <table id="tipo_empresas_tabla"><!-- empieza a dibujar una tabla -->
            <thead>
                <tr>
                    <th>ID tipo empresa</th>
                    <th>Tipo empresa</th>
                    <th>Borrar</th>
                </tr>
            </thead>
          
            <tbody>
            <?php



$query = mysqli_query($conexion, "SELECT id_tipo_empresa, tipo_empresa FROM tipo_empresa");/**Utiliza un select para traer dos campos de la tabla tipo_empresa */


//ejecuta la consulta
$result = mysqli_num_rows($query);

if($result > 0){
while($data = mysqli_fetch_array($query)){

    ?>
                <tr>
                    <td data-titulo="ID"><?php echo $data["id_tipo_empresa"]; ?></td>
                    <td data-titulo="Tipo"><?php echo $data["tipo_empresa"]; ?></td>
                    <td data-titulo="Borrar">
                        <?php if($data["id_tipo_empresa"] != 1){ ?>
                        <a class="link_edit" href="v_borrar_tipo_empresa.php?id=<?php echo $data["id_tipo_empresa"]; ?>">Borrar</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php 
        }
        }?>
            </tbody>
          
        </table><!-- Termina de dibujar la tabla -->
    </div>


</section>
</body>