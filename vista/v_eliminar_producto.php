<?php

    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();

    if(empty($_GET['id']))
    {
        header("location: v_tabla_producto.php");
    }else{
        

        $id_producto = $_GET['id'];
        $_GET['em'];

        $id_em = $_GET['em'];

        $query = mysqli_query($conexion, "SELECT t1.id_producto , t1.nombre_producto,t3.nombre_empresa , t2.Tipo_producto, t3.nit_empresa 
        FROM productos t1 
        join tipo_producto t2 on t1.id_tipo_producto = t2.id_tipo_producto
        JOIN empresas t3 on t1.nit_empresa = t3.nit_empresa
        WHERE id_producto = $id_producto");
        //echo $query;
        //exit;
        $result = mysqli_num_rows($query);
        

        if($result > 0){
            while($data = mysqli_fetch_array($query)){
                $id_producto = $data['id_producto'];
                $nombre = $data['nombre_producto'];
                $nombre_empresa = $data['nombre_empresa'];
                $tipo_producto = $data['Tipo_producto'];
                $em = $data['nit_empresa'];
            }
        }else{
            header("location: v_tabla_producto.php");
        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Producto</title>
    <link rel = "stylesheet" type = "text/css" href="../css/css_borrar.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
</head>

<body>

<?php  include("v_menu.php"); ?>

   <section id="container">
       <div class = "data_delete">
           <h2>¿Esta seguro de elimar el producto?</h2>
           <p>ID: <span><?php echo $id_producto; ?></span></p>
           <p>Nombre: <span><?php echo $nombre; ?></span></p>
           <p>Empresa: <span><?php echo $nombre_empresa; ?></span></p>
           <p>tipo: <span><?php echo $tipo_producto; ?></span></p>
           <div class="btns">
                <a href="v_empresas_admin.php?id=<?php echo $em; ?>" class="btn_cancel">Cancelar</a>
                   
                <a href="../controlador/c_eliminar_producto.php?id=<?php echo $_GET["id"] .'&'.'em='. $id_em; ?>" class="btn_ok">Aceptar</a>
            </div>
                

        </div>
   </section>
    
    

</body>
</html>