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

    function label(type) {
        if (type == "Complaint") {
            return "Queixa/Denuncia";
        } else {
            return "Sugestao/Reclamacao";            
        }
    }

    $scope.viewObject = function(id) {
        $scope.entity = undefined;
        $http.get('/arfa/web/app_dev.php/administration/'+type+ '/' + id+"/json")
        .then(function (resp){
            var data = resp.data;
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + label;
            console.info("fetched ", data);
            $('#viewComplaintModal').modal();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
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

    $scope.markAsNoCompetence = function(label, id) {
        var obj = {id: id};
        if (!confirm("Confirmar "+label+" como sem competencia?")){ 
            return;
        }

        var req = {id: obj.id, state: NO_COMP};
        $http.post('/arfa/web/app_dev.php/administration/'+type+'/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(label+" marcado como sem competencia.", "success");            
            // $("#row-" + obj.id).remove();
            $("#row-" + obj.id).addClass('success');
            $("#row-"+obj.id+"-no-comp").show();
            $("#row-"+obj.id+"-dispatch").remove();
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

    $scope.viewSugestion = function (id) {
        $scope.entity = undefined;
        $http.get('/arfa/web/app_dev.php/administration/Sugestion/' + id +'/json')
        .then(function (resp){
            var data = resp.data;
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + label;
            $('#viewSugestionModal').modal();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.viewComplaint = function (id) {
        $scope.entity = undefined;
        $http.get('/arfa/web/app_dev.php/administration/Complaint/'+id+'/json')
        .then(function (resp){
            var data = resp.data;
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + label;
            console.info("fetched ", data);
            $('#viewComplaintModal').modal();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);