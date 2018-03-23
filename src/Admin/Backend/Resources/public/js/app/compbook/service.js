angular.module("app")
.service("CompBook", 
['$http', function ($http) {
    function getById(id) {        
        return $http.get('/arfa/web/app_dev.php/administration/CompBook/' + id +"/json")
        .then(function (resp){
            return resp.data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
            return error;
        }); 
    }    

    return {
        get: getById
    }
}]);
