angular.module("app")
.controller("SugestionViewController", ['$http', '$scope', function ($http, $scope) {
    var url = new URL(location.href);
    var isNew=url.searchParams.get('is_new');

    if (isNew) {
        $.notify("Objecto guardado com sucesso", "success");
    }
}])

.controller("SugestionController", ['$http', '$scope','Admin', function ($http, $scope, Admin) {
    $scope.viewSugestion = function (id, label) {
        $scope.entity = undefined;
        $http.get('/arfa/web/app_dev.php/administration/Sugestion/' + id +'/json')
        .then(function (resp){
            var data = resp.data;
            $scope.entity = data;
            if (data.type == 'reclamacao') { // reclamacao
                $scope.modalTitle = "Visualizando Reclamação";
            } else { // sugestao
                $scope.modalTitle = "Visualizando Sugestão";                
            }
            $('#viewSugestionModal').modal();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.NO_RESPONSE = Admin.stage.NO_RESPONSE;
    $scope.RESPONDED = Admin.stage.RESPONDED;
}])

;
