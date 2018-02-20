angular.module("app")
.controller("AcompanhamentoController", ['$http', '$scope', function ($http, $scope) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';
    var FAVORAVEL='favoravel';
    var NO_FAVORAVEL='nao_favoravel';
    var NO_COMP='sem_competencia';
    
    var type = 'Complaint';
    var label = 'Queixa/Denuncia';
    $scope.setType = function (v) {
        console.log("changing type to: ", v);
        type = v;
    }

    $scope.setLabel = function (l) {
        label = l;
    }

    $scope.acceptObj = function(obj) {
        if (!confirm("Confirmar " + label + " como favoravel?")){ 
            return;
        }

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

    $scope.markAsNoCompetence = function(id) {
        var obj = {id: id};
        if (!confirm("Confirmar "+label+" como sem competencia?")){ 
            return;
        }          

        var req = {id: obj.id, state: NO_COMP};
        $http.post('/arfa/web/app_dev.php/administration/'+type+'/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(obj.code+" aceite para tratamento.", "success");            
            $("#row-" + obj.id).remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.rejectSubmit = function() { 
        if (!confirm("Confirmar QueixaD/Denunca como nao favoravel?")) return;
        var req = {
            id: $scope.mObject.id,
            state: NO_FAVORAVEL,
            rejectionReason: $scope.rejectForm.response
        };

        $http.post('/arfa/web/app_dev.php/administration/'+type+'/update_state/'+req.id, req)
        .then(function (data){
            $.notify($scope.mObject.code+" marcado como nao favoravel!", "warning");
            $scope.mObject.response = '';
            $("#row-" + req.id).remove();
            $('#rejectModal').modal('hide');
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);