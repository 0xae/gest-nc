angular.module("app")
.controller("AdminController", ['$scope', function ($scope) {
    var url = new URL(location.href);
    var tab=url.searchParams.get('tab');
    if (tab) {
        $('#adminTab a[href="#'+tab+'"]').tab('show');    
    }
}]);
