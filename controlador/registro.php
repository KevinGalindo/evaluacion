<?php

include ("../clases/conexion.php"); 
$conexion = conexion::conectar();

header("Content-Type: application/json; charset=UTF-8");

$id = "";
$renglon = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];

}else{
 
}



$result = $conexion->query( "SELECT * FROM acceso_administrador WHERE id_admin !=1 " );

echo json_encode($result->fetch_all(MYSQLI_ASSOC))

?>