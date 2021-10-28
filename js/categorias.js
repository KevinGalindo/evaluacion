window.onload = function()
{
    angular.element( document.getElementById( 'id' ) ).scope().mostrar_cate();
}

var app = angular.module( "appcate", [] );

app.controller( "controlador",
["$scope", "$http" , //Inyecion de dependencias...

 function( $scope, $http ){

        $scope.mostrar_cate = function()
        {
            //console.log($scope.mitexto);
            console.log( "intento " + $scope.informacion);

            $http.get( '../controlador/categorias.php?id=' + $scope.mitexto ).then(
                function( response )
                {
                    $scope.informacion = response.data.records;
                    //console.log( $scope.mitexto );
                    console.log( "datos " + $scope.informacion);
                }
            );

            }
    }
    
]
);