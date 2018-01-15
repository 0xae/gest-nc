<?php

/* AsdisSityBundle:Home:index.html.twig */
class __TwigTemplate_0b4835be0340804c6ad10682faee872c2a61b3d1be1044081171256c43d951f5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AsdisSityBundle:Default:layout.html.twig", "AsdisSityBundle:Home:index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'section' => array($this, 'block_section'),
            'feature' => array($this, 'block_feature'),
            'about' => array($this, 'block_about'),
            'lates' => array($this, 'block_lates'),
            'partner' => array($this, 'block_partner'),
            'contact' => array($this, 'block_contact'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayBlock('section', $context, $blocks);
        // line 22
        echo "    ";
        $this->displayBlock('feature', $context, $blocks);
        // line 59
        echo "    ";
        $this->displayBlock('about', $context, $blocks);
        // line 84
        echo "    ";
        $this->displayBlock('lates', $context, $blocks);
        // line 131
        echo "
    ";
        // line 132
        $this->displayBlock('partner', $context, $blocks);
        // line 152
        echo "
    ";
        // line 153
        $this->displayBlock('contact', $context, $blocks);
        // line 172
        echo "
";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        // line 5
        echo "        <section id=\"main-slider\" class=\"no-margin\">
            <div class=\"carousel slide\">

                <ul class=\"rslides\" id=\"slider\">
                    ";
        // line 9
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0828c6f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_0828c6f_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/0828c6f_bg1_1.jpg");
            echo "                     
                    <li><img src=\"";
            // line 10
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" alt=\"\"></li>
                        ";
        } else {
            // asset "0828c6f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_0828c6f") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/0828c6f.jpg");
            // line 9
            echo "                     
                    <li><img src=\"";
            // line 10
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" alt=\"\"></li>
                        ";
        }
        unset($context["asset_url"]);
        // line 12
        echo "                        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "217a2f0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_217a2f0_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/217a2f0_imagem_02_1.jpg");
            echo "                     
                    <li><img src=\"";
            // line 13
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" alt=\"\"></li>
                        ";
        } else {
            // asset "217a2f0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_217a2f0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/217a2f0.jpg");
            // line 12
            echo "                     
                    <li><img src=\"";
            // line 13
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" alt=\"\"></li>
                        ";
        }
        unset($context["asset_url"]);
        // line 15
        echo "                       
                </ul>
               
            </div>
        </section>

    ";
    }

    // line 22
    public function block_feature($context, array $blocks = array())
    {
        // line 23
        echo "        <div class=\"feature\">
            <div class=\"container\">
                <div class=\"text-center\">
                    <div class=\"col-md-3\">
                        <div class=\"hi-icon-wrap hi-icon-effect wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\" >
                            <i class=\"fa fa-credit-card\"></i>
                            <h2>Micro-crédito</h2>
                            <p>Este género de empréstimos tem como principal objectivo financiar ideias que de outra forma, dificilmente, teriam oportunidades de se concretizarem...</p>
                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        <div class=\"hi-icon-wrap hi-icon-effect wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"600ms\" >
                            <i class=\"fa fa-laptop\"></i>
                            <h2>Micro-seguro</h2>
                            <p>A forma mais eficaz de evitar preocupações e de assegurar um futuro mais tranquilo, para si e para a sua família, é ter um seguro de vida que proporcione...</p>
                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        <div class=\"hi-icon-wrap hi-icon-effect wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"900ms\" >
                            <i class=\"fa fa-money\"></i>
                            <h2>Câmbio</h2>
                            <p>Compra e venda de moeda estrangeira.</p>
                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        <div class=\"hi-icon-wrap hi-icon-effect wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"1200ms\" >
                            <i class=\"fa fa-cloud\"></i>
                            <h2>Transferência de Dinheiro</h2>
                            <p>Transferência de dinheiro dentro do território nacional e para estrangeiro.</p>
                        </div>
                    </div>
                </div>
            </div>
             <a class=\"btn btn-success\" href=\"";
        // line 56
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_produtosservicos");
        echo "\" role=\"button\"  style=\"float: right; margin-right: 30px;\">ver mais</a>
        </div>
    ";
    }

    // line 59
    public function block_about($context, array $blocks = array())
    {
        // line 60
        echo "
        <div class=\"about\">
            <div class=\"container\">
                <div class=\"col-md-6 wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\" >
                    <h2>Mensagem de Boas Vindas</h2>

                    ";
        // line 66
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "243ea63_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_243ea63_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/243ea63_6_1.jpg");
            // line 67
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        } else {
            // asset "243ea63"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_243ea63") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/243ea63.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        }
        unset($context["asset_url"]);
        // line 69
        echo "                    <p>Bem-vindo ao nosso mais novo espaço na web, construído exclusivamente para Você, dando-lhe a oportunidade de integrar esta família que tanto lhe quer e lhe respeita.</p>
                </div>

                <div class=\"col-md-6 wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"600ms\" >
                    <h2></h2><br>
                    <p>Pretendemos com mais este espaço disponibilizar tudo aquilo que representa a ASDIS durante estes dez anos de vivência e convivência com vocês, razão da nossa existência.
                    <p>Poderá encontrar nesse espaço um conjunto de informações de relevância que lhe permitirá participar de forma activa na organização e dos seus membros, beneficiando também dos seus diferentes produtos disponíveis.
                    </p>
                    <p>Trata-se de um espaço de grande interactividade, onde poderá ter aceso a um formulário de cadastro, para a obtenção de créditos sem se levantar da frente do seu computador. </p>
                    <p>A ASDIS conta consigo para o aprofundamento e enriquecimentos deste nosso e vosso espaço.</p>
                    <p>Francisco Tavares</p>
                </div>
            </div>
        </div>
    ";
    }

    // line 84
    public function block_lates($context, array $blocks = array())
    {
        // line 85
        echo "        <div class=\"lates\">
            <div class=\"container\">
                <div class=\"text-center\">
                    <h2>Últimas Notícias</h2>
                </div>
                <div class=\"col-md-4 wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\">
                    ";
        // line 91
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ec87011_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_ec87011_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/ec87011_4_1.jpg");
            // line 92
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        } else {
            // asset "ec87011"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_ec87011") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/ec87011.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        }
        unset($context["asset_url"]);
        // line 93
        echo "                      
                    <h3>Template built with Twitter Bootstrap</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                    </p>
                     <a class=\"btn btn-success\" href=\"#\" role=\"button\">ler mais</a>
                </div>

                <div class=\"col-md-4 wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"600ms\">
                    ";
        // line 104
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ec87011_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_ec87011_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/ec87011_4_1.jpg");
            // line 105
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        } else {
            // asset "ec87011"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_ec87011") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/ec87011.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        }
        unset($context["asset_url"]);
        // line 106
        echo "  
                    <h3>Template built with Twitter Bootstrap</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                    </p>
                     <a class=\"btn btn-success\" href=\"#\" role=\"button\">ler mais</a>
                </div>

                <div class=\"col-md-4 wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"900ms\">
                     ";
        // line 117
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ec87011_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_ec87011_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/ec87011_4_1.jpg");
            // line 118
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        } else {
            // asset "ec87011"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_ec87011") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/ec87011.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive\"/>
                    ";
        }
        unset($context["asset_url"]);
        // line 119
        echo "  
                    <h3>Template built with Twitter Bootstrap</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                        libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                    </p>
                    <a class=\"btn btn-success\" href=\"#\" role=\"button\">ler mais</a>
                </div>
            </div>
        </div>
    ";
    }

    // line 132
    public function block_partner($context, array $blocks = array())
    {
        // line 133
        echo "        <section id=\"partner\">
            <div class=\"container\">
                <div class=\"center wow fadeInDown\">
                    <h2>Nossos Parceiros</h2>
                    <p>Temos contado ao longo dos anos com instituições parceiras e amigas, que têm comungado connosco, as nossas dificuldades e virtudes ajudando-nos no crescimento e desenvolvimento.</p>
                </div>

                <div class=\"partners\">
                    <ul>
                        <li> <a href=\"#\"><img class=\"img-responsive wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\" src=\"images/partners/partner1.png\"></a></li>
                        <li> <a href=\"#\"><img class=\"img-responsive wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"600ms\" src=\"images/partners/partner2.png\"></a></li>
                        <li> <a href=\"#\"><img class=\"img-responsive wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"900ms\" src=\"images/partners/partner3.png\"></a></li>
                        <li> <a href=\"#\"><img class=\"img-responsive wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"1200ms\" src=\"images/partners/partner4.png\"></a></li>
                        <li> <a href=\"#\"><img class=\"img-responsive wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"1500ms\" src=\"images/partners/partner5.png\"></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </section><!--/#partner-->
    ";
    }

    // line 153
    public function block_contact($context, array $blocks = array())
    {
        // line 154
        echo "        <section id=\"conatcat-info\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-sm-8\">
                        <div class=\"media contact-info wow fadeInDown\" data-wow-duration=\"1000ms\" data-wow-delay=\"600ms\">
                            <div class=\"pull-left\">
                                <i class=\"fa fa-phone\"></i>
                            </div>
                            <div class=\"media-body\">
                                <h2>Entre em contato conosco !</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation +0123 456 70 80</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.container-->
        </section><!--/#conatcat-info-->
    ";
    }

    public function getTemplateName()
    {
        return "AsdisSityBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 154,  351 => 153,  329 => 133,  326 => 132,  311 => 119,  297 => 118,  293 => 117,  280 => 106,  266 => 105,  262 => 104,  249 => 93,  235 => 92,  231 => 91,  223 => 85,  220 => 84,  202 => 69,  188 => 67,  184 => 66,  176 => 60,  173 => 59,  166 => 56,  131 => 23,  128 => 22,  118 => 15,  112 => 13,  109 => 12,  102 => 13,  95 => 12,  89 => 10,  86 => 9,  79 => 10,  73 => 9,  67 => 5,  64 => 4,  59 => 172,  57 => 153,  54 => 152,  52 => 132,  49 => 131,  46 => 84,  43 => 59,  40 => 22,  37 => 4,  34 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Home:index.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Home/index.html.twig");
    }
}
