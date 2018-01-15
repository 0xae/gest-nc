<?php

/* WebcommandBundle:Layout:base.html.twig */
class __TwigTemplate_aea2d1ad05400de3669e7916f458a6ddac4c55474eb4ada2b1f772cf5037533c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        ";
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "91ec1a2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/91ec1a2_bootstrap.min_1.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\">

        ";
            // asset "91ec1a2_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/91ec1a2_part_2_style_1.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\">

        ";
            // asset "91ec1a2_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/91ec1a2_part_2_style_2.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\">

        ";
        } else {
            // asset "91ec1a2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/91ec1a2.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\">

        ";
        }
        unset($context["asset_url"]);
        // line 18
        echo "
        ";
        // line 19
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "
        
        ";
        // line 23
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c9929cf_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/c9929cf_jquery.min_1.js");
            // line 29
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\"></script>
        ";
            // asset "c9929cf_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/c9929cf_bootstrap.min_2.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\"></script>
        ";
            // asset "c9929cf_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/c9929cf_functions_3.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "c9929cf"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/c9929cf.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 31
        echo "

        ";
        // line 33
        $this->displayBlock('javascript', $context, $blocks);
        // line 35
        echo "        </head>

        <body>
            <div class=\"container\"> 

                    ";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        // line 42
        echo "              
             </div>   

         </body>
 

 </html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "WebCommand";
    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 20
        echo "        ";
    }

    // line 33
    public function block_javascript($context, array $blocks = array())
    {
        // line 34
        echo "        ";
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        // line 41
        echo "                    ";
    }

    public function getTemplateName()
    {
        return "WebcommandBundle:Layout:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 41,  166 => 40,  162 => 34,  159 => 33,  155 => 20,  152 => 19,  146 => 4,  136 => 42,  134 => 40,  127 => 35,  125 => 33,  121 => 31,  95 => 29,  91 => 23,  87 => 21,  85 => 19,  82 => 18,  75 => 15,  72 => 14,  64 => 15,  61 => 14,  54 => 15,  51 => 14,  44 => 15,  41 => 14,  37 => 10,  28 => 4,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "WebcommandBundle:Layout:base.html.twig", "/var/www/html/sga/src/WebcommandBundle/Resources/views/Layout/base.html.twig");
    }
}
