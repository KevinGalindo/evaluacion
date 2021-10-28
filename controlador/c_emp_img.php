<?php 

    $conexion = conexion::conectar();
    
    $idemp = $_REQUEST['id'];
    

   $query_img = mysqli_query($conexion,"SELECT cod_imagen, imagen FROM gal_imagenes WHERE nit_empresa = $idemp");
   $result = mysqli_num_rows($query_img);
   $data = mysqli_fetch_array($query_img);

   
    if(isset($_REQUEST['btn-agregar']))
   {
       //esto se encarga de almasenar la imagen en la carpeta de archivos
     $nombre_imagen=$_FILES['foto']['name'];
     $temporal=$_FILES['foto']['tmp_name'];
     $carpeta='../img/empresas';
     $ruta=$carpeta.'/'.$nombre_imagen;
     move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
     
     
     $query="UPDATE gal_imagenes SET imagen='$ruta' WHERE nit_empresa='$idemp';";
     $execute=mysqli_query($conexion,$query) or die(mysqli_error($conexion));


     if($execute){
         header("Location: ../vista/v_editar_empresa.php?id=$idemp");
     }else{
         echo "Hubo un error";
     }
   }


?>