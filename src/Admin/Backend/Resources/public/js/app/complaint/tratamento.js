angular.module("app")
.controller("CompTratamentoController", [
'$http', '$scope', 'UploadService', 'ComplaintService', 
function ($http, $scope, UploadService, ComplaintService) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';
    var SEM_RESPOSTA='sem_resposta';
    var VIEW_MODAL='#viewComplaintModal';
    var type='Complaint';

    $scope.viewComplaint = function(id) {
        $scope.entity = undefined;
        ComplaintService.get(id)
        .then(function (data){
            $scope.entity = data;
            $scope.modalTitle = "Visualizando Queixa/Denuncia";

            $(VIEW_MODAL).modal();

            UploadService.byReference(data.annexReference)
            .then(function (resp){
                $scope.files = resp.files;
            });
        });
    }

    $scope.setType = function (v) {
        console.log("changing type to: ", v);
        type = v;
    }

    $scope.noResponseObj = function(obj) {
        if (!confirm("Confirmar " + obj.code + " sem resposta?")) return;
        var req = {id: obj.id, state: SEM_RESPOSTA};
        $http.post('/arfa/web/app_dev.php/administration/Complaint/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(obj.code+" arquivado com sucesso.", "success");            
            $("#row-" + obj.id).addClass('success');
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    function openModal(obj, title, ModalRef) {
        $scope.mObject = obj;
        $scope.modalTitle = title;
        $("#admin_backend_upload_reference").val("123");
        $(ModalRef).modal();
    }

    $scope.respondObj = function (obj) {
        var title='';
        if (obj.type == 'par_tec') {
            title = 'Parecer Tecnico';
        } else if(obj.type == 'par_cent') {
            title = 'Parecer Cientifico';            
        }
        openModal(obj, title, '#respondModal');
    }

    $scope.annexParecer = function (obj, title) {
        openModal(obj, '', '#updateParAnnex');     
    }

    $scope.respondSubmit = function() {
        if (!confirm('Confirmar envio de parecer?')){ 
            return;
        }

        var response = $scope.responseForm;
        var id = $scope.mObject.id;
        var type = $scope.mObject.type;
        var req = {
            id: id,
            parCode: response.parCode,
            parSubject: response.parSubject,
            parDestination: response.parDestination,
            parDescription: response.parDescription,
            type: type
        };

        $http.post('/arfa/web/app_dev.php/administration/Complaint/'+id+'/update_par', req)
        .then(function (data){
            $scope.responseForm.response='';
            $.notify($scope.modalTitle+" atribuido com sucesso!", "success");
            $("#row-" + id).addClass('success');
            $("#xop__"+id).remove();
            $("#xstat_"+id).text($scope.modalTitle);
            $("#xstat_"+id).removeClass('hidden');
            
            $scope.responseForm = false;
            setTimeout(function(){
                $('#respondModal').modal('hide');                
            }, 500);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);
