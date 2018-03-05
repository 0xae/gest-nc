angular.module("app")
.factory("Admin", ['$http', function ($http) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';
    var FAVORAVEL='favoravel';
    var NO_FAVORAVEL='nao_favoravel';
    var NO_COMP='sem_competencia';
    var NO_RESPONSE='sem_resposta';
    var RESPONDED='respondido';
    
    var stage = {
        ACEITADO : ACEITADO,
        REJEITADO : REJEITADO,
        TRATAMENTO : TRATAMENTO,
        PENDENTE : PENDENTE,
        FAVORAVEL : FAVORAVEL,
        NO_FAVORAVEL : NO_FAVORAVEL,
        NO_COMP : NO_COMP,
        NO_RESPONSE:  NO_RESPONSE,
        RESPONDED : RESPONDED
    };

    return {
        stage: stage
    };
}])

.factory('UploadService', ['$http', function($http){
    function uploadFile() {        
    }

    return {
        upload: uploadFile
    };
}]);
;
