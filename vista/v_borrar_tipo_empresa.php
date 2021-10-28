<?php

    include ("../clases/conexion.php"); //Incluye el archivo conexion..
    $conexion = conexion::conectar(); //Almacena la conexion en una variable...

    if(empty($_GET['id'] AND $_GET['id'] != 1))
    {
        header("location: v_tabla_tipo_empresa.php");
    }else{

        $id_tipo_em = $_GET['id'];

        $query = mysqli_query($conexion, "SELECT id_tipo_empresa, tipo_empresa FROM tipo_empresa WHERE id_tipo_empresa = $id_tipo_em");

        $result = mysqli_num_rows($query);
        
        if($result > 0){
            while($data = mysqli_fetch_array($query)){
                $id_tipo_empresa = $data['id_tipo_empresa'];
                $tipo = $data['tipo_empresa'];
                
            }
        }else{
            header("location: v_tabla_tipo_empresa.php");
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
       <div class = "data_delete">
           <h2>¿Esta seguro de elimar el tipo empresa?</h2>
           <p>ID: <span><?php echo $id_tipo_empresa; ?></span></p>
           <p>Tipo: <span><?php echo $tipo; ?></span></p>
           <div class="btns">
                <a href="v_tabla_tipo_empresa.php" class="btn_cancel">Cancelar</a>
                
                <a onclick="pop()" class="btn">Aceptar</a>
                <div id="box">
                    <span><ion-icon name="warning"></ion-icon></span>
                    <h1>Ten en cuenta que borrar un tipo empresa borrara todas las empresas con este tipo.</h1>
                    <h2>¿Esta seguro de borrar este tipo de empresa?</h2>
                    <a onclick="pop()" class="close">Cerrar</a>
                    <a href="../controlador/c_eliminar_tipo_empresa.php?id=<?php echo $_GET["id"]; ?>" class="btn_ok">Borrar</a>
                </div>
            </div>

        </div>
   </section>

   <script type="text/javascript">
      var c = 0;

      function pop() {
        if( c == 0 ){
          document.getElementById("box").style.display = "block";
          c = 1;
        }else{
          document.getElementById("box").style.display = "none";
          c = 0;
        }
      }
   </script>

</body>
</html>