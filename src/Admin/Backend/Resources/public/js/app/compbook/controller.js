angular.module("app")
.controller("CompBookController", 
['$scope', 'CompBook', function ($scope, CompBook) {
    var MODAL="#viewCompBook";

    $scope.viewObject = function (id) {
        $scope.entity = undefined;
        $scope.req = {};

        CompBook.get(id)
        .then(function (data){
            console.info(data);
            $scope.entity = data;    
            $scope.files = data.files;
            $scope.req.sendTo = data.sendTo;  
            $scope.req.sendDate = data.sendDate;  
            $(MODAL).modal();
        });
    }

    $scope.req = {
        req: new Date()
    };

    $scope.sendAcomp = function() {
        if (!confirm("Confirmar?")) {
            return;            
        }

        CompBook.updateComp($scope.entity.id, $scope.req)
        .then(function (done) {
            $("#td-"+$scope.entity.id+"-sendTo").text($scope.req.sendTo);
            $("#td-"+$scope.entity.id+"-sendDate").text($scope.req.sendDate);            
            $.notify("Atualizado com sucesso.", "success");            
        });
    }
}]);
