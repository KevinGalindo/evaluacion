<?php

    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();

    if(empty($_GET['id']))
    {
        header("location: v_tabla_empresas.php");
    }else{
        

        $id_empresa = $_GET['id'];

        $query = mysqli_query($conexion, "SELECT t1.nit_empresa , t1.nombre_empresa , t2.tipo_empresa  
        FROM empresas t1 join tipo_empresa t2 on t1.id_tipo_empresa = t2.id_tipo_empresa
        WHERE nit_empresa = $id_empresa");
        //echo $query;
        //exit;
        $result = mysqli_num_rows($query);
        

        if($result > 0){
            while($data = mysqli_fetch_array($query)){
                $nit_empresa = $data['nit_empresa'];
                $nombre = $data['nombre_empresa'];
                $tipo_empresa = $data['tipo_empresa'];
            }
        }else{
            header("location: v_tabla_empresas.php");
        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Empresa</title>
    <link rel = "stylesheet" type = "text/css" href="../css/css_borrar.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
</head>

<body>

<?php  include("v_menu.php"); ?>

   <section id="container">
       <div class = "data_delete">
           <h2>¿Esta seguro de elimar la empresa?</h2>
           <p>ID: <span><?php echo $nit_empresa; ?></span></p>
           <p>Nombre: <span><?php echo $nombre; ?></span></p>
           <p>tipo: <span><?php echo $tipo_empresa; ?></span></p>
           <div class="btns">
                <a href="v_lista_empresas_admin.php" class="btn_cancel">Cancelar</a>
                   
                <a href="../controlador/c_eliminar_empresa.php?id=<?php echo $_GET["id"]; ?>" class="btn_ok">Aceptar</a>
            </div>
                

        </div>
   </section>
    
    

</body>
</html>