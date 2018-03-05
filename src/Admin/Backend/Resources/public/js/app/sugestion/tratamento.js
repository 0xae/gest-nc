angular.module("app")
.controller("SugestionTreatController", ['$http', '$scope', 'Admin', function ($http, $scope, Admin) {
    var stage=Admin.stage;
    var RESPOND_MODAL='#sugestionRespondModal';
    var PAR_MODAL='#sugestionParecerModal';
    
    $scope.NO_RESPONSE = Admin.stage.NO_RESPONSE;
    $scope.RESPONDED = Admin.stage.RESPONDED;

    $scope.noResponseObj = function(obj) {
        if (!confirm("Confirmar " + obj.code + " sem resposta?")){
            return;
        }
        var req = {
            id: obj.id,
            state: stage.NO_RESPONSE
        };

        $http.post('/arfa/web/app_dev.php/administration/Sugestion/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(obj.code+" arquivado com sucesso.", "success");            
            $("#row-" + obj.id).addClass('success');
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.respondObj = function (obj, title) {
        $scope.mObject = obj;
        $scope.modalTitle = 'Responder ' + title;
        $(RESPOND_MODAL).modal();
    }

    $scope.respondSubmit = function() {
        if (!confirm('Confirmar envio de parecer?')) {
            return;
        }

        var form = $scope.responseForm;
        var id = $scope.mObject.id;
        var type = $scope.mObject.type;
        var req = {
            id: id,
            clientResponse: form.response
        };

        $http.post('/arfa/web/app_dev.php/administration/Sugestion/respond/' + id, req)
        .then(function (data){
            $scope.responseForm.response='';
            $.notify(" atribuido com sucesso!", "success");
            $("#row-" + id).addClass('success');
            $("#xop__"+id).remove();
            $("#xstat_"+id).text($scope.modalTitle);
            $("#xstat_"+id).removeClass('hidden');
            $scope.responseForm = false;

            setTimeout(function() {
                $(RESPOND_MODAL).modal('hide');                
            }, 500);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

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

    $scope.openParModal = function (obj) {
        $scope.mObject = obj;
        var title = "Parecer Cientifico";

        if (obj.type == 'par_tec') {
            title = "Parecer Tecnico"
        }

        $scope.modalTitle = 'Atribuir ' + title;
        $(PAR_MODAL).modal();                
    }

    $scope.updatePar = function() {
        if (!confirm('Confirmar envio de parecer?')) {
             return;
        }

        var response = $scope.responseForm;
        var id = $scope.mObject.id;
        var type = $scope.mObject.type;
        var req = {
            id: id,
            parCode: response.parecerCode,
            parSubject: response.parecerSubject,
            parDestination: response.destination,
            parDescription: response.description,
            type: type
        };

        console.info(response);
        console.info(req);

        $http.post('/arfa/web/app_dev.php/administration/Sugestion/'+id+'/update_par', req)
        .then(function (data){
            $scope.responseForm.response='';
            $.notify($scope.modalTitle+" atribuido com sucesso!", "success");
            $("#row-" + id).addClass('success');
            $("#xop__"+id).remove();
            $("#xstat_"+id).text($scope.modalTitle);
            $("#xstat_"+id).removeClass('hidden');
            
            $scope.responseForm = false;
            setTimeout(function(){
                $(PAR_MODAL).modal('hide');                
            }, 500);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);