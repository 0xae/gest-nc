angular.module("app")
.controller("AcompanhamentoController", ['$http', '$scope', function ($http, $scope) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';

    var type = 'Complaint';
    $scope.setType = function (v) {
        console.log("changing type to: ", v);
        type = v;
    }

    $scope.acceptObj = function(obj) {
        if (!confirm("Confirmar aceitacao?")) return;
        var req = {id: obj.id, state: TRATAMENTO};
        $http.post('/arfa/web/app_dev.php/administration/'+type+'/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(obj.code+" aceite para tratamento.", "success");            
            $("#row-" + obj.id).remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.rejectObj = function(obj) {
        $scope.mObject = obj;
        $('#rejectModal').modal();
    }

    $scope.rejectSubmit = function() { 
        if (!confirm("Confirmar rejeicao?")) return;
        var req = {
            id: $scope.mObject.id,
            state: REJEITADO,
            rejectionReason: $scope.rejectForm.response
        };

        $http.post('/arfa/web/app_dev.php/administration/'+type+'/update_state/'+req.id, req)
        .then(function (data){
            $.notify($scope.mObject.code+" rejeitado!", "warning");
            $scope.mObject.response = '';
            $("#row-" + req.id).remove();
            $('#rejectModal').modal('hide');
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);