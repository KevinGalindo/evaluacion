<?php
    //Datos de la base de datos
    //backupDatabaseTables("localhost","root", "","proyecto");
    $fecha= Date("Y-m-d H:i:s");
    $lineas = array();
    
    $lineas[] = "-- Copia de seguridad\n";
    $lineas[] = "-- Fecha de creació ".$fecha."\n";
    $lineas[] = "-- IP donde se solicita\n\n";

    $lineas[] ="SET FOREIGN_KEY_CHECKS=0;";
    // Creación de tablas

    $tablas = file_get_contents("base-de-datos2.sql");

    $lineas[] =$tablas;
    $tablasDatos = array();
    include("../clases/conexion.php");
    $co = conexion::conectar();
    $tablassql="show tables";

    $ntablas = $co->query("show tables")->fetch_all(MYSQLI_NUM);
    foreach($ntablas as $tabla){
        $n = $tabla[0];
        $tablasDatos[$n] = $co->query("SELECT * FROM $n")->fetch_all(MYSQLI_ASSOC);
    }
    //se rrecoren las tablas de la base de datos
    foreach($tablasDatos as $cc=>$vv){

        foreach($vv as $fila){
            $campos = "";
            $valores = "";
    
            foreach($fila as $c=>$v){
                $campos .= ", $c";
                $valores .=", '$v'";
            }
            $campos = ltrim($campos, ", ");
            $valores = ltrim($valores, ", ");

            $lineas[] ="Insert INTO $cc($campos) VALUES($valores);\n";
        }
        $lineas[] = "\n";
    }
    $lineas[] ="SET FOREIGN_KEY_CHECKS=1;";

    $handle = fopen ( 'db_empresas' . '.sql' , 'w +' );
    
    //echo count($lineas);
    $li = "";

    
    foreach ( $lineas  as  $linea ) {
        fwrite ( $handle , $linea );
        // echo $ linea;
    }
    
    fclose($handle);

    /*$imgEm = $co->query("SELECT imagen FROM gal_imagenes")->fetch_all(MYSQLI_ASSOC);

    $imgPr = $co->query("SELECT imagen FROM pro_imagenes")->fetch_all(MYSQLI_ASSOC);*/

    $imgEmp = mysqli_query($co, "SELECT imagen FROM gal_imagenes");

    $imgPro = mysqli_query($co, "SELECT imagen FROM pro_imagenes");
   

    //var_dump($imgEm[0]);

    //echo $imgEm[0];

    //exit;
   
    // Creamos un instancia de la clase ZipArchive
    $zip = new ZipArchive();
    // Creamos y abrimos un archivo zip temporal
    $zip->open("copi.zip",ZipArchive::CREATE);
    // Añadimos un directorio
    /*$dir = 'archivo';
    $zip->addEmptyDir($dir);*/
    // Añadimos un archivo en la raid del zip.
    $zip->addFile("db_empresas.sql");

    $zip-> addFile("../img/logo.png");
    $zip-> addFile("../img/logo2.png");

    $zip-> addFile("../img/producto/producto_fon.png");
    $zip-> addFile("../img/empresas/empresa_fon.png");

    //$zip-> addFile("../img/empresas/1.jfif");

    while($data = mysqli_fetch_array($imgEmp)){
                
        $zip-> addFile($data["imagen"]);

    }

    while($data2 = mysqli_fetch_array($imgPro)){
                
        $zip-> addFile($data2["imagen"]);

    }


    /*foreach($imgEm as $m){
        $zip->addFile( $m[1] );
    }*/
    //Añadimos un archivo dentro del directorio que hemos creado
    //$zip->addFile("upload",$dir."/asdfadf");
    // Una vez añadido los archivos deseados cerramos el zip.
    $zip->close();
    // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
    header("Content-type: application/octet-stream");
    header("Content-disposition: attachment; filename=copi.zip");
    // leemos el archivo creado
    readfile('copi.zip');
    // Por último eliminamos el archivo temporal creado
    unlink('copi.zip');//Destruye el archivo temporal
    unlink('db_empresas.sql');

    

?>