angular.module("app")
.controller("IReclController", ['$http', '$scope','Admin', function ($http, $scope, Admin) {
    var RESPOND_MODAL="#sugestionRespondModal";
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
            $scope.mObject = data;
            $(RESPOND_MODAL).modal();    
        });
    }

    $scope.notFavorable = function (id, label) {
        if (!confirm("Confirmar " + label + " como nao favoravel ?")){
            return;
        }
        var req = {
            id: id,
            state: Admin.stage.NO_RESPONSE
        };

        $http.post('/arfa/web/app_dev.php/administration/IReclamation/update_state/'+id, req)
        .then(function (data){
            $.notify(label+" arquivado com sucesso.", "success");
            $("#row-" + id).addClass('success');
            $("#row-" + id + "-dispatch").remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");
        });
    }

    $scope.submitResponse = function () {
        console.info("send response");
    }
}]);
