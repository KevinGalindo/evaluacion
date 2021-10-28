 <?php

    include ("../clases/conexion.php"); 
    $conexion = conexion::conectar();

    header("Content-Type: application/json; charset=UTF-8");

    $id = "";
    $renglon = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $result = $conexion->query( "SELECT * FROM vi_empresas ORDER BY nombre_empresa asc" );

    echo json_encode($result->fetch_all(MYSQLI_ASSOC))

    /**CREATE VIEW vi_empresas AS
    SELECT 
    t1.nit_empresa, t1.nombre_empresa, t2.tipo_empresa, t3.imagen
    FROM empresas t1
    JOIN tipo_empresa t2 ON t1.id_tipo_empresa = t2.id_tipo_empresa
    JOIN gal_imagenes t3 on t1.nit_empresa = t3.nit_empresa */

 ?>