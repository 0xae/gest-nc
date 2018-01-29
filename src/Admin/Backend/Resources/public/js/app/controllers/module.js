angular.module("app")
.controller("ModuleController",['$scope', function ($scope) {
    console.info("hello world");

    $scope.log = function (val) {
        console.info(val);
        // $("#admin_backend_stageprofile_moduleStage").val(val);
    }
}]);
