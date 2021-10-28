<?php

    include("../clases/conexion.php");
    $co = conexion::conectar();

    $imgEmp = mysqli_query($co, "SELECT imagen FROM gal_imagenes");

    $imgPro = mysqli_query($co, "SELECT imagen FROM pro_imagenes");

    while($data = mysqli_fetch_array($imgEmp)){
                
        unlink($data["imagen"]);

    }

    while($data2 = mysqli_fetch_array($imgPro)){
                
        unlink($data2["imagen"]);

    }


//comprobamos si se ha recibido el nombre del ZIP
if ($_FILES["zip_file"]["name"]) 
{
    //obtenemos datos de nuestro ZIP
    $nombre = $_FILES["zip_file"]["name"];
    $ruta = $_FILES["zip_file"]["tmp_name"];
    $tipo = $_FILES["zip_file"]["type"];
 

    $zip = new ZipArchive;
	//en la función open se le pasa la ruta de nuestro archivo (alojada en carpeta temporal)
	if ($zip->open($ruta) === TRUE) 
	{
		//función para extraer el ZIP, le pasamos la ruta donde queremos que nos descomprima
		$zip->extractTo('../');
		$zip->close();

        header( "location: ejecutar-instalacion.php" );
	}
}



?>