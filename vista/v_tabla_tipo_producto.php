<?php
    include("v_inicio.php");
    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();

    /*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */

?>

<html>
    <head>
        <title>Fondo Emprender Guaviare</title>
        <link rel = "stylesheet" type="text/css" href="../css/inicio.css">

    </head>

    <body>
        <link rel = "stylesheet" type = "text/css" href="../css/css_tablas.css">
    <section id="container">

        <div class="contenedor_tb">
            <h1 class="titulos">Tipo producto</h1>
            <table id="tipo_productos_tabla">
                <thead>
                    <tr>
                    <th>ID tipo producto</th>
                        <th>Tipo producto</th>
                        <th>Borrar</th>
                    </tr>
            </thead>
            <?php

            $query = mysqli_query($conexion, "SELECT id_tipo_producto, Tipo_producto FROM tipo_producto");/**Utiliza un select para traer dos campos de la tabla tipo_product */

            //ejecuta la consulta
            $result = mysqli_num_rows($query);

            if($result > 0){
                //Recorre los datos que arroja la consulta
                while($data = mysqli_fetch_array($query)){

                ?>
                <tbody>
                <tr>
                    <td data-titulo="ID"><?php echo $data["id_tipo_producto"]; ?></td>
                    <td data-titulo="Tipo"><?php echo $data["Tipo_producto"]; ?></td>
                    <td data-titulo="Borrar">
                    <?php if($data["id_tipo_producto"] != 1){ ?>
                    <a class="link_edit" href="v_eliminar_tipo_producto.php?id=<?php echo $data["id_tipo_producto"]; ?>">Borrar</a>
                    <?php } ?>
                    </td>
                </tr>
                </tbody>
                <?php 
                }
            }?>
            </table>
        </div>

    </section>
    </body>
</html>