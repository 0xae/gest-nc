angular.module("app")
.controller("IReclController", ['$http', '$scope','Admin', function ($http, $scope, Admin) {
    $scope.viewIRecl = function (id, type) {
        var labelX = 'Reclamacao Interna';

        $scope.entity = undefined;
        $http.get('/arfa/web/app_dev.php/administration/IReclamation/' + id +'/json')
        .then(function (resp){
            var data = resp.data;
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + labelX;
            $('#viewIRECLModal').modal();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

}]);

