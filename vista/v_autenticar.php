<?php 
    /*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */

    require_once "../controlador/auten_login.php";
 
?>

<?php //Esta es la vista de la autenticacion la cual nos permitira ingresar datos para su posterior validacion ?>

<html lang="es" dir="ltr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title>Iniciar sesión</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8" ></script>
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type ="text/css" href="../css/register_login.css">

    </head>

    <body>

        <div class="login-form">
            <div class="logo"><img  src="../img/logo.png" alt=""></div>

            <h6>Iniciar sesión</h6>

            <form action="" method="POST" id="iniciar">
            <?php echo isset($alert2) ? $alert2 : ""; ?>

                <div class="textbox" id="grupo__email">
                    <input type="text" class="int" name="correo_administrador" id="email" placeholder="Email">
                    <div class="error_ins"><p>El correo tiene que ser de 4 o mas digitos y solo puede contener numeros, letras y guion bajo.</p></div>
                    
                </div>

                <div class="textbox" id="grupo__password">
                    <input type="password" class="int" name="contrasena_administrador" id="password" placeholder="Contraseña">
                    <div class="error_ins"><p>La contraseña tiene que ser de 4 o 15 digitos.</p></div>
                    
                </div>

                <input id="in_btn" type="submit" value="Inicia sesión" class="login-btn" disabled>
                <div class="privacy-link">
                    <a href="../vista/v_recuperar_contrasena.php">Olvide mi contraseña.</a>
                </div>
            </form>

            <div class="dont-have-account">
                No tengo cuenta?
                <a>Inscribirse</a>
            </div>
        </div>

        <div class="login-insert">
            <div class="logo"><img  src="../img/logo.png" alt=""></div>

            <div class="social-media">

            </div>

            <h6>Registrarse</h6>

            <form action="" method="REQUEST" id="regis">
            <?php echo isset($aler) ? $aler : ""; ?>

                <div class="register-box" id="grupo2__nombre">
                    <input type="text" class="int" name="nombre_admin" placeholder="Usuario">
                    <div class="error_ins"><p>El usuario puede tener letras, numeros, guion y guion_bajo</p></div>
                </div>

                <div class="register-box" id="grupo2__email">
                    <input type="text" class="int" name="correo_administrador" placeholder="Email">
                    <div class="error_ins"><p>El correo tiene que ser de 4 o mas digitos y solo puede contener numeros, letras y guion bajo.</p></div>
                </div>

                <div class="register-box" id="grupo2__password">
                    <input type="password" class="int" name="contrasena_administrador" placeholder="Contraseña">
                    <div class="error_ins"><p>La contraseña tiene que ser de 4 o 15 digitos.</p></div>
                </div>

                <div class="register-box" id="grupo2__terminos">
                    <label for="" class="remember-me" >
                        <span class="checkbox">
                        <input type="checkbox" name="terminos" id="terminos" require>
                            <span class="checked"></span>
                        </span>      
                        <label onclick="pop()">Terminos y codiciones de uso</label> 
                    </label>
                </div>

                <input id="re_btn" type="submit" value="Registrarse" class="regist-btn" disabled>
                <div class="privacy-link">
                    <a href="#"></a>
                </div>
            </form>

            <div class="dont-have-account">
                Ya tienes cuenta?
                <a>Iniciar sesión</a>
            </div>

            
        </div>

        <div class="terminos_con" id="caja" onclick="pop()">    
            <div class="terminos_text">
                <h1>Terminos y codiciones de uso</h1>
                <div class="contenido_text">
                    <h2>Propietario de la página web, la oferta y el enlace de los Términos</h2>
                    <p>Esta página web es propiedad y está operado por Fondo Emprender. Estos Términos establecen los términos y condiciones bajo los cuales tú puedes usar nuestra página web y servicios ofrecidos por nosotros. Esta página web ofrece a los visitantes ver la información de las empresas aliadas con Fondo Emprender para así darlas a conocer, por consiguiente puedan contactar con ellas para hacer, ya sea, compras directas con esas empresas o preguntas sobre sus productos. Al acceder o usar la página web de nuestro servicio, usted aprueba que haya leído, entendido y aceptado estar sujeto a estos Términos:</p>
                    <h2>¿Cuáles son los requisitos para crear una cuenta?</h2>
                    <p>Para usar nuestra página web y / o recibir nuestros servicios, debes tener al menos 18 años de edad, o la mayoría de edad legal en tu jurisdicción, y poseer la autoridad legal, el derecho y la libertad para participar en estos Términos como un acuerdo vinculante. No tienes permitido utilizar esta página web y / o recibir servicios si hacerlo está prohibido en tu país o en virtud de cualquier ley o regulación aplicable a tu caso.</p>
                    <h2>Retención del derecho a cambiar de oferta</h2>
                    <p>Podemos, sin aviso previo, cambiar los servicios; dejar de proporcionar los servicios o cualquier característica de los servicios que ofrecemos; o crear límites para los servicios. Podemos suspender de manera permanente o temporal el acceso a los servicios sin previo aviso ni responsabilidad por cualquier motivo, o sin ningún motivo.</p>
                    <h2>Posesión de propiedad intelectual, derechos de autor y logos.</h2>
                    <p>El Servicio y todos los materiales incluidos o transferidos, incluyendo, sin limitación, software, imágenes, texto, gráficos, logotipos, patentes, marcas registradas, marcas de servicio, derechos de autor, fotografías, audio, videos, música y todos los Derechos de Propiedad Intelectual relacionados con ellos, son la propiedad exclusiva de Fondo Emprender. Salvo que se indique explícitamente en este documento, no se considerará que nada en estos Términos crea una licencia en o bajo ninguno de dichos Derechos de Propiedad Intelectual, y tu aceptas no vender, licenciar, alquilar, modificar, distribuir, copiar, reproducir, transmitir, exhibir públicamente, realizar públicamente, publicar, adaptar, editar o crear trabajos derivados de los mismos.</p>
                    <h2>Derecho a suspender o cancelar la cuenta de usuario</h2>
                    <p>Podemos terminar o suspender de manera permanente o temporal tu acceso al servicio sin previo aviso y responsabilidad por cualquier razón, incluso si a nuestra sola determinación tu violas alguna disposición de estos Términos o cualquier ley o regulación aplicable. Puedes descontinuar el uso y solicitar cancelar tu cuenta y / o cualquier servicio en cualquier momento.</p>
                    <h2>Indemnización</h2>
                    <p>Usted acuerda indemnizar y eximir de responsabilidad a Fondo Emprender de cualquier demanda, pérdida, responsabilidad, reclamación o gasto (incluidos los honorarios de abogados) que terceros realicen en tu contra como consecuencia de, o derivado de, o en relación con tu uso de la página web o cualquiera de los servicios ofrecidos en la página web.</p>
                    <h2>Limitación de responsabilidad</h2>
                    <p>En la máxima medida permitida por la ley aplicable, en ningún caso Fondo Emprender será responsable por daños indirectos, punitivos, incidentales, especiales, consecuentes o ejemplares, incluidos, entre otros, daños por pérdida de beneficios, buena voluntad, uso, datos. u otras pérdidas intangibles, que surjan de o estén relacionadas con el uso o la imposibilidad de utilizar el servicio.</p>
                    <h2>Derecho a cambiar y modificar los Términos</h2>
                    <p>Nos reservamos el derecho de modificar estos términos de vez en cuando a nuestra entera discreción. Por lo tanto, debes revisar estas páginas periódicamente. Cuando cambiemos los Términos de una manera material, te notificaremos que se han realizado cambios importantes en los Términos. El uso continuado de la página web o nuestro servicio después de dicho cambio constituye tu aceptación de los nuevos Términos. Si no aceptas alguno de estos términos o cualquier versión futura de los Términos, no uses o accedas (o continúes accediendo) a la página web o al servicio.</p>
                </div>
            </div>
        </div>

        <script>
             var c = 0;

            function pop() {
            if( c == 0 ){
                document.getElementById("caja").classList.add('ok');
                c = 1;
            }else{
                document.getElementById("caja").classList.remove('ok');
                c = 0;
            }
            }
        </script>

        <script src="../js/validar.js"></script>
            
    </body>
</html>