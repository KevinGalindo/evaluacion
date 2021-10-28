<?php
/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/
//Esta línea es para la conexión de datos.
include ("../clases/conexion.php"); 
        $conexion = conexion::conectar();
    
if(!empty($_POST))
{
    $aler="";
    if(empty($_POST['nit_empresa']) OR empty($_POST['nombre_empresa']) OR empty($_POST['descripcion_empresa']) OR empty($_POST['numero_contacto']) OR empty($_POST['direccion']) OR empty($_POST['id_tipo_empresa']))
    {
        $aler='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{
           
        $a = $_POST[ 'nit_empresa' ];
        $b = $_POST[ 'nombre_empresa' ];
        $c = $_POST[ 'descripcion_empresa' ];
        $d = $_POST[ 'numero_contacto' ];
        $e = $_POST[ 'direccion' ];
        $f = $_POST[ 'id_tipo_empresa' ];
        $g = $_POST[ 'estado_produccion' ];

        $query = mysqli_query($conexion, "SELECT * FROM empresas WHERE nombre_empresa = '$b' AND nit_empresa != '$a';");
        
        $result = mysqli_fetch_array($query);
        //echo $result;
        //if para evitar que la informacion insertada se repita.
        if($result > 0){
            $aler='<p class="msg_error">La Empresa ya existe.</p>';
        }else{
            //Esta línea es para armar un sql que se va a ejecutar.
    
            $sql = "UPDATE empresas
                    SET nombre_empresa= '$b', descripcion_empresa='$c', numero_contacto='$d', direccion ='$e', id_tipo_empresa='$f', estado_produccion='$g'
                    WHERE nit_empresa = '$a'";
            $query_insert = $conexion->query( $sql );
        //echo($query_insert);
            // if para rediccionar si la información es insertada de manera correcta.
            if($query_insert){
                header( "location: ../vista/v_lista_empresas_admin.php" );    
            }else{
                $aler='<p class="msg_error">Error al editar empresa.</p>';
            }
        }
    }
}

if(empty($_GET['id']))
{
    header("location: v_tabla_empresas.php");
}
$idemp = $_GET['id'];

    $sql = mysqli_query($conexion, "SELECT t1.nit_empresa , t1.nombre_empresa , t1.descripcion_empresa , t1.numero_contacto , t1.direccion , t2.tipo_empresa , t1.estado_produccion  
                                    FROM empresas t1 join tipo_empresa t2 on t1.id_tipo_empresa = t2.id_tipo_empresa
                                    WHERE t1.nit_empresa = $idemp");

    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0 )
    {
        header("location: v_tabla_empresas.php");
    }else{
        while($data = mysqli_fetch_array($sql)){

            $nit_empresa = $data['nit_empresa'];
            $nombre = $data['nombre_empresa'];
            $des = $data['descripcion_empresa'];
            $numero = $data['numero_contacto'];
            $direccion = $data['direccion'];
            $tipo = $data['tipo_empresa'];
            $estado = $data['estado_produccion'];

        }
    }
?>