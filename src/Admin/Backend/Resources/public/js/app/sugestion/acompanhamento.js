angular.module("app")
.controller("SugestionAcompController", ['$http', '$scope','Admin', function ($http, $scope, Admin) {
    console.info("for real");

    var stage=Admin.stage;
    $scope.acceptObj = function(obj) {
        if (!confirm("Confirmar " + obj.code + " como favoravel?")){ 
            return;
        }

        var req = {id: obj.id, state: stage.TRATAMENTO};
        $http.post('/arfa/web/app_dev.php/administration/Sugestion/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(obj.code+" aceite para tratamento.", "success");            
            $("#row-" + obj.id).addClass('success');
            $("#row-" + obj.id + "-ok").show();
            $("#row-"+obj.id+"-dispatch").remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.rejectObj = function(obj) {
        $scope.mObject = obj;
        $('#rejectModal').modal();
    }

    $scope.markAsNoCompetence = function(label, id) {
        var obj = {id: id};
        if (!confirm("Confirmar "+label+" como sem competencia?")){ 
            return;
        }

        var req = {id: obj.id, state: stage.NO_COMP};
        $http.post('/arfa/web/app_dev.php/administration/Sugestion/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(label+" marcado como sem competencia.", "success");            
            $("#row-" + obj.id).addClass('success');
            $("#row-"+obj.id+"-not-for-me").show();
            $("#row-"+obj.id+"-dispatch").remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.rejectSubmit = function() { 
        if (!confirm("Confirmar Queixa/Denunca como nao favoravel?")) {
            return;
        }

        var req = {
            id: $scope.mObject.id,
            state: stage.NO_FAVORAVEL,
            rejectionReason: $scope.rejectForm.response
        };

        $http.post('/arfa/web/app_dev.php/administration/Sugestion/update_state/'+req.id, req)
        .then(function (data){
            $.notify($scope.mObject.code+" marcado como nao favoravel!", "warning");
            $scope.mObject.response = '';
            // $("#row-" + req.id).remove();
            $("#row-" + req.id).addClass('danger');
            $('#rejectModal').modal('hide');
            $("#row-"+req.id+"-not-favor").show();            
            $("#row-"+req.id+"-dispatch").remove();            
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

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
}]);