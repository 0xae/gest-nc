angular.module("app")
.factory("ComplaintService", ['$http', function ($http) {
    function getById(id) {        
        return $http.get('/arfa/web/app_dev.php/administration/Complaint/' + id +"/json")
        .then(function (resp){
            return resp.data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        }); 
    }

    function updateState(id, req) {
        return $http.post('/arfa/web/app_dev.php/administration/Complaint/update_state/'+id, req)
        .then(function (data){
            return data;
        }, function (error) {
            $.notify("A operacao nao pode ser efectuada.Tente novamente!", "danger");            
        });
    }

    return {
        get: getById,
        updateState: updateState
    };
}]);
