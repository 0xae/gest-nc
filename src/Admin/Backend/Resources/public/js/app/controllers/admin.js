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
        })
    }

    $scope.addPermission = function (profileId, permissionId) {
        console.info({
            profileId: profileId,
            permissionId: permissionId
        });
    }

    function fetchPermissions (profileId) { 
        return $http.get('/arfa/web/app_dev.php/administration/permissions_of/' + profileId)
        .then(function (_resp) {
            var resp=_resp.data;
            return resp;
        });
    }

    $scope.removePermission = function (id) {
        if (!confirm("Deseja mesmo remover essa permissao?")) 
            return;
    }
}]);
