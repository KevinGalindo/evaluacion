<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresas</title>
    <link rel = "stylesheet" type = "text/css" href="../css/css_listas2.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
</head>
<body>
    <?php  include("v_menu_us.php"); ?>

    <div class="contenedor_lis">
    <section id="container">

            <?php

    /*==============================paginador=======================================*/

    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();
    
    $sql_registe = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM empresas");
    $result_register = mysqli_fetch_array($sql_registe);
    $total_registros = $result_register['total_registros'];

    $por_pagina = 10;

    if(empty($_GET['pagina']))
    {
        $pagina = 1;
    }else{
        $pagina = $_GET['pagina'];
    }

    $desde = ($pagina-1) * $por_pagina;
    $total_paginas = ceil($total_registros / $por_pagina);


    /*==============================paginador=======================================*/

    $id_tipo_em = $_GET['id'];

    $query = mysqli_query($conexion, "SELECT t1.nit_empresa , t3.imagen , t1.nombre_empresa , t1.numero_contacto , t1.direccion , t2.tipo_empresa , t1.estado_produccion  
                                        FROM empresas t1 join tipo_empresa t2 on t1.id_tipo_empresa = t2.id_tipo_empresa
                                        JOIN gal_imagenes t3 on t1.nit_empresa = t3.nit_empresa
                                        WHERE t2.id_tipo_empresa = $id_tipo_em
                                        ORDER BY t1.nombre_empresa asc
                                        LIMIT $desde,$por_pagina");


    $result = mysqli_num_rows($query); 
     ?>
                    
                
            <section class="empres">
                <div class="Top">
                    <div class="Title">Empresas</vid>
                </div>
                <ul class="ListPro" >
            
    <?php
    if($result > 0){
        while($data = mysqli_fetch_array($query)){?>
             
                    <li class="fa_play">
                        <a href="v_empresas.php?id=<?php echo $data["nit_empresa"]; ?>">
                            <figure>
                                <img class="Lazy" src="<?php echo $data["imagen"]; ?>">
                            </figure>
                            <h3><?php echo $data["nombre_empresa"]; ?></h3>
                            <p><?php echo $data["tipo_empresa"]; ?></p>
                        </a>
                    </li>
                    <?php 
        }
    }?>
                </ul>
            </section>
            
        <!------------------------------Seccion-para-el-paginador----------------------------------------->

        <div class="paginador">
            <ul>
                <?php
                if($pagina != 1)
                {
                ?>
                <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
                <?php
                } 
                    for($i=1; $i <= $total_paginas; $i++)
                    {
                        if($i == $pagina){
                            echo '<li class="pageSe">'.$i.'</li>';
                        }else{
                            echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                        }   
                    }
                    if($pagina != $total_paginas)
                    {
                ?>
                <li><a href="?pagina=<?php echo $pagina+1; ?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
                <?php } ?>
            </ul>
        <div>

    </section>
    </div>
</body>
</html>