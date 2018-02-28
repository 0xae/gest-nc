angular.module("app")
.controller("SugestionViewController", ['$http', '$scope', function ($http, $scope) {
    var url = new URL(location.href);
    var isNew=url.searchParams.get('is_new');

    if (isNew) {
        $.notify("Objecto guardado com sucesso", "success");
    }
}])

.controller("SugestionController", ['$http', '$scope', function ($http, $scope) {
    $scope.viewSugestion = function (id, type) {
        var labelX = 'Reclamacao';
        if (type == 'sugestao') labelX = 'Sugestao';
        $scope.entity = undefined;
        $http.get('/arfa/web/app_dev.php/administration/Sugestion/' + id +'/json')
        .then(function (resp){
            var data = resp.data;
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + labelX;
            $('#viewSugestionModal').modal();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}])

;
