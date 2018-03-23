angular.module("app")
.controller("CompBookController", 
['$scope', 'CompBook', function ($scope, CompBook) {
    var MODAL="#viewCompBook";

    $scope.viewObject = function (id) {
        CompBook.get(id)
        .then(function (data){
            console.info(data);
            $scope.entity = data;    
            $scope.files = data.files;        
            $(MODAL).modal();
        });
    }
}]);
