<!DOCTYPE html>
<html lang="es" ng-app="appbusc">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/buscador.js"></script>
    <link rel = "stylesheet" type = "text/css" href="../css/css_listas2.css">
    <link rel = "stylesheet" type = "text/css" href="../css/inicio.css">
     <title>Buscar empresa</title>
    
</head>
<body>
<?php  include("v_menu_us.php"); ?>

    <div class="contenedor_lis" ng-controller="controlador">

        <section id="container">

            <section class="empres">
                <div class="Top">

                    <div class="Title">
                        <label>Empresas</label>
                        <i class="fas fa-history" ng-click="cargar_datos()"></i>
                        <div class="menu-icon2">
                            <i class="fab fa-buffer" id="cate" ></i>
                        </div>
                    </div>

                    <div class="navigation-menu">
                        <nav>
                            <li ng-repeat="datos in categorias">
                               
                                <a ng-click="cargar_cate2(datos.tipo_empresa)" >{{datos.tipo_empresa}}</a>
                
                            </li>
                        </nav>
                        
                    </div><br>

                    <div class="id_se">
                        <input class="search-text" type="text" id="id" ng-model="buscar" ng-change="cargar_busc()" placeholder=" Buscar...">
                    </div>
                    
                </div>
            <ul class="ListPro" >

                <li class="fa_play" ng-repeat="datos in listaEmpresasFiltro">
                    <a href="v_empresas.php?id={{datos.nit_empresa}}">
                        <figure>
                            <img class="Lazy" src="{{datos.imagen}}">
                        </figure>
                        <h3>{{datos.nombre_empresa}}</h3>
                        <p>{{datos.tipo_empresa}}</p>
                    </a>
                </li>

            </ul>
            </section>

    <script type="text/javascript">
        $(".menu-icon2").click(function(){
    $(this).toggleClass("active");
    $(".navigation-menu").toggleClass("active");
    $(".menu-icon2 i").toggleClass("fas fa-times");
    });

       $(".navigation-menu").click(function(){
    $(this).removeClass("active");
    $(".menu-icon2 i").removeClass("fas fa-times");
   
        });
    </script>

    <?php require_once "../vista/footer.html"; ?>
    
</body>
</html>