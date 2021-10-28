<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */

    require_once "../clases/conexion.php";
    $conexion = conexion::conectar();

       

$alert2 = "";

session_start();

if(!empty($_SESSION['active']))
{
    header('location: ../vista/v_lista_empresas_admin.php');
}else{
    if(!empty($_POST))
    {
        if(empty($_POST['correo_administrador']) || empty($_POST['contrasena_administrador']) )
        {
            //$alert = 'Ingrese su correo y contraseña.';
        }else{
        
            $admin = mysqli_real_escape_string($conexion, $_POST['correo_administrador']);
            $pass = md5(mysqli_real_escape_string($conexion, $_POST['contrasena_administrador']));

            $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador 
                                                WHERE correo_administrador = '$admin' AND
                                                contrasena_administrador = '$pass'");

            $result = mysqli_num_rows($query);

            if($result > 0)
            {

                $data = mysqli_fetch_array($query);
  
                $_SESSION['active'] = true;
                $_SESSION['idad'] = $data['id_admin'];
                $_SESSION['nombre'] = $data['nombre_admin'];
                $_SESSION['correo'] = $data['correo_administrador'];
                $_SESSION['pass'] = $data['contrasena_administrador'];
                $_SESSION['rol'] = $data['rol'];

                if($_SESSION['rol'] == 1){
                    header('location: v_lista_empresas_admin.php');
                }else{
                    if($_SESSION['rol'] == 2){
                        header('location: lista_empresas.php');
                    }else{
                        if($_SESSION['rol'] == 0){
                            $alert2 ='<div id="alert"><ion-icon name="close"></ion-icon><p>Está cuenta se encuentra temporalmente bloqueada.</p><a class="close">Cerrar</a></div>';
                        }
                    }
                 
                }
                
            }else{
                $alert2 ='<div id="alert"><ion-icon name="close"></ion-icon><p>El correo o la contraseña son incorrectas.</p><a class="close">Cerrar</a></div>';

                session_destroy();
            }
            
        }
    }
}

/*----------------------------------------Register------------------------------------------ */

$aler = ""; // Se clara la variable alert como vacia..
$hash = md5( rand(0 ,1000)); 

if(!empty($_REQUEST))
{

    //Verifica que los datos traidos por el metodo post no esten vacios..
    if(empty($_REQUEST['nombre_admin']) OR empty($_REQUEST['correo_administrador']) OR empty($_REQUEST['contrasena_administrador']))
    {
      //$aler = '<div id="alert"><ion-icon name="close"></ion-icon><p>Todos los campos son obligatorios.</p><a class="close">Cerrar</a></div>'; //Este alert abvierte que los campos estan incompletos..
    }else{

        $a = $_REQUEST['nombre_admin'];
        $b = $_REQUEST['correo_administrador'];
        $c = md5($_REQUEST['contrasena_administrador']);
        $e = $hash;


        $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador WHERE correo_administrador = '$b';");
        $result = mysqli_fetch_array($query);

        //if para evitar que la informacion insertada se repita..
        if( $result > 0 )
        {
            $aler='<div id="alert"><ion-icon name="close"></ion-icon><p>La cuenta ya existe.</p><a class="close">Cerrar</a></div>'; //En caso de que la cuenta ya exista mostraria la variable alert..
        }else{
            
            //Esta linea almacena el codigo sql en la variable sql..
            $sql = "INSERT INTO acceso_administrador( nombre_admin, correo_administrador, contrasena_administrador, hash)
                        VALUES( '$a', '$b' , '$c', '$e')";

            $query_insert = $conexion->query( $sql );

            if($query_insert){
                //header( "location: ../vista/lista_empresas.php" ); 
                //En caso de que la ejecucion este correcta lo redigiria al inicio..

            $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador 
                                                WHERE correo_administrador = '$b' AND
                                                contrasena_administrador = '$c'");

            $result = mysqli_num_rows($query);

            if($result > 0)
            {

                $data = mysqli_fetch_array($query);
  
                $_SESSION['active'] = true;
                $_SESSION['idad'] = $data['id_admin'];
                $_SESSION['nombre'] = $data['nombre_admin'];
                $_SESSION['correo'] = $data['correo_administrador'];
                $_SESSION['pass'] = $data['contrasena_administrador'];
                $_SESSION['rol'] = $data['rol'];

                if($_SESSION['rol'] == 1){
                    header('location: v_lista_empresas_admin.php');
                }else{
                    header('location: lista_empresas.php');
                }
                
            }else{
                $alert = "El correo o la contraseña son incorrectas";
                session_destroy();
            }

               
            }else{
                $aler='<div id="alert"><ion-icon name="close"></ion-icon><p>Error al crear cuenta.</p><a class="close" href="register_admin.php">Cerrar</a></div>';
                //Este alert avisa que se encontro un error en la ejecucion..
            }
        }

    }
}


?>