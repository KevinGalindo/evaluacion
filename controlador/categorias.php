<?php

    header("Content-Type: application/json; charset=UTF-8");

    include ("../clases/conexion.php"); //incluye la conexion con la base de datos..
    $conexion = conexion::conectar(); // almacena la conexion en una variable..

    $id = "";
    $renglon = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $result = $conexion->query( "SELECT * FROM tipo_empresa WHERE id_tipo_empresa != 1" );

    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
   
   
   
   
   
    /* $sql = "SELECT * FROM tipo_empresa";

    if( $id != "" && $id != "undefined")
    {
        $sql .= "WHERE tipo_empresa LIKE '%".$id."%'";
    }

    $resultado = $conexion->query( $sql );

    while( $fila = mysqli_fetch_array($resultado))
    {
        $renglon.= '{"id_tipo_em":"'.$fila[0].'","tipo_nombre":"'.$fila[1].'"},';
    }

    $salida = '{"records":['.$renglon.']}';

    $salida = str_replace("},]}","}]}", $salida);

    echo $salida;*/
?>