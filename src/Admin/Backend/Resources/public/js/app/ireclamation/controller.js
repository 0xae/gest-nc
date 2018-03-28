angular.module("app")
.factory('IReclService', ['$http', function ($http) {
    function changeStep(id, step) {
        var req={
            nextStep: step,
            id: id
        };

        return $http.post('/arfa/web/app_dev.php/administration/IReclamation/change_step/' + id, req)
        .then(function (resp){
            return resp.data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    return {
        changeStep: changeStep
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
            }, function (err) {
                return data;
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
        var req = {
            id: id,
            state: Admin.stage.NO_RESPONSE
        };

        $http.post('/arfa/web/app_dev.php/administration/IReclamation/update_state/'+id, req)
        .then(function (data){
            $.notify(label+" arquivado com sucesso.", "success");
            $("#row-" + id).addClass('success');
            $("#row-" + id + "-dispatch").remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");
        });
    }

    $scope.changeStep = function (id, nextStep, label) {
        if (!confirm(label)) {
            return;
        }

        IReclService.changeStep(id, nextStep)
        .then(function (data){
            $.notify("Objecto actualizado com sucesso.", "success");
            console.info(data);
            $("#row-" + id).addClass('success');
            $("#row-" + id + "-dispatch").remove();
            $("#ir-analysis-"+id).attr("style", "display:inherit !important");
        });
    }
}])
.controller("IReclViewController", [
'$http', '$scope', 'UploadService', 'Admin', 'IReclService',
function ($http, $scope, UploadService, Admin, IReclService) {
    $scope.advanceTo = function(labelConfirmation, id, nextStep) {
        if (!confirm(labelConfirmation)) {
            return;
        }

        $("#admin_backend_ireclamation_step").val(nextStep);
        
        setTimeout(function(){
            $("#admin_backend_ireclamation_submit").click();
        }, 1000);
    }
}]);
