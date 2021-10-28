<?php include ("../controlador/emp_img.php"); ?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir imagen</title>
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    <link rel = "stylesheet" type = "text/css" href="../css/subir_img.css">
    
</head>

<body>

<?php  include("v_menu.php"); ?>

<div class="subir_img">
    
    <form action = ""  method="post" enctype="multipart/form-data" > 
        <div class="file-field input-field">
                 <div class="btn-small amber darken">
                    <br><input type="file" name="foto"  class="inputfile inputfile-7" id="foto" data-multiple-caption="{count} archivos seleccionados" multiple onchange="vista_preliminar(event)">
                    <label for="foto"><br>
                    <span class="iborrainputfile"></span>
                    <strong>
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <p>Seleccionar archivo</p>
                    </strong>
                    </label>
                 </div>
        </div>
             <div class = "imagin"> 
                 <br><img src="<?php echo $data["imagen"];?>" src="" alt="" id="img-foto"> 
             </div>
                
             <div class="input-field2">
                 
            <br><button type="submit"  class="botones_seccion_editar" name="btn-agregar" >Agregar</button>
            <a href="v_empresas_admin.php?id=<?php echo $idemp ?>">Regresar</a>
        

            <br> 
                <br>
                <br>
                <br>
                <br>
                <br>
             </div>  

                <script>
                    let vista_preliminar = (event)=>{
                    let leer_img = new FileReader();
                    let id_img = document.getElementById('img-foto');

                    leer_img.onload = ()=>
                    {

                      if(leer_img.readyState == 2)
                      {

                         id_img.src = leer_img.result

                      }                    

                    }
                    leer_img.readAsDataURL(event.target.files[0])
                }
                
                </script>

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
                </script>
    </form>

</div>

</body>