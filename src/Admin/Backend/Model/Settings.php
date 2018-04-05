<?php
namespace Admin\Backend\Model;

class Settings {
    const DATE_FMT = "Y-m-d";
    const PER_PAGE = 10;
    const LIMIT=200;

    public static function getPermissions() {
        // $routeCollection = $this->get('router')
        //                         ->getRouteCollection();
        // foreach ($routeCollection->all() as $routeName => $route) {            
        //     if (strstr($routeName, 'administration_')){
        //         $ary[] = $routeName;
        //     }
        // }
        $ary = [
            [
                "label" => "Estatística",
                "code" => "BACKEND_ADMINISTRATION_STATS",
            ],
            [
                "label" => "Administração",
                "code" => "ROLE_ADMIN",
            ],

            // complaint
            [
                "label" => "Registro de Queixas/Reclamação",
                "code" => "ADMINISTRATION_COMPLAINT_NEW",
            ],
            [
                "label" => "Listagem de Queixas/Reclamação",
                "code" => "ADMINISTRATION_COMPLAINT",
            ],
            [
                "label" => "Acompanhamento de Queixas/Reclamação",
                "code" => "ADMINISTRATION_COMPLAINT_ACOMP",
            ],
            [
                "label" => "Tratamento de Queixas/Reclamação",
                "code" => "ADMINISTRATION_COMPLAINT_TREAT",
            ],
            [
                "label" => "Queixas/Reclamação respondidas",
                "code" => "ADMINISTRATION_COMPLAINT_RESP",
            ],
            [
                "label" => "Queixas/Reclamação sem resposta",
                "code" => "ADMINISTRATION_COMPLAINT_NORESP",
            ],
            [
                "label" => "Queixas/Reclamação nao favoravel",
                "code" => "ADMINISTRATION_COMPLAINT_NF",
            ],
            [
                "label" => "Queixas/Reclamação sem competencia",
                "code" => "ADMINISTRATION_COMPLAINT_SC",
            ],
            [
                "label" => "Queixas/Reclamação nao-conforme",
                "code" => "ADMINISTRATION_COMPLAINT_NC",
            ],

            // sugestion
            [
                "label" => "Listagem de Sugestão/Reclamação Externa",
                "code" => "ADMINISTRATION_SUGESTION",
            ],
            [
                "label" => "Registro de Sugestão/Reclamação Externa",
                "code" => "ADMINISTRATION_SUGESTION_NEW",
            ],
            [
                "label" => "Acompanhamento de Sugestão/Reclamação Externa",
                "code" => "ADMINISTRATION_SUGESTION_ACOMP",
            ],
            [
                "label" => "Tratamento de Sugestão/Reclamação Externa",
                "code" => "ADMINISTRATION_SUGESTION_TREAT",
            ],
            [
                "label" => "Sugestão/Reclamação respondida",
                "code" => "ADMINISTRATION_SUGESTION_RESP",
            ],
            [
                "label" => "Sugestão/Reclamação sem resposta",
                "code" => "ADMINISTRATION_SUGESTION_NORESP",
            ],
            [
                "label" => "Sugestão/Reclamação Externa nao favoravel",
                "code" => "ADMINISTRATION_SUGESTION_NF",
            ],
            [
                "label" => "Sugestão/Reclamação sem competencia",
                "code" => "ADMINISTRATION_SUGESTION_SC",
            ],
            [
                "label" => "Sugestão/Reclamação nao conforme",
                "code" => "ADMINISTRATION_SUGESTION_NC",
            ],

            // Ireclamation
            [
                "label" => "Registro de Reclamação Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_NEW",
            ],
            [
                "label" => "Listagem de Reclamação Interna",
                "code" => "ADMINISTRATION_IRECLAMATION",
            ],
            [
                "label" => "Reclamação Interna em acompanhamento",
                "code" => "ADMINISTRATION_IRECLAMATION_ACOMP",
            ],
            [
                "label" => "Reclamação Interna respondidas",
                "code" => "ADMINISTRATION_IRECLAMATION_RESP",
            ],
            [
                "label" => "Reclamação Interna sem resposta",
                "code" => "ADMINISTRATION_IRECLAMATION_NORESP",
            ],
            [
                "label" => "Nao conformidades da Reclamação Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_NC",
            ],

            [
                "label" => "Análise da Reclamação Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_ANALYSIS",
            ],
            [
                "label" => "Decisão da Reclamação Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_DECISION",
            ],
            [
                "label" => "Ação da Reclamação Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_ACTION",
            ],

            // Livro de Reclamação
            [
                "label" => "Listagem de livro de Reclamação",
                "code" => "ADMINISTRATION_COMPBOOK",
            ],
            [
                "label" => "Acompanhamento de livro de Reclamação",
                "code" => "ADMINISTRATION_COMPBOOK_ACOMP",
            ],
            [
                "label" => "Nao conformidades do livro de Reclamação",
                "code" => "ADMINISTRATION_COMPBOOK_NC",
            ],
            [
                "label" => "Criar Livro de Reclamação",
                "code" => "ADMINISTRATION_COMPBOOK_NEW",
            ],
            // Nao conformidades
            // [
            //     "label" => "Listagem de NÃO CONFORMIDADES",
            //     "code" => "ADMINISTRATION_CORRECTION",
            // ],
            // [
            //     "label" => "Criar NÃO CONFORMIDADES",
            //     "code" => "ADMINISTRATION_CORRECTION_NEW",
            // ]
        ];

        return $ary;
    }

}
