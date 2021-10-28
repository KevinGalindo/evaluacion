<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="../css/v_empresas.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    <?php  include("../controlador/c_empresas.php"); ?>
    <title>Empresa</title>
</head>
<body>
<?php  include("v_menu_us.php"); ?>

    <div class="Body">
        <div>
            <div class="container">
                <div class="BX Row BFluid Sp20">
                    <aside class="SidebarA BFixed">
                        <div class="imgCover">
                            <div class="Image">
                                <figure>
                                    <img src="<?php echo $img_em ?>">
                                </figure>
                            </div>
                        </div>
                    </aside>
                    <main>
                        <section class="empres">
                            <div class="Top">
                                <div class="Title"><?php echo $nombre_em ?></div>
                            </div>
                            <div class="Description">
                            <?php echo $descri ?>
                            </div>
                            <div clas="rows">
                                <div class="col">
                                    <ul>
                                        <li><span>Contacto:</span><?php echo $numero ?></li>
                                        <li><span>Direccion:</span><?php echo $direccion ?></li>
                                        <li><span>Tipo:</span><?php echo $tipo_em ?></li>
                                        <li><span>Produccion:</span><?php echo $estado ?></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <section class="empres">
                            <div class="Top">
                                <div class="Title">Lista de productos</vid>
                            </div>
                            <ul class="ListPro" style="max-height: 1000px; overflow-y: auto;">
                  <?php if($result_pro > 0){
                            while($data = mysqli_fetch_array($query_pro)){?>
                                <li class="fa_play">
                                    <a>
                                        <figure>
                                            <img class="Lazy" src="<?php echo $data["imagen"] ?>">
                                        </figure>
                                        <h3><?php echo $data['nombre_producto']; ?></h3>
                                        <p><?php echo $data['Tipo_producto']; ?></p>
                                    </a>
                                </li>
                                <?php 
                            }
                        }?>
                            </ul>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "../vista/footer.html"; ?>

</body>
</html>