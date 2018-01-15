<?php

/* WebcommandBundle:Layout:base.html.twig */
class __TwigTemplate_69bb2b0650a9b3bc511839990f0b3b0cf54e9d07ca01346abcebcd8438c1ff32 extends Twig_Template
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
        $__internal_edcba20b72765632180cfd7e2471b2b942e6f744760d53c0bf11db498324a2c7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_edcba20b72765632180cfd7e2471b2b942e6f744760d53c0bf11db498324a2c7->enter($__internal_edcba20b72765632180cfd7e2471b2b942e6f744760d53c0bf11db498324a2c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebcommandBundle:Layout:base.html.twig"));

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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/91ec1a2_bootstrap.min_1.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">

        ";
            // asset "91ec1a2_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/91ec1a2_part_2_style_1.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">

        ";
            // asset "91ec1a2_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/91ec1a2_part_2_style_2.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">

        ";
        } else {
            // asset "91ec1a2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_91ec1a2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/91ec1a2.css");
            // line 14
            echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/c9929cf_jquery.min_1.js");
            // line 29
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "c9929cf_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/c9929cf_bootstrap.min_2.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "c9929cf_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/c9929cf_functions_3.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "c9929cf"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_c9929cf") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/c9929cf.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
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
        
        $__internal_edcba20b72765632180cfd7e2471b2b942e6f744760d53c0bf11db498324a2c7->leave($__internal_edcba20b72765632180cfd7e2471b2b942e6f744760d53c0bf11db498324a2c7_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_2ddbd578e48e81f007d956af1729b6b13f233677cdb64f3d4911ad72ebdce6a7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2ddbd578e48e81f007d956af1729b6b13f233677cdb64f3d4911ad72ebdce6a7->enter($__internal_2ddbd578e48e81f007d956af1729b6b13f233677cdb64f3d4911ad72ebdce6a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "WebCommand";
        
        $__internal_2ddbd578e48e81f007d956af1729b6b13f233677cdb64f3d4911ad72ebdce6a7->leave($__internal_2ddbd578e48e81f007d956af1729b6b13f233677cdb64f3d4911ad72ebdce6a7_prof);

    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_8e9e798e9aacace8c06d02220d5d012f8e091b0d74dc852a1a6aef943f920dca = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8e9e798e9aacace8c06d02220d5d012f8e091b0d74dc852a1a6aef943f920dca->enter($__internal_8e9e798e9aacace8c06d02220d5d012f8e091b0d74dc852a1a6aef943f920dca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 20
        echo "        ";
        
        $__internal_8e9e798e9aacace8c06d02220d5d012f8e091b0d74dc852a1a6aef943f920dca->leave($__internal_8e9e798e9aacace8c06d02220d5d012f8e091b0d74dc852a1a6aef943f920dca_prof);

    }

    // line 33
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_4f7681f7cadf5ffffda237ceb902033a344c93dfff473ed9cdc36e9f1c47d039 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4f7681f7cadf5ffffda237ceb902033a344c93dfff473ed9cdc36e9f1c47d039->enter($__internal_4f7681f7cadf5ffffda237ceb902033a344c93dfff473ed9cdc36e9f1c47d039_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 34
        echo "        ";
        
        $__internal_4f7681f7cadf5ffffda237ceb902033a344c93dfff473ed9cdc36e9f1c47d039->leave($__internal_4f7681f7cadf5ffffda237ceb902033a344c93dfff473ed9cdc36e9f1c47d039_prof);

    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        $__internal_1dc365089be04b3a5764d69602c49d3d951e53ed3f6c672342a5346ca8771f9b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1dc365089be04b3a5764d69602c49d3d951e53ed3f6c672342a5346ca8771f9b->enter($__internal_1dc365089be04b3a5764d69602c49d3d951e53ed3f6c672342a5346ca8771f9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 41
        echo "                    ";
        
        $__internal_1dc365089be04b3a5764d69602c49d3d951e53ed3f6c672342a5346ca8771f9b->leave($__internal_1dc365089be04b3a5764d69602c49d3d951e53ed3f6c672342a5346ca8771f9b_prof);

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
        return array (  196 => 41,  190 => 40,  183 => 34,  177 => 33,  170 => 20,  164 => 19,  152 => 4,  139 => 42,  137 => 40,  130 => 35,  128 => 33,  124 => 31,  98 => 29,  94 => 23,  90 => 21,  88 => 19,  85 => 18,  78 => 15,  75 => 14,  67 => 15,  64 => 14,  57 => 15,  54 => 14,  47 => 15,  44 => 14,  40 => 10,  31 => 4,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <title>{% block title %}WebCommand{% endblock %}</title>

        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        {% stylesheets 
            '@WebcommandBundle/Resources/public/vendors/bootstrap/css/bootstrap.min.css'
            '@WebcommandBundle/Resources/public/css/*'
        %}

            <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset_url }}\">

        {% endstylesheets %}

        {% block stylesheets %}
        {% endblock %}

        
        {% javascripts
            '@WebcommandBundle/Resources/public/js/jquery.min.js'
            '@WebcommandBundle/Resources/public/vendors/bootstrap/js/bootstrap.min.js'
            '@WebcommandBundle/Resources/public/js/functions.js'
            
        %}
            <script src=\"{{ asset_url }}\"></script>
        {% endjavascripts %}


        {% block javascript %}
        {% endblock %}
        </head>

        <body>
            <div class=\"container\"> 

                    {% block body %}
                    {% endblock %}
              
             </div>   

         </body>
 

 </html>", "WebcommandBundle:Layout:base.html.twig", "/var/www/html/sga/src/WebcommandBundle/Resources/views/Layout/base.html.twig");
    }
}
