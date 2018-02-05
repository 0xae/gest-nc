angular.module("app")
.controller("TratamentoController", ['$http', '$scope', function ($http, $scope) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';
    var SEM_RESPOSTA='sem_resposta';
    var type='Complaint';

    $scope.setType = function (v) {
        console.log("changing type to: ", v);
        type = v;
    }

    $scope.noResponseObj = function(obj) {
        if (!confirm("Confirmar " + obj.code + " sem resposta?")) return;
        var req = {id: obj.id, state: SEM_RESPOSTA};
        $http.post('/arfa/web/app_dev.php/administration/'+type+'/update_state/'+obj.id, req)
        .then(function (data){
            $.notify(obj.code+" arquivado com sucesso.", "success");            
            $("#row-" + obj.id).remove();
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.respondObj = function (obj) {
        $scope.mObject = obj;
        $('#respondModal').modal();
    }

    $scope.respondSubmit = function() {
        if (!confirm('Confirmar envio de resposta?')) return;
        var response = $scope.responseForm.response;
        var id = $scope.mObject.id;
        var code = $scope.mObject.code;
        var req = {
            id: id,
            clientResponse: response
        };

        $http.post('/arfa/web/app_dev.php/administration/'+type+'/respond/'+id, req)
        .then(function (data){
            $scope.responseForm.response='';
            $.notify(code+" respondido!", "success");
            $("#row-" + id).remove();            
            setTimeout(function(){
                $('#respondModal').modal('hide');                
            }, 500);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}]);