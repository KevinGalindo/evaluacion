<?php
/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/


include ("../clases/conexion.php"); //Incluye la conexion en el controlador.. 
$conexion = conexion::conectar(); //Almacena la conexion en una variable
    

if(!empty($_POST)) //verifica que el $_post no venga vacio
{
    $aler = ""; //Declara la alerta en caso de algun error..

    //Este if verifica que todos los campos vengan llenos..
    if( empty($_POST['nombre_empresa']) OR empty($_POST['descripcion_empresa']) OR empty($_POST['numero_contacto']) OR empty($_POST['direccion']) OR empty($_POST['id_tipo_empresa']) OR empty($_POST['estado_produccion']))
    {
        $aler='<p class="msg_error">Todos los campos son obligatorios.</p>'; //En caso de que un campo este vacio muestra este $alert..
    }else{
           
        $a = $_POST[ 'nit_empresa' ];
        $b = $_POST[ 'nombre_empresa' ];
        $c = $_POST[ 'descripcion_empresa' ];
        $d = $_POST[ 'numero_contacto' ];
        $e = $_POST[ 'direccion' ];
        $f = $_POST[ 'id_tipo_empresa' ];
        $g = $_POST[ 'estado_produccion' ];

        $query = mysqli_query($conexion, "SELECT * FROM empresas WHERE nit_empresa = '$a' OR nombre_empresa = '$b' ");
        $result = mysqli_fetch_array($query);

        //if para evitar que la informacion insertada se repita..
        if($result > 0){

            $aler='<p class="msg_error">La Empresa ya existe.</p>'; //En caso de que la empresas ya exista mostraria la variable alert..

        }else{
            
            //Esta línea es para armar un sql que se va a ejecutar.
            $sql = "INSERT INTO empresas( nombre_empresa, descripcion_empresa, numero_contacto, direccion, id_tipo_empresa, estado_produccion)
                                                                VALUES(  '$b' , '$c','$d','$e','$f','$g')";
            $query_insert = $conexion->query( $sql );

            // if para rediccionar si la información es insertada de manera correcta.
            if($query_insert){
            
                $id_ultimo=mysqli_insert_id($conexion);

                $query_img = mysqli_query($conexion,"INSERT INTO gal_imagenes (nit_empresa) values('$id_ultimo')");

                if($query_img){
    
                    header( "location: ../vista/v_lista_empresas_admin.php" );

                }else{
                    $aler='<p class="msg_error">Error al insertar img.</p>';
                }
                 
              /* $aler='<p class="msg_save">Se Inserto Correctamente.</p>';
               echo $id;
                $aler.='<p class="msg_save"><a h href="../vista/v_tabla_empresas.php">Ver tabla</a></P>'; */  

            }else{
                $aler='<p class="msg_error">Error al insertar empresa.</p>';
            }
        }
    }
}