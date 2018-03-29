angular.module("app")
.controller("AdminController", ['$scope', '$http', function ($scope, $http) {
    var url = new URL(location.href);
    var tab=url.searchParams.get('tab');
    $scope.permissions = [];

    function fetchPermissions (profileId) { 
        return $http.get('/arfa/web/app_dev.php/administration/permissions_of/' + profileId)
        .then(function (_resp) {
            var resp=_resp.data;
            return resp;
        });
    }

    if (tab) { 
        $('#adminTab a[href="#'+tab+'"]').tab('show');  
    }

    $scope.profileChanged = function(id) {
        console.info(id);
        $scope.profileId = id;
        $scope.permissions = [];
        $scope.isLoading = true;

        fetchPermissions(id)
        .then(function (data){
            $scope.permissions = data;
            $scope.isLoading = false;            
        }, function () {
            $scope.isLoading = true;            
        });
    }

    $scope.addPermission = function (profileId, permissionId) {
        var permissionLabel = $("#perm-" + permissionId).attr("data-label");

        if (!permissionLabel) {
            return;
        }

        $scope.isLoading = true;

        $http.get('/arfa/web/app_dev.php/administration/add_permission?' + 
                    'profile_id=' + profileId+
                    '&permission=' + permissionId+
                    '&permission_label=' + permissionLabel)
        .then(function (_resp) {
            var resp=_resp.data;
            $.notify("Permissao adicionado com sucesso", "success");
            $scope.permissions.push(resp);
            $scope.isLoading = false;
            return resp;
        }, function (error) {            
            $scope.isLoading = false;            
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

.controller('UploadController', ['$http', '$scope', function ($http, $scope) {
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
}]);
