<?php

    include ("../clases/conexion.php"); //Incluye el archivo conexion..
    $conexion = conexion::conectar(); //Almacena la conexion en una variable...

    if(empty($_GET['id'] AND $_GET['id'] != 1 AND $_GET['id'] != 2))
    {
        header("location: v_registros.php");
    }else{

        $usuario = $_GET['id'];

        $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador WHERE id_admin = $usuario");

        $result = mysqli_num_rows($query);
        
        if($result > 0){
            
           while($data = mysqli_fetch_array($query)){
               
                $nombre = $data['nombre_admin'];
                $email = $data['correo_administrador'];    
            }

        }else{
            //header("location: v_registros.php");
            echo "se repide";
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Tipo Empresa</title>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel = "stylesheet" type = "text/css" href="../css/css_borrar.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    
</head>
<body>
<?php  include("v_menu.php"); ?>

   <section id="container">
       <div class = "data_delete ok">
           <h2>¿Quieres desbloquear este usuario?</h2>
           <p>Nombre: <span><?php echo $nombre; ?></span></p>
           <p>Correo: <span><?php echo $email; ?></span></p>
           <div class="btns">
                <a href="v_registros.php" class="btn_cancel">Cancelar</a>
                
                <a href="../controlador/desBlock.php?id=<?php echo $usuario ?>" class="btn_ok ok">Aceptar</a>
        
            </div>

        </div>
   </section>


</body>
</html>