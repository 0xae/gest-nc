<?php

/* AsdisSityBundle:Default:layout.html.twig */
class __TwigTemplate_e089238a3f2dbfa762e0ef0ffeb27be378afcc58d8ddd6b2ec21cb9fb9b1a222 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AsdisSityBundle:Default:base.html.twig", "AsdisSityBundle:Default:layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'section' => array($this, 'block_section'),
            'feature' => array($this, 'block_feature'),
            'about' => array($this, 'block_about'),
            'lates' => array($this, 'block_lates'),
            'partner' => array($this, 'block_partner'),
            'contact' => array($this, 'block_contact'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AsdisSityBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Asdis";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayBlock('header', $context, $blocks);
        // line 60
        echo "
    ";
        // line 61
        $this->displayBlock('content', $context, $blocks);
        // line 76
        echo "
    ";
        // line 77
        $this->displayBlock('footer', $context, $blocks);
        // line 112
        echo "
";
    }

    // line 6
    public function block_header($context, array $blocks = array())
    {
        // line 7
        echo "        <header>

            <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                ";
        // line 13
        echo "                <div class=\"navigation\">
                    <div class=\"container\">
                        <div class=\"navbar-header\">
                            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-collapse.collapse\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                            </button>
                            <div class=\"navbar-brand\" style=\"position: relative; top: 10px\">
                                ";
        // line 23
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "6dd07dc_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_6dd07dc_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/6dd07dc_logo_1.png");
            // line 24
            echo "                                <img class=\"img-responsive\"  src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" alt=\"\"/>
                                ";
        } else {
            // asset "6dd07dc"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_6dd07dc") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/6dd07dc.png");
            echo "                                <img class=\"img-responsive\"  src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" alt=\"\"/>
                                ";
        }
        unset($context["asset_url"]);
        // line 26
        echo "                            </div>
                        </div>

                        <div class=\"navbar-collapse collapse\">
                            <div class=\"menu\">
                                <ul class=\"nav nav-tabs\" role=\"tablist\">

                                    <ul class=\"nav nav-tabs\">
                                        <li role=\"presentation\"><a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_homepage");
        echo "\"  class=\"active\">Home</a></li>
                                        <li role=\"presentation\" class=\"dropdown\">
                                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Sobre nos
                                                <span class=\"caret\"></span></a>
                                            <ul class=\"dropdown-menu\">
                                                <li><a href=\"#\">Misao e valores</a></li>
                                                <li><a href=\"#\">Historia</a></li>
                                                <li><a href=\"#\">Orgaoes sociais</a></li>
                                                <li><a href=\"#\">Publico alvo</a></li>
                                                <li><a href=\"#\">Credibilidade</a></li>
                                                <li><a href=\"#\">Portfolio</a></li>
                                            </ul>
                                        </li>
                                        <li role=\"presentation\"><a href=\"";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_produtosservicos");
        echo "\">Produtos e servicos</a></li>
                                        <li role=\"presentation\"><a href=\"";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_galleria");
        echo "\">Galeria</a></li>
                                        <li role=\"presentation\"><a href=\"";
        // line 49
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_perguntasfrequentes");
        echo "\">Perguntas frequentes</a></li>
                                        <li role=\"presentation\"><a href=\"";
        // line 50
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_contact");
        echo "\">Contacto</a></li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    ";
    }

    // line 61
    public function block_content($context, array $blocks = array())
    {
        // line 62
        echo "        ";
        $this->displayBlock('section', $context, $blocks);
        // line 64
        echo "        ";
        $this->displayBlock('feature', $context, $blocks);
        // line 66
        echo "        ";
        $this->displayBlock('about', $context, $blocks);
        // line 68
        echo "        ";
        $this->displayBlock('lates', $context, $blocks);
        // line 70
        echo "        ";
        $this->displayBlock('partner', $context, $blocks);
        // line 72
        echo "        ";
        $this->displayBlock('contact', $context, $blocks);
        // line 74
        echo "
    ";
    }

    // line 62
    public function block_section($context, array $blocks = array())
    {
        // line 63
        echo "        ";
    }

    // line 64
    public function block_feature($context, array $blocks = array())
    {
        // line 65
        echo "        ";
    }

    // line 66
    public function block_about($context, array $blocks = array())
    {
        // line 67
        echo "        ";
    }

    // line 68
    public function block_lates($context, array $blocks = array())
    {
        // line 69
        echo "        ";
    }

    // line 70
    public function block_partner($context, array $blocks = array())
    {
        // line 71
        echo "        ";
    }

    // line 72
    public function block_contact($context, array $blocks = array())
    {
        // line 73
        echo "        ";
    }

    // line 77
    public function block_footer($context, array $blocks = array())
    {
        // line 78
        echo "        <footer>
            <div class=\"footer\">
                <div class=\"container\">
                    <div class=\"social-icon\">
                        <div class=\"col-md-4\">
                            <ul class=\"social-network\">

                                <li><a href=\"#\" class=\"fb tool-tip\" title=\"Facebook\"><i class=\"fa fa-facebook\"></i></a></li>
                                <li><a href=\"#\" class=\"twitter tool-tip\" title=\"Twitter\"><i class=\"fa fa-twitter\"></i></a></li>
                                <li><a href=\"#\" class=\"gplus tool-tip\" title=\"Google Plus\"><i class=\"fa fa-google-plus\"></i></a></li>
                                <li><a href=\"#\" class=\"linkedin tool-tip\" title=\"Linkedin\"><i class=\"fa fa-linkedin\"></i></a></li>
                                <li><a href=\"#\" class=\"ytube tool-tip\" title=\"You Tube\"><i class=\"fa fa-youtube-play\"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class=\"col-md-4 col-md-offset-4\">
                        <div class=\"copyright\">
                            &copy; Asdis. Todos os direitos Reservados.
                            <div class=\"credits\">

                                <a href=\"#\">Desenvolvido</a> por <a href=\"#\">asdis</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"pull-right\">
                    <a href=\"#home\" class=\"scrollup\"><i class=\"fa fa-angle-up fa-3x\"></i></a>
                </div>
            </div>
        </footer>

    ";
    }

    public function getTemplateName()
    {
        return "AsdisSityBundle:Default:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 78,  223 => 77,  219 => 73,  216 => 72,  212 => 71,  209 => 70,  205 => 69,  202 => 68,  198 => 67,  195 => 66,  191 => 65,  188 => 64,  184 => 63,  181 => 62,  176 => 74,  173 => 72,  170 => 70,  167 => 68,  164 => 66,  161 => 64,  158 => 62,  155 => 61,  141 => 50,  137 => 49,  133 => 48,  129 => 47,  113 => 34,  103 => 26,  89 => 24,  85 => 23,  73 => 13,  68 => 7,  65 => 6,  60 => 112,  58 => 77,  55 => 76,  53 => 61,  50 => 60,  47 => 6,  44 => 5,  38 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Default:layout.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Default/layout.html.twig");
    }
}
