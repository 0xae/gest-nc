angular.module("app")
.controller("ComplaintController", ['$http', '$scope', function ($http, $scope) {
    console.info("hello from complaint-controller");

    $scope.acceptComplaint = function(obj) {
        if (!confirm("Confirmar aceitacao?")) return;
    }

    $scope.rejectComplaint = function(obj) {        
        if (!confirm("Confirmar rejeicao?")) return;        
    }
}]);
