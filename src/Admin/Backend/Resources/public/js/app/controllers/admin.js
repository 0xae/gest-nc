angular.module("app")
.controller("AdminController", ['$scope', '$http', function ($scope, $http) {
    var url = new URL(location.href);
    var tab=url.searchParams.get('tab');
    $scope.permissions = [];

    if (tab) {
        $('#adminTab a[href="#'+tab+'"]').tab('show');    
    }

    $scope.ativateProfile = function (id, name) {
        console.info({
            id: id,
            name: name
        });

        fetchPermissions(id)
        .then(function (data){
            $scope.permissions = data;
        })
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

    $scope.removeProfile = function (userProfileId, index) {
        if (!confirm("Deseja mesmo remover esse perfil do utilizador?")) 
            return;

        $http.get('/arfa/web/app_dev.php/administration/remove_userp/' + userProfileId)
        .then(function (_resp) {
            var resp=_resp.data;
            if (resp.status == 200) {
                $scope.profiles.splice(index, 1);
            }
        });
    }
}]);
