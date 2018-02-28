angular.module("app")
.factory("Admin", ['$http', function ($http) {
    var ACEITADO='aceitado';
    var REJEITADO='rejeitado';
    var TRATAMENTO='tratamento';
    var PENDENTE='pendente';
    var FAVORAVEL='favoravel';
    var NO_FAVORAVEL='nao_favoravel';
    var NO_COMP='sem_competencia';

    var stage = {        
        ACEITADO : ACEITADO,
        REJEITADO : REJEITADO,
        TRATAMENTO : TRATAMENTO,
        PENDENTE : PENDENTE,
        FAVORAVEL : FAVORAVEL,
        NO_FAVORAVEL : NO_FAVORAVEL,
        NO_COMP : NO_COMP
    };

    return {
        stage: stage
    };
}]);
