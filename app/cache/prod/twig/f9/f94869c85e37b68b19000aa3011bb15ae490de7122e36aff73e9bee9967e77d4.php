<?php

/* AsdisSityBundle:Site:produtosservicos.html.twig */
class __TwigTemplate_2c15c15fef34648d6ca454627499ff47d7cf8c113c4dfcb80b7b0084ad85626e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AsdisSityBundle:Default:layout.html.twig", "AsdisSityBundle:Site:produtosservicos.html.twig", 1);
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
        echo "Produtos e Serviços";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "   
     <div id=\"breadcrumb\">
        <div class=\"container\">\t
            <div class=\"breadcrumb\">\t\t\t\t\t\t\t
                <li><a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_homepage");
        echo "\">Home</a></li>
                <li>Produtos e Serviços</li>\t\t\t
            </div>\t\t
        </div>\t
    </div>
    
    <div class=\"services\">
        <div class=\"container\">
            <h3>Produtos e Serviços</h3>

            <p>Os produtos da ASDIS foram concebidos essencialmente para capacitar o empreendedor, garantindo-lhe um bom arranque e crescimento do seu negócio, segurança do seu dinheiro, da sua vida e o da sua família.</p>

            <hr>
            <div class=\"col-md-6\">
                ";
        // line 25
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "467ad49_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_467ad49_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/467ad49_produtoservico_1.png");
            // line 26
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                ";
        } else {
            // asset "467ad49"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_467ad49") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/467ad49.png");
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                ";
        }
        unset($context["asset_url"]);
        // line 27
        echo "             
            </div>

            <div class=\"col-md-6\">
                <div class=\"media\">
                    <div class=\"panel-group\" id=\"accordion\">
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a  class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">
                                        Micro-crédito
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseOne\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                    Este género de empréstimos tem como principal objectivo financiar ideias que de outra forma, dificilmente, teriam oportunidades de se concretizarem, o que representa, sem dúvida, uma notável mais-valia a ter em conta, no que tange ao micro-crédito, estando a natureza desses financiamentos ligada à necessidade de se gerar empregos e criar riquezas para a economia local, através do negócio, no apoio e reforço à inclusão laboral àqueles que de si retira o sustento. <br><br>
                                    Nesta conformidade, mais do que um subsídio condescendente, o micro crédito abre caminho a um posto de trabalho para aqueles que por uma razão qualquer perderam ou abdicaram de suas funções, assumindo-se assim como um recurso capaz de mudar a vida de muitas pessoas.<br><br>
                                    Assim, o micro - crédito não só abre as portas do financiamento a quem um dia as viu fechadas, como também faculta aos menos entendidos um acompanhamento especializado que orientará o solicitador no bom caminho, através de sugestões úteis de desenvolvimento, crescimento e implementação do que é necessário para o sucesso do projecto e auxílio de gestão que detém um valor incalculável para quem dele não poderia usufruir se assim não fosse, tais como:  <br> <br>                        
                               
                               - Crédito para comércio; <br>
                               - Crédito Agropecuária; <br>
                               - Crédito no sector da Pesca; <br>
                               - Crédito reparação de Habitação; <br>
                               - Crédito no sector Artesanato; <br>
                               - Crédito no sector da formação e capacitação; <br>
                               - Outros créditos; <br>

                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">
                                        Micro-seguro
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                A forma mais eficaz de evitar preocupações e de assegurar um futuro mais tranquilo, para si e para a sua família, é ter um seguro de vida que proporcione uma protecção abrangente face a situações imprevistas e que possam vir a comprometer a segurança e a estabilidade financeira e familiar.<br><br>
                                É neste contexto que surge a ASDIS, através do Micro-Seguro de Vida, com o objectivo de apoiar a segurança e bem-estar das famílias, disponibilizando um seguro de vida com amplas coberturas, adaptável às suas necessidades. <br><br>
                                </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseThree\">
                                        Câmbio
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseThree\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                   Compra e venda de moeda estrangeira                           
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapsefour\">
                                        Transferência de Dinheiro
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapsefour\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                  - Transferência de dinheiro dentro do território nacional <br>
                                  - Transferência de dinheiro para estrangeiro  <br>                      
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapsefive\">
                                         Formação & Treinamento
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapsefive\" class=\"panel-collapse collapse\">
                                <div class=\"panel-body\">
                                    A educação financeira beneficia os indivíduos, permitindo-lhes, por exemplo, antecipar financeiramente, as situações imprevistas, a sociedade, diminuindo os riscos de exclusão financeira, incitando os consumidores a adoptar uma atitude cautelosa e de poupança, assim como a economia no seu conjunto, favorecendo os comportamentos cuidadosos e a introdução de liquidez nos mercados financeiros.                            </div>
                                </div>
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
        return "AsdisSityBundle:Site:produtosservicos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 27,  65 => 26,  61 => 25,  44 => 11,  38 => 7,  35 => 6,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Site:produtosservicos.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Site/produtosservicos.html.twig");
    }
}
