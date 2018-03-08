angular.module("app")
.controller("IReclController", ['$http', '$scope','Admin', function ($http, $scope, Admin) {
    function getRecl(id) {
        return $http.get('/arfa/web/app_dev.php/administration/IReclamation/' + id +'/json')
        .then(function (resp){
            return resp.data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.viewIRecl = function (id, type) {
        var labelX = 'Reclamacao Interna';
        $scope.entity = undefined;
        getRecl(id).then(function (data){
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + labelX;
            $('#viewIRECLModal').modal();
        });
    }

    $scope.favorable = function (id, label) {
        getRecl(id).then(function (data){
            console.info(data);
        });
    }

    $scope.notFavorable = function (id, label) {
        if (!confirm("Confirmar " + label + " como nao favoravel ?")){
            return;
        }
    }
}]);
