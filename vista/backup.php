<!DOCTYPE html>
<html lang="es" ng-app="li_us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backup</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/lis_usuarios.js"></script>
    <link rel = "stylesheet" type = "text/css" href="../css/li_copia.css">
    <link rel = "stylesheet" type = "text/css" href="../css/subir_img.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
</head>
<body>
<?php include( "v_menu.php" );?>

    <div class="li_usuario" ng-controller="controlador">
        <div class="box">
            <h6>Copias de seguridad</h6>
            
            <div class="lista" id="lista">
                <ul>

                    <li>
                        <a href="../backup/copia_seguridad.php">
                            <span><i class="fas fa-clone"></i></span>
                            <span>Crear y descargar copia de seguridad.</span>
                        </a>
                    </li>

                    <li>
                        <a onclick="pop()">
                            <span><i class="fas fa-hdd"></i></span>
                            <span>Instalar copia de seguridad.</span>
                        </a>
                    </li>

                    <li>
                        <a href="../clases/Dtxt.php">

                            <span><i class="fas fa-undo-alt"></i></span>
                            <span>Reiniciar sistema.</span>

                        </a>
                    </li>

                </ul>     
            </div>

            

        </div>

        <div class="subir_img" id="box">

            <form enctype="multipart/form-data" method="post" action="../backup/maneja.php">
            <div class="file-field input-field">
                <div class="btn-small amber darken ">
                <input type="file" class="inputfile inputfile-7 ok" id="zip_file" name="zip_file" />
                <label for="zip_file"><br>
                    <span class="iborrainputfile"></i></span>
                    <strong>
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <p>Subir archivo ZIP </p>
                    </strong>
                </label>
                
                </div>
            </div>
           
                <input type="submit" class="login-btn active" name="submit" value="Subir" />
                <a onclick="pop()" class="btn_ok">Cerrar</a>
            </form>

        </div>
       
    </div>

    
    <?php require_once "../vista/footer_admin.html"; ?>

    <script>
        'use strict';

        ;( function ( document, window, index )
        {
            var inputs = document.querySelectorAll( '.inputfile' );
            Array.prototype.forEach.call( inputs, function( input )
            {
                var label	 = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener( 'change', function( e )
                {
                    var fileName = '';
                    if( this.files && this.files.length > 1 )
                        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                    else
                        fileName = e.target.value.split( '\\' ).pop();

                    if( fileName )
                        label.querySelector( 'span' ).innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });
            });
        }( document, window, 0 ));

        var c = 0;

      function pop() {
        if( c == 0 ){
          document.getElementById("box").classList.add('active');
          c = 1;
        }else{
          document.getElementById("box").classList.remove('active');
          c = 0;
        }
      }
    </script>
</body>
</html>