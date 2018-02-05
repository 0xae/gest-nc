angular.module("app")
.controller("SugestionController", ['$http', '$scope', function ($http, $scope) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';

    $scope.acceptComplaint = function(id, index, label) {
        if (!confirm("Confirmar aceitacao?")) return;
        var req = {id: id, state: TRATAMENTO};

        $http.post('/arfa/web/app_dev.php/administration/Sugestion/update_state/'+id, req)
        .then(function (data){
            $.notify(label+" aceite para tratamento.", "success");            
            $("#row-" + id).remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.rejectComplaint = function(id, index, label) {        
        if (!confirm("Confirmar rejeicao?")) return;
        var req = {
            id: id,
            state: REJEITADO,
            rejectionReason: 'sem justificativas'
        };

        $http.post('/arfa/web/app_dev.php/administration/Sugestion/update_state/'+id, req)
        .then(function (data){
            $("#row-" + id).remove();            
            $.notify(label+" rejeitado!", "warning");
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);