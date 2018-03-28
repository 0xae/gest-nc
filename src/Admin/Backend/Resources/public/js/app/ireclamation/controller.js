angular.module("app")
.factory('IReclService', ['$http', function ($http) {
    function updateState(id, state) {
        var req = {
            id: id,
            state: state
        };

        return $http.post('/arfa/web/app_dev.php/administration/IReclamation/update_state/' + id, req)
        .then(function (resp){
            return resp.data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    return {
        updateState: updateState
    };
}])

.controller("IReclController", ['$http', '$scope', 'UploadService', 'Admin', 'IReclService',
function ($http, $scope, UploadService, Admin, IReclService) {
    var RESPOND_MODAL="#sugestionRespondModal";

    function getRecl(id) {
        return $http.get('/arfa/web/app_dev.php/administration/IReclamation/' + id +'/json')
        .then(function (resp){
            return resp.data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.viewIRecl = function (id, type) {
        var labelX = 'Reclamacao Interna';
        $scope.entity = undefined;
        getRecl(id).then(function (data){
            $scope.entity = data;
            $scope.modalTitle = "Visualizando " + labelX;

            $('#viewIRECLModal').modal();

            UploadService.byReference(data.annexReference)
            .then(function (resp){
                $scope.files = resp.files;
            });
        });
    }

    $scope.favorable = function (id, label) {
        getRecl(id).then(function (data){
            $scope.mObject = data;
            $(RESPOND_MODAL).modal();
        });
    }

    $scope.submitResponse = function () {
        var id = $scope.mObject.id;
        var req = {
            id: id,
            response: $scope.responseForm.response
        };

        $http.post('/arfa/web/app_dev.php/administration/IReclamation/respond/'+id, req)
        .then(function (data){
            $scope.responseForm.response='';
            $.notify("Respondido com sucesso!", "success");
            $("#row-" + id).addClass('success');
            $("#row-" + id + "-dispatch").remove();
            $("#ir-analysis-"+id+"-state").remove();
            $("#ir-analysis-"+id+"-resp").attr("style", "display:inherit !important");
            $scope.responseForm = false;
            setTimeout(function(){
                $(RESPOND_MODAL).modal('hide');                
            }, 500);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.notFavorable = function (id, label) {
        if (!confirm("Confirmar " + label + " como nao favoravel ?")){
            return;
        }

        IReclService.updateState(id, Admin.stage.NO_RESPONSE)
        .then(function (data){
            $.notify(label+" arquivado com sucesso.", "success");

            $("#row-" + id).addClass('success');
            $("#row-" + id + "-dispatch").remove();
        });
    }

    $scope.goToAnalysis = function (id) {
        if (!confirm('Confirmar como favoravel?')) {
            return;
        }

        IReclService.updateState(id, Admin.stage.ANALYSIS)
        .then(function (data){
            $.notify("Objecto actualizado com sucesso.", "success");
            
            $("#row-" + id).addClass('success');
            $("#row-" + id + "-dispatch").remove();
            $("#ir-analysis-"+id).attr("style", "display:inherit !important");
        });
    }
}])

.controller("IReclViewController", [
'$http', '$scope', 'UploadService', 'Admin', 'IReclService',
function ($http, $scope, UploadService, Admin, IReclService) {
    $scope.finishIRecl = function(labelConfirmation, id, nextStep) {
        if (!confirm(labelConfirmation)) {
            return;
        }

        $("#admin_backend_ireclamation_step").val(nextStep);
        
        setTimeout(function(){
            $("#admin_backend_ireclamation_submit").click();
        }, 1000);
    }
}]);
