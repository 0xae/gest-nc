angular.module("app")
.controller("AdminController", ['$scope', '$http', function ($scope, $http) {
    var url = new URL(location.href);
    var tab=url.searchParams.get('tab');
    if (tab) {
        $('#adminTab a[href="#'+tab+'"]').tab('show');    
    }

    $scope.loadProfiles = function(userId) {
        $http.get('/arfa/web/app_dev.php/administration/profiles_of/' + userId)
        .then(function (resp) {
            var profiles=resp.data;
            $scope.profiles = profiles;
        });
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
