<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar admin</title>
    <link rel="stylesheet" type ="text/css" href="../css/register_admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>

    
    <?php include("../controlador/register_admin.php");?>

    <section id="container">

        
        <form action = "" id="regis"  method="POST" class="register-form">
            <?php echo isset($aler) ? $aler : ""; ?>
            
            <div class="logo">
              <img class="logo1" src="../img/logo.png" alt="">
            </div>   
            
            <div id="grupo__nombre">
                <div id="grupo_nombre" class="txtb">
                    <input type="text" name="nombre_admin">
                    <span data-placeholder="Usuario"></span>
                </div>
                <div class="error_ins"><p>El usuario puede tener letras, numeros, guion y guion_bajo.</p></div>
            </div>

            <div id="grupo__email">
                <div id="grupo_email" class="txtb">
                    <input type="email" name="correo_administrador">
                    <span data-placeholder="Gmail"></span>
                </div>
                <div class="error_ins"><p>El correo tiene que ser de 4 o mas digitos y solo puede contener numeros, letras y guion bajo.</p></div>
            </div>

            <div id="grupo__password">
                <div id="grupo_password" class="txtb">
                    <input type="password" name="contrasena_administrador">
                    <span data-placeholder="Contraseña"></span>
                </div>
                <div class="error_ins"><p>La contraseña tiene que ser de 4 o 15 digitos.</p></div>
            </div>

            <input type="hidden" name="rol" value="1">

            <input onclick="pop()" value="Registrar" type="submit" class="logbtn"  disabled>
        </form>

        <script src="../js/admin.js"></script>

        <script type="text/javascript">
        $(".txtb input").on("focus",function(){
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur",function(){
            if($(this).val() == "")
            $(this).removeClass("focus");
        });
        </script>

        <!--<script>
         var c = 0;

        function pop() {
            if(c == 0){
                document.getElementById('alert').style.display = "block";

                c = 1;
            }
        }
        </script>-->

    </section>

</body>
</html>