<?php 


    include ("../clases/conexion.php"); 
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
         header("Location: ../vista/v_empresas_admin.php?id=$idemp");
     }else{
         echo "Hubo un error";
     }
   }

/* 

//include ("../clases/conexion.php"); 
include ("../controlador/c_insertar_empresa.php"); 
    $conexion = conexion::conectar();


   //$query_img = mysqli_query($conexion,"SELECT max(nit_empresa) as nit_em FROM empresas");

   $query_img = mysqli_query($conexion,"SELECT @@identity AS nit_empresa");
   
   //$result = mysqli_num_rows($query_img);
   
   $data = mysqli_fetch_array($query_img);

   $idemp = mysqli_insert_id($conexion);
   
    if(isset($_REQUEST['btn-agregar']))
   {
       //esto se encarga de almasenar la imagen en la carpeta de archivos
     $nombre_imagen=$_FILES['foto']['name'];
     $temporal=$_FILES['foto']['tmp_name'];
     $carpeta='../img/empresas';
     $ruta=$carpeta.'/'.$nombre_imagen;
     move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
     
     
     $query="INSERT INTO gal_imagenes(cod_imagen, imagen, nit_empresa) VALUES ('','$ruta','$idemp')";
     $execute=mysqli_query($conexion,$query) or die(mysqli_error($conexion));


     if($execute){
         header("Location: ../vista/v_lista_empresas_admin.php");
     }else{
         echo "Hubo un error";
     }
   }*/


?>