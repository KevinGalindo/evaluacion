<?php 

    $conexion = conexion::conectar();
    
    $idpro = $_REQUEST['id'];
    

   $query_img = mysqli_query($conexion,"SELECT cod_imagen, imagen FROM pro_imagenes WHERE id_productos = $idpro");
   $result = mysqli_num_rows($query_img);
   $data = mysqli_fetch_array($query_img);

   
    if(isset($_REQUEST['btn-agregar']))
   {
       //esto se encarga de almasenar la imagen en la carpeta de archivos
     $nombre_imagen=$_FILES['foto']['name'];
     $temporal=$_FILES['foto']['tmp_name'];
     $carpeta='../img/producto';
     $ruta=$carpeta.'/'.$nombre_imagen;
     move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
     
     
     $query="UPDATE pro_imagenes SET imagen='$ruta' WHERE id_productos='$idpro';";
     $execute=mysqli_query($conexion,$query) or die(mysqli_error($conexion));


     if($execute){
         header("Location: ../vista/v_editar_producto.php?id=$idpro");
     }else{
         echo "Hubo un error";
     }
   }


?>