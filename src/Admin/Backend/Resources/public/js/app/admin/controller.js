angular.module("app")
.controller("AdminController", ['$scope', '$http', '$q', function ($scope, $http, $q) {
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
        $scope.profileId = id;
        $scope.permissions = [];
        $scope.isLoading = true;

        fetchPermissions(id)
        .then(function (data){
            console.info("profile permissions are: ", data);
            $scope.profilePermissions = data;
            $scope.isLoading = false;            
        }, function () {
            $scope.isLoading = true;            
        });
    }

    $scope.assocPermissions = function () {
        var profileId=$scope.profileId;
        var queue = $("#permissionsToAdd").val()
            .map(function (permission){
                return addPermissionPromise(profileId, permission);
            });
        

        $scope.isLoading = true;

        $q.all(queue)
        .then(function (_resp) {
            var resp=_resp.data;
            $.notify("Permissões adicionadas com sucesso", "success");
            $scope.profileChanged(profileId);
            return resp;
        }, function (error) {            
            $scope.isLoading = false;
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");
        });
    }


    $scope.removeAssocPermissions = function() {
        if (!confirm("Deseja mesmo remover as permissões selecionadas?")) {
            return;
        }

        var permissions = $("#permissionsAssoc").val();
        var queue = permissions.map(function (p){
            return $http.get('/arfa/web/app_dev.php/administration/remove_permission/' + p); 
        });

        $q.all(queue)
        .then(function (done){
            $scope.profileChanged($scope.profileId);
            $.notify("Permissões removidas com sucesso", "success");            
        }, function (error){
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");
        });
    }

    function addPermissionPromise(profileId, permissionId) {
        var permissionLabel = $("#perm-" + permissionId).attr("data-label");
        return $http.get('/arfa/web/app_dev.php/administration/add_permission?' + 
            'profile_id=' + profileId+
            '&permission=' + permissionId+
            '&permission_label=' + permissionLabel);
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
