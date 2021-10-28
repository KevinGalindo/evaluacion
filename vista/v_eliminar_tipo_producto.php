<?php

    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();

    if(empty($_GET['id'] AND $_GET['id'] != 1))
    {
        header("location: v_tabla_tipo_producto.php");
    }else{
        

        $id_tipo_pro = $_GET['id'];

        $query = mysqli_query($conexion, "SELECT id_tipo_producto, Tipo_producto FROM tipo_producto WHERE id_tipo_producto = $id_tipo_pro");
        //echo $query;
        //exit;
        $result = mysqli_num_rows($query);
        

        if($result > 0){
            while($data = mysqli_fetch_array($query)){
                $id_tipo_producto = $data['id_tipo_producto'];
                $tipo = $data['Tipo_producto'];
                
            }
        }else{
            header("location: v_tabla_tipo_producto.php");
        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Tipo Empresa</title>
    <link rel = "stylesheet" type = "text/css" href="../css/css_borrar.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    <?php  include("v_inicio.php"); ?>
</head>
<body>
   <section id="container">
       <div class = "data_delete">
           <h2>¿Esta seguro de elimar el tipo producto?</h2>
           <p>ID: <span><?php echo $id_tipo_producto; ?></span></p>
           <p>Tipo: <span><?php echo $tipo; ?></span></p>
                <a href="v_tabla_tipo_producto.php" class="btn_cancel">Cancelar</a>
                   
                <a href="../controlador/c_eliminar_tipo_producto.php?id=<?php echo $_GET["id"]; ?>" class="btn_ok">Aceptar</a>
                

        </div>
   </section>
    
    

</body>
</html>