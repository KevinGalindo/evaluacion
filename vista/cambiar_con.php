<?php
    
    include('../clases/conexion.php');
    $conexion = conexion::conectar();

    $alert = "";

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        
        $email = $_GET['email']; //Email
        $hash = $_GET['hash']; //Codigo

        $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador WHERE correo_administrador = '$email'");

        $data = mysqli_fetch_array($query);

        if( $data > 0 ){
            
            if(isset($_POST['contrasena_administrador']) && !empty($_POST['contrasena_administrador'])){
                
                $password = md5($_POST['contrasena_administrador']);

                $sql = mysqli_query($conexion, "UPDATE acceso_administrador
                                                SET contrasena_administrador = '$password'
                                                WHERE correo_administrador = '$email'");

                if($sql){
                    $alert ='<div id="alert"><a href="../" class="close">Iniciar sesión</a></div>';
                }else{
                    $alert ='<div id="alert"><p>Fatal Error.</p><a class="close">Cerrar</a></div>';
                }
            }else{
            
            }

        }else{
           
            header( "location: ../" );
        }
    }else{
        
        header( "location: ../" );
    }

?>

<html lang="es" >
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title>Iniciar sesión</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8" ></script>
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type ="text/css" href="../css/cam_con.css">

    </head>

    <body>
        <div class="cam_con">

            <h6>Nueva Contraceña</h6> 

            <form action="" method="POST" id="cam_con">
                <?php echo isset($alert) ? $alert : ""; ?>

                <div class="textbox" id="grupo__password">

                    <input type="password" class="int" name="contrasena_administrador" id="password" placeholder="Contraseña">
                    <div class="error_ins"><p>La contraseña tiene que ser de 4 o 15 digitos.</p></div>
                    
                </div>

                <div class="textbox" id="grupo__password2">
                    <input type="password" class="int" name="password2" id="password2" placeholder="Confirma Contraseña">
                    <div class="error_ins"><p>La contraseña debe ser la misma.</p></div>
                    
                </div>

                <input type="submit" value="Enviar Correo" class="re_btn"  disabled>
            </form>
        </div>
           
    </body>

    <script src="../js/cam_con.js"></script>

</html>