<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="../css/instalador.css">
    <title>Instalador</title>
</head>
<body>
<div class="con_ins">
    <form action="ejecutar-instalacion.php">
        <div class="menu">

            <img src="../img/logo.png" class="img_logo"><br>

            <h1>Instalador</h1>
            Nombre servidor <br>
            <input type="text" name="servidor" >
            <div>Nombre usuario</div>
            <input type="text" name="usuario" >
            <br>
            <div>Contraseña</div>
            <input type="text" name="contraseña" >
            <br>
            <div>Base de datos</div>
            <input type="text" name="base-de-datos" >
            <br>
            <button type="submit" class="boton_ins">Instalar</button>
        </div>
    </form>
</div>

</body>
</html>