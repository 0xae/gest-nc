angular.module("app")
.controller("AdminController", ['$scope', '$http', function ($scope, $http) {
    var url = new URL(location.href);
    var tab=url.searchParams.get('tab');

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    $(document).on("submit", "#add_profile_form", function(e){
        // e.preventDefault();
        console.info("verify");
        var data = $("#add_profile_form").serializeObject();
        
        // always makes sense to signal user that something is happening
        $('#loadingSpinner').show();
    
        // simple approach avoid submitting multiple times
        $('#mySubmitButton').hide();

        $.ajax({
            url: $("#add_profile_form").attr('action'),
            type: 'POST',
            data: data,
            success:function(data){
                $('#loadingSpinner').hide();
                $('#mySubmitButton').show();
                console.log(data);

                if (data.status != 200) {
                    console.error(data.msg);
                } else {
                    $scope.$apply(function () {
                        $scope.profiles.push(data.object);
                    });
                }
            }
        });

        return false;
    });

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
