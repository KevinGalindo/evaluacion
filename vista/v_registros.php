<!DOCTYPE html>
<html lang="es" ng-app="li_us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    
    <script src="../js/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/lis_usuarios.js"></script>
    <link rel = "stylesheet" type = "text/css" href="../css/li_usuarios.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
</head>
<body>
<?php include( "v_menu.php" );?>

    <div class="li_usuario" ng-controller="controlador">
        <div class="box">
            <h6>Lista de usuarios</h6>
            <div class="hiden">
            <a href="" id="arc" ng-click="cargar_us()" >boton</a>
            </div>
            

            <div class="lista" id="lista">
                <ul>

                    <li ng-repeat="datos in listaUsuariosAdmin">
                        <span class="usuario">{{datos.nombre_admin}}</span>
                        <span class="correo">{{datos.correo_administrador}}</span>
                        <span></span>
                        <span><i class="fas fad fa-crown"></i></span>
                    </li>

                    <li ng-repeat="datos in listaUsuarios2">
                        <span class="usuario">{{datos.nombre_admin}}</span>
                        <span class="correo">{{datos.correo_administrador}}</span>
                        <span><a href="blockUS.php?id={{datos.id_admin}}"><i class="fas fab fa-lock-open"></i></a></span>
                        <span><a href="b_usuario.php?id={{datos.id_admin}}" ><i class="fas fae fa-trash-alt"></i></a></span>
                    </li>

                    <li ng-repeat="datos in listaUsuariosBlock">
                        <span class="usuario">{{datos.nombre_admin}}</span>
                        <span class="correo">{{datos.correo_administrador}}</span>
                        <span><a href="desBlock.php?id={{datos.id_admin}}"><i class="fas fac fa-lock"></i></a></span>
                        <span><a href="b_usuario.php?id={{datos.id_admin}}" ><i class="fas fae fa-trash-alt"></i></a></span>
                       
                    </li>

                </ul>     
            </div>
        </div>
       
    </div>
    <!--<script type="text/javascript">
      var c = 0;

        function pop() {
        if( c == 0 ){
            document.getElementById("lista").classList.add('active');
            document.getElementById("box").classList.add('active');
            c = 1;
        }else{
            document.getElementById("box").classList.remove('active');
            document.getElementById("lista").classList.remove('active');
            c = 0;
        }
        <span><div id="box" class="boxal">
                            <h2>¿Esta seguro de borrar este usuario?</h2>
                            <a class="close" onclick="pop()">Cerrar</a>
                            <a href="../controlador/borrar_us.php?id={{datos.id_admin}}" class="btn_ok">Borrar</a>
                        </div></span>
    }
    </script>-->
    
    <?php require_once "../vista/footer_admin.html"; ?>
</body>
</html>