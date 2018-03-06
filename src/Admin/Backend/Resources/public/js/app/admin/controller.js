angular.module("app")
.controller("AdminController", ['$scope', '$http', function ($scope, $http) {
    var url = new URL(location.href);
    var tab=url.searchParams.get('tab');
    $scope.permissions = [];

    if (tab) { 
        $('#adminTab a[href="#'+tab+'"]').tab('show');  
    }

    $scope.ativateProfile = function (id, name) {
        $scope.profileId = id;
        fetchPermissions(id)
        .then(function (data){
            $scope.permissions = data;
        });
    }

    $scope.addPermission = function (profileId, permissionId) {
        console.info({
            profileId: profileId,
            permissionId: permissionId
        });

        //arfa/web/app_dev.php/administration/add_permission?permission=teste+123&profile_id=1
        $http.get('/arfa/web/app_dev.php/administration/add_permission?' + 
                    'profile_id=' + profileId+
                    '&permission=' + permissionId)
        .then(function (_resp) {
            var resp=_resp.data;
            $.notify("Permissao adicionado com sucesso", "success");
            $scope.permissions.push(resp);
            return resp;
        });
    }

    function fetchPermissions (profileId) { 
        return $http.get('/arfa/web/app_dev.php/administration/permissions_of/' + profileId)
        .then(function (_resp) {
            var resp=_resp.data;
            return resp;
        });
    }

    $scope.removePermission = function (id, index) {
        if (!confirm("Deseja mesmo remover essa permissao?")) {
            return;
        }

        $http.get('/arfa/web/app_dev.php/administration/remove_permission/' + id)
        .then(function (_resp) {
            var resp=_resp.data;
            $.notify("Permissao removida com sucesso", "success");
            $scope.permissions.splice(index, 1);            
            return resp;
        });
    }
}])

.controller('UploadController', ['$http', '$scope', function ($http, $scope){
    $scope.remove = function (id, index) {        
        if (!confirm("Tem a certeza que pretende eliminar este anexo?")){
            return;
        }

        $http.get('/arfa/web/app_dev.php/administration/Upload/' + id+"/remove")
        .then(function (resp){
            var file = "#upload_" + id;
            $.notify("Anexo removido com sucesso.", "success");
            $(file).addClass('danger');
            setTimeout(function(){
                $(file).remove();                
            }, 1200);
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }
}])
;
