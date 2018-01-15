<?php

/* AsdisSityBundle:Site:perguntasfrequentes.html.twig */
class __TwigTemplate_77af6dc28bb562728e4b42374cb6bdafcc7b0cb9493ac8ce3d3622c4e387fe89 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AsdisSityBundle:Default:layout.html.twig", "AsdisSityBundle:Site:perguntasfrequentes.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AsdisSityBundle:Default:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "perguntas frequentes";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <div id=\"breadcrumb\">
        <div class=\"container\">\t
            <div class=\"breadcrumb\">\t\t\t\t\t\t\t
                <li><a href=\"";
        // line 10
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_homepage");
        echo "\">Home</a></li>
                <li>Perguntas Frequentes</li>\t\t\t
            </div>\t\t
        </div>\t
    </div>
    <div class=\"services\">
        <div class=\"container\">
            <h3>Perguntas Frequentes</h3>
            <hr>
            <div class=\"col-md-6\">
                ";
        // line 20
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "23cb3e7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_23cb3e7_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/23cb3e7_perguntas-frequentes_1.jpg");
            // line 21
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                ";
        } else {
            // asset "23cb3e7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_23cb3e7") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/23cb3e7.jpg");
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                ";
        }
        unset($context["asset_url"]);
        // line 22
        echo "             
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                    libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                    libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                    libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque</p>
            </div>

            <div class=\"col-md-6\">
                <div class=\"media\">
                    <div class=\"panel-group\" id=\"accordion\">
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a  class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">
                                        Que tipo de atividades apoiamos?
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
                                <div class=\"panel-body\">
                                    - Comercio; <br>
                                    - Serviços; <br>
                                    - Producção; <br>
                                    - Agricultura; <br>
                                    - Pequária; <br>
                                    - Habitação;                               
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">
                                        Quem pode pedir financiamento à asdis?
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                    Pessoas empreendedoras que tenham vontade de criar ou melhorar sua actividade com o objetivo de aumentar sua renda e de sua família.                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseThree\">
                                        Que tipo de investimentos a asdis financia?
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseThree\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                     O Capital de Giro, Fundo de Maneio, para compra de insumos, matéria-prima e mercadorias; <br>
                                     Investimento fixo para compra de equipamentos, ferramentas e outros;<br>
                                     Pequenas reformas para casa e/ou negócio;                               
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapsefour\">
                                        Quanto tempo dura a resposta de uma solicitação de Crédito?
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapsefour\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                   De 10.000\$00 a 500.000\$00, demora 48 horas para os Clientes de primeiro empréstimo; <br>
                                    De 100.000\$00 a 500.000\$00, demora até 7 dias. <br>
                                    Para os renovados, a resposta é 48 horas.                             
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapsefive\">
                                        O que significa a sigla asdis?
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapsefive\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                    Federação de Associações para Solidariedade e Desenvolvimento Comunitário das Ilhas de Cabo Verde                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapsesix\">
                                        Como posso conseguir crédito para meu negócio?
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapsesix\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                    Ter uma ideia de negócio, com perspetivas de futuro <br>
                                    Ter residência em Cabo Verde <br>
                                    Apresentar a garantia mínima exigido <br>
                                    Poupança obrigatória de 8% sobre o valor de empréstimo<br>
                                    Prazo de amortização de 1 a 24 meses<br>
                                    Valor mínimo de financiamento é de 5.000\$00 e máximo de 1.000.0000\$00<br>
                                    Contrato assinado e reconhecido nos Registos Notariados                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


";
    }

    public function getTemplateName()
    {
        return "AsdisSityBundle:Site:perguntasfrequentes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 22,  60 => 21,  56 => 20,  43 => 10,  38 => 7,  35 => 6,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Site:perguntasfrequentes.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Site/perguntasfrequentes.html.twig");
    }
}
