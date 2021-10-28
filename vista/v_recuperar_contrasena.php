<?php
        
		include('../clases/conexion.php');
        $conexion = conexion::conectar();

    $msg = '';
    $msgl = '';
    $alert = '';
        
    if(!empty($_POST['email'])){

        $email = $_POST['email'];

        $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador WHERE correo_administrador = '$email';");

        $data = mysqli_fetch_array($query);

        if($data > 0){
            
            $nombre = $data['nombre_admin'];
            $hash = $data['hash'];
            $to = $email;
            $subject = 'Cambio de contraseña';
            $message = "
            
            Da click en el enlace que esta abajo para cambiar tu contraceña

            -------------------------------------------------------------------
            Usuario: $nombre

            correo: $email
            -------------------------------------------------------------------

            Por favor has click en el enlace para cambiar tu contraceña.

            https://fondoempresas.000webhostapp.com/vista/cambiar_con.php?email=$email&hash=e5f6ad6ce374177eef023bf5d0c018b6
            ";

            $from = "From: " . "reypekka256@gmail.com" ;

            //echo $message;

            $mail = mail($to, $subject, $message, $from);
            if($mail){
                $alert ='<div id="alert"><p>Correo enviado satisfactoriamente a  '.$to.'</p><a class="close">Cerrar</a></div>';
            }else{
                $alert ='<div id="alert"><p>Error en el envio a  '.$to.'</p><a class="close">Cerrar</a></div>';
            }
            
            
            

        }else{
            $alert ='<div id="alert"><p>El correo no existe.</p><a class="close">Cerrar</a></div>';
        }

    }
        
        /*try{
			if(isset($_POST['email']) && !empty($_POST['email'])){
                $pass = substr( md5(microtime()), 1, 32);
                $mail = $_POST['email'];
                
                //Conexion con la base
                
                $query = mysqli_query($conexion, "SELECT * FROM acceso_administrador WHERE correo_administrador = '$mail';");
                $result = mysqli_fetch_array($query);

               

                if($result < 0){
                    echo "El correo no existe ";
                }else{
                // Check connection
                if ($conexion->connect_error) {
                    die("Connection failed: " . $conexion->connect_error);
                } 
                
                $sql = mysqli_query($conexion, "UPDATE acceso_administrador SET contrasena_administrador='$pass' WHERE correo_administrador='$mail'");

                

                if ($conexion->query($sql) === TRUE) {
                    echo "usuario modificado correctamente ";
                } else {
                    echo "Error modificando: " . $conexion->error;
                }
                
                $to = $_POST['email'];//"destinatario@email.com";
                $from = "From: " . "reypekka256@gmail.com" ;
                $subject = "Recordar contraseña";
                $message = "El sistema le asigno la siguiente clave " . $pass;

                mail($to, $subject, $message, $from);
                echo 'Correo enviado satisfactoriamente a ' . $_POST['email'];
                }
            }
            else 
                echo 'Informacion incompleta';
		}
		catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}*/
            
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8" ></script>
        <link rel="stylesheet" type="text/css" href="../css/recuperacion_contrasena.css">
        <title>Recuperar Contraseña.</title>
    </head>
<body>
    <div class="form_recuperacion_contrasena">
        <div id="recuperacion_contrasena">

            <h6>Recuperar Constraseña</h6>

            <form action="" id="re_con" method="post">
                <?php echo isset($alert) ? $alert : ""; ?>
                <div class="textbox" id="grupo__email">
                    <input class="int" type="email" name="email" placeholder="Email">
                    <div class="error_ins"><p>El correo tiene que ser de 4 o mas digitos y solo puede contener numeros, letras y guion bajo.</p></div>
                </div>

                <input type="submit" value="Enviar Correo" class="re_btn"  disabled>
                <div class="privacy-link">
                    <a href="../">Regresar.</a>
                </div>
            </form>

        </div>
    </div>

    <script src="../js/re_contra.js"></script>
</body>
</html>