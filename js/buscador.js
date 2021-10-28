window.onload = function()
{
    angular.element( document.getElementById( 'cate' ) ).scope().cargar_cate();
    angular.element( document.getElementById( 'id' ) ).scope().cargar_datos();
}

console.log("mi aric");


var app = angular.module( "appbusc", [] );

app.controller( "controlador",
["$scope", "$http" , //Inyecion de dependencias...

 function( $scope, $http ){

    $scope.listaEmpresas;
    $scope.listaEmpresasFiltro;
    
    $scope.cargar_datos = function()
    {
        console.log("hola");
        $http.get( '../controlador/lista_empresas.php').then(
            function( response )
            {
                $scope.listaEmpresas = response.data;
                $scope.listaEmpresasFiltro = response.data;

                console.log( $scope.listaEmpresas );
                /*console.log( "datos " + $scope.informacion);*/
            }
        );
    }

    $scope.cargar_busc = function(){
        console.log($scope.buscar);
        $scope.listaEmpresasFiltro = $scope.listaEmpresas.filter(x=>x.nombre_empresa.toLowerCase().includes($scope.buscar.toLowerCase()));

    }

    $scope.cargar_cate2 = function(test){
        console.log(test);
        $scope.listaEmpresasFiltro = $scope.listaEmpresas.filter(x=>x.tipo_empresa.toLowerCase().includes(test.toLowerCase()));
        console.log($scope.listaEmpresasFiltro);
    }

    $scope.cargar_cate = function()
    {
        //console.log("hola");
        $http.get( '../controlador/categorias.php').then(
            function( response )
            {
                $scope.categorias = response.data;

                console.log( $scope.categorias );
                /*console.log( "datos " + $scope.informacion);*/
                $scope.listaEmpresasFiltro = $scope.listaEmpresas.filter(x=>x.tipo_empresa.toLowerCase().includes($scope.categorias));
            }
        );
    }

       // $scope.cargar_busc = function()
       // {
         //    console.log($scope.buscar);
        //     //console.log( "intento " + $scope.informacion);

        //     $http.get( '../controlador/lista_empresas.php?id=' + $scope.buscar).then(
        //         function( response )
        //         {
        //             $scope.informacion = response.data.records;
        //             console.log( "texto " + $scope.buscar );
        //             /*console.log( "datos " + $scope.informacion);*/
        //         }
        //     );

      //  }
    }
    
]
);