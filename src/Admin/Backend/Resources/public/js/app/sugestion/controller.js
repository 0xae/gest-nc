angular.module("app")
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
