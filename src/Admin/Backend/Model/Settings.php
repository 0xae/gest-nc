<?php
namespace Admin\Backend\Model;

class Settings {
    const DATE_FMT = "Y-m-d";
    const PER_PAGE = 10;
    const SGRS_CTX = "SGRS";
    const NC_CTX = "NC";
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
            "ADMINISTRAÇÃO" => [
                [
                    "label" => "Administração",
                    "code" => "ROLE_ADMIN",
                ],
                [
                    "label" => "Gestão de Acesso",
                    "code" => "BACKEND_ADMINISTRATION_MAIN",
                ],
            ],

            "PARAMETRIZAÇÃO" => [
                [
                    "label" => "Departamentos",
                    "code" => "ADMINISTRATION_ENTITIES",
                ],
                [
                    "label" => "Anexos",
                    "code" => "ADMINISTRATION_DOCUMENT",
                ]
            ],

            // complaint
            "GESTÃO DE QUEIXAS/DENÚNCIAS" => [
                [
                    "label" => "Registro",
                    "code" => "ADMINISTRATION_COMPLAINT_NEW",
                ],
                [
                    "label" => "Listagem",
                    "code" => "ADMINISTRATION_COMPLAINT",
                ],
                [
                    "label" => "Acompanhamento",
                    "code" => "ADMINISTRATION_COMPLAINT_ACOMP",
                ],
                [
                    "label" => "Tratamento",
                    "code" => "ADMINISTRATION_COMPLAINT_TREAT",
                ],
                [
                    "label" => "Arquivo de Resposta",
                    "code" => "ADMINISTRATION_COMPLAINT_RESP",
                ],
                [
                    "label" => "Arquivos concluídos sem resposta",
                    "code" => "ADMINISTRATION_COMPLAINT_NORESP",
                ],
                [
                    "label" => "Não favoraveis",
                    "code" => "ADMINISTRATION_COMPLAINT_NF",
                ],
                [
                    "label" => "Competência de terceiros",
                    "code" => "ADMINISTRATION_COMPLAINT_SC",
                ],
                [
                    "label" => "Não Conformidades",
                    "code" => "ADMINISTRATION_COMPLAINT_NC",
                ],
            ],

            // sugestion
            "GESTÃO DE RECLAMAÇÕES EXTERNAS" => [
                [
                    "label" => "Registro",
                    "code" => "ADMINISTRATION_SUGESTION_NEW",
                ],
                [
                    "label" => "Listagem",
                    "code" => "ADMINISTRATION_SUGESTION",
                ],
                [
                    "label" => "Acompanhamento",
                    "code" => "ADMINISTRATION_SUGESTION_ACOMP",
                ],
                [
                    "label" => "Tratamento",
                    "code" => "ADMINISTRATION_SUGESTION_TREAT",
                ],
                [
                    "label" => "Arquivo de Resposta",
                    "code" => "ADMINISTRATION_SUGESTION_RESP",
                ],
                [
                    "label" => "Arquivos concluídos sem resposta",
                    "code" => "ADMINISTRATION_SUGESTION_NORESP",
                ],
                [
                    "label" => "Não favoraveis",
                    "code" => "ADMINISTRATION_SUGESTION_NF",
                ],
                [
                    "label" => "Competência de terceiros",
                    "code" => "ADMINISTRATION_SUGESTION_SC",
                ],
                [
                    "label" => "Não Conformidades",
                    "code" => "ADMINISTRATION_SUGESTION_NC",
                ],
            ],

            // Ireclamation
            "GESTÃO DE RECLAMAÇÕES INTERNAS" => [
                [
                    "label" => "Registro",
                    "code" => "ADMINISTRATION_IRECLAMATION_NEW",
                ],
                [
                    "label" => "Listagem",
                    "code" => "ADMINISTRATION_IRECLAMATION",
                ],
                [
                    "label" => "Acompanhamento",
                    "code" => "ADMINISTRATION_IRECLAMATION_ACOMP",
                ],
                [
                    "label" => "Análise",
                    "code" => "ADMINISTRATION_IRECLAMATION_ANALYSIS",
                ],
                [
                    "label" => "Decisão",
                    "code" => "ADMINISTRATION_IRECLAMATION_DECISION",
                ],
                [
                    "label" => "Ação",
                    "code" => "ADMINISTRATION_IRECLAMATION_ACTION",
                ],
                [
                    "label" => "Arquivo de Resposta",
                    "code" => "ADMINISTRATION_IRECLAMATION_RESP",
                ],
                [
                    "label" => "Arquivos concluídos sem resposta",
                    "code" => "ADMINISTRATION_IRECLAMATION_NORESP",
                ],
                [
                    "label" => "Não Conformidades",
                    "code" => "ADMINISTRATION_IRECLAMATION_NC",
                ],
            ],

            // Livro de Reclamação
            "GESTÃO DE LIVRO DE RECLAMAÇÕES" => [
                [
                    "label" => "Registro",
                    "code" => "ADMINISTRATION_COMPBOOK_NEW",
                ],
                [
                    "label" => "Listagem",
                    "code" => "ADMINISTRATION_COMPBOOK",
                ],
                [
                    "label" => "Acompanhamento",
                    "code" => "ADMINISTRATION_COMPBOOK_ACOMP",
                ],
                [
                    "label" => "Arquivo de Resposta",
                    "code" => "ADMINISTRATION_COMPBOOK_RESP",
                ],
                [
                    "label" => "Não Conformidades",
                    "code" => "ADMINISTRATION_COMPBOOK_NC",
                ],
            ],

            "RELATÓRIO ESTATÍSTICO" => [
                [
                    "label" => "RELATÓRIO ESTATÍSTICO",
                    "code" => "BACKEND_ADMINISTRATION_STATS",
                ],
            ]
        ];
        return $ary;
    }

}
