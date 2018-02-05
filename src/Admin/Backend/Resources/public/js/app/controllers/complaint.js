angular.module("app")
.controller("ComplaintViewController", ['$http', '$scope', function ($http, $scope) {
    var url = new URL(location.href);
    var isNew=url.searchParams.get('is_new');

    if (isNew) {
        $.notify("Objecto guardado com sucesso", "success");
    }
}]);
