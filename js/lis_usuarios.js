window.onload = function()
{
    angular.element( document.getElementById( 'arc' ) ).scope().cargar_us();
}

console.log("mi aric");

var app = angular.module( "li_us", [] );

app.controller( "controlador",
["$scope", "$http" , //Inyecion de dependencias...

 function( $scope, $http ){

    //$scope.listaUsuarios;
    $scope.listaUsuarios2;
    $scope.listaUsuariosAdmin;
    $scope.listaUsuariosBlock;
    test = "2";
    admin = "1";
    blokc = "0";

    $scope.cargar_us = function()
    {
        console.log();

        $http.get( '../controlador/registro.php').then(
            function( response )
            {

                $scope.listaUsuarios = response.data;
                $scope.listaUsuarios2 = $scope.listaUsuarios.filter(x=>x.rol.toLowerCase().includes(test.toLowerCase()));
                $scope.listaUsuariosBlock = $scope.listaUsuarios.filter(x=>x.rol.toLowerCase().includes(blokc.toLowerCase()));
                $scope.listaUsuariosAdmin = $scope.listaUsuarios.filter(x=>x.rol.toLowerCase().includes(admin.toLowerCase()));

                console.log( $scope.listaUsuarios2 );
                /*console.log( "datos " + $scope.informacion);*/
            }
        );

  
    }

    }
    
]
);

