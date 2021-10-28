<?php

    include("../controlador/c_editar_empresa.php");
/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
    * Copyright © Todos los derechos reservados
    */
?>
<!------------------------------------------v_Editar_empresa------------------------------------------------------------>
   
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tipo Empresas</title>
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
    <link rel = "stylesheet" type = "text/css" href="../css/secciones_editar.css">
    
</head>

<body>
<?php  include("v_menu.php"); ?>

    <section id="container">

        <div class="insertar_empresa">
        <h1 class="titulos_2">Editar Empresa</h1>

        <!-- Activa la alerta si alguno de los campos no se rellena de forma adecuada -->
        <div class="alert"><?php echo isset($aler) ? $aler : ""; ?></div>
        <form class="form_editar_empresas" action = " "  method="POST"> 

            <!-- Label para referirse a cada campo que debe ser rellenado -->
            <!-- Input para insertar la información deseada en cada campo de la tabla -->
            
            <br><input type = "hidden" name = "nit_empresa" value="<?php echo $nit_empresa ?>" autocomplete="off" maxlength ="5" required>
            <br>Nombre de la empresa
            <br><input class="input_2" type = "text" name = "nombre_empresa" value="<?php echo $nombre ?>" autocomplete="off" maxlength ="50" required> 
            <br>Descripción de la empresa
            <br><textarea class="input_2" name = "descripcion_empresa"  class="int_des" autocomplete="off" maxlength ="1000" required><?php echo $des ?></textarea>
            <br>Numero de contacto
            <br><input class="input_2" type = "text" name = "numero_contacto" value="<?php echo $numero ?>" autocomplete="off" required minlength="10"maxlength="30">
            <br>Dirección de la empresa
            <br><input class="input_2" type = "text" name = "direccion" value="<?php echo $direccion ?>" autocomplete="off" maxlength ="50" required>
        
            <br>Tipo de empresa<br><!-- empieza a dibujar una lista -->
            <br><select name = "id_tipo_empresa"> 

                <?php 
                
                    $sql = "SELECT id_tipo_empresa, tipo_empresa FROM tipo_empresa";/**Utiliza un select para traer dos campos de la tabla tipo_empresa */

                    //ejecuta la consulta
                    $resultado = $conexion->query( $sql );

                    //Recorre los datos que arroja la consulta
                    while( $fila = mysqli_fetch_array( $resultado ) )
                    {

                        $tmp  =  $fila[ 'id_tipo_empresa' ];
                        $tmp2 =  $fila[ 'tipo_empresa' ];

                        //Imprime los items de la lista.
                        if($tipo == $tmp2){
                            echo "<option value='$tmp' selected='selected'> $tmp2 </option>";
                        }else{
                            echo "<option value='$tmp'> $tmp2 </option>";
                        }

                    }

                ?>
            </select><br>  <!-- termina la lista -->
            <br>Estado de producción<br>
            Si hay producción
            <input class="input_radio_insertar_empresa" type="radio" name="estado_produccion" value="1" required <?php echo $estado ?"checked":"" ?>>
            <br>No hay producción
            <input class="input_radio_insertar_empresa" type="radio" name="estado_produccion" value="0"  <?php echo !$estado ?"checked":""?>>

        
            <p><input class="botones_seccion_editar" type="submit" value="Editar Empresa" class="btn_save"></p>
        </form>
        </div>
    </section>
</body>