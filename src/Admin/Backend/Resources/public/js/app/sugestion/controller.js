angular.module("app")
.factory("SugestionService", ['$http', function ($http){
    function getById(id) {
        return $http.get('/arfa/web/app_dev.php/administration/Sugestion/' + id +'/json')
        .then(function (resp){
            var data = resp.data;
            return data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    return { 
        get: getById
    };
}])

.controller("SugestionViewController", ['SugestionService', '$scope', function (SugestionService, $scope) {
    var url = new URL(location.href);
    var isNew=url.searchParams.get('is_new');

    if (isNew) {
        $.notify("Objecto guardado com sucesso", "success");
    }
}])

.controller("SugestionController", ['SugestionService', '$scope','Admin', 
function (SugestionService, $scope, Admin) {
    $scope.viewSugestion = function (id, label) {
        $scope.entity = undefined;
        SugestionService.get(id)
        .then(function (data){
            $scope.entity = data;
            if (data.type == 'reclamacao') { // reclamacao
                $scope.modalTitle = "Visualizando Reclamação";
            } else { // sugestao
                $scope.modalTitle = "Visualizando Sugestão";                
            }
            $('#viewSugestionModal').modal();
        });
    }

    $scope.NO_RESPONSE = Admin.stage.NO_RESPONSE;
    $scope.RESPONDED = Admin.stage.RESPONDED;
}])

;
