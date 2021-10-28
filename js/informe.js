window.onload = function()
{
    angular.element( document.getElementById( 'id' ) ).scope().cargar_info();
}

var app = angular.module( "appdocs", [] );

app.controller( "controlador",
["$scope", "$http" , //Inyecion de dependencias...

 function( $scope, $http ){

    $scope.informe;
    $scope.informeFiltro;
    
        $scope.cargar_info = function()
        {
           
            $http.get( '../controlador/docs.php').then(
                function( response )
                {
                    $scope.informe = response.data;
                    $scope.informeFiltro = response.data;

                    console.log( $scope.listaEmpresas );
                    /*console.log( "datos " + $scope.informacion);*/
                }
            );
        }

        $scope.cargar_busc = function(){
            console.log($scope.mitexto);
            $scope.informeFiltro = $scope.informe.filter(x=>x.indice.toLowerCase().includes($scope.mitexto.toLowerCase()) || x.text.toLowerCase().includes($scope.mitexto.toLowerCase()));
    
        }

        /*if(cargar_busc()){
            console.log("si busca");
        }else{
            console.log("no busca");
        }*/
        /*$scope.cargar_busc = function(){
            console.log($scope.buscar);
            $scope.listaEmpresasFiltro = $scope.listaEmpresas.filter(x=>x.nombre_empresa.toLowerCase().includes($scope.buscar.toLowerCase()));

        }*/

    }
    
]
);