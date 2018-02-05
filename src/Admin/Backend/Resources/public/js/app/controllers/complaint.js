angular.module("app")
.controller("ComplaintController", ['$http', '$scope', function ($http, $scope) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';

    $scope.acceptComplaint = function(id, index, label) {
        if (!confirm("Confirmar aceitacao?")) return;
        var req = {id: id, state: TRATAMENTO};

        $http.post('/arfa/web/app_dev.php/administration/Complaint/update_state/'+id, req)
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

        $http.post('/arfa/web/app_dev.php/administration/Complaint/update_state/'+id, req)
        .then(function (data){
            $.notify(label+" rejeitado!", "warning");
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    $scope.respondComplaint = function (obj) {        
        $scope.complaint = obj;
        $('#myModal').modal();
    }

    $scope.sendForm = function() {
        if (!confirm('Confirmar envio de resposta?')) return;
        var response = $scope.obj.response;
        var id = $scope.complaint.id;
        var code = $scope.complaint.code;
        var req = {
            id: id,
            clientResponse: response
        };

        $http.post('/arfa/web/app_dev.php/administration/Complaint/respond/'+id, req)
        .then(function (data){
            $scope.obj.response='';
            $("#row-" + id).remove();
            $.notify(code+" respondido!", "success");
            setTimeout(function(){
                $('#myModal').modal('hide');                
            }, 500);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });

    }
}]);
