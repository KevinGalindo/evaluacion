<?php

include ("../clases/conexion.php"); 
$conexion = conexion::conectar();

header("Content-Type: application/json; charset=UTF-8");

$id = "";
$renglon = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$result = $conexion->query( "SELECT * FROM informe" );

echo json_encode($result->fetch_all(MYSQLI_ASSOC))

?>