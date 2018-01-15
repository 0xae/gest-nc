<?php

/* BackendBundle:Default:base.html.twig */
class __TwigTemplate_5a49dd0f6253cd531bc2c02296f55e3f2a5041cd358c5191be08ec2c541beb70 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8591be9daad68c95aafcaa456f0ea01baf92dbbd5d35dfd05b379d5da97fdd68 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8591be9daad68c95aafcaa456f0ea01baf92dbbd5d35dfd05b379d5da97fdd68->enter($__internal_8591be9daad68c95aafcaa456f0ea01baf92dbbd5d35dfd05b379d5da97fdd68_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendBundle:Default:base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
       <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <title>
        ";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        // line 9
        echo "        </title>
       <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />


        ";
        // line 13
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "128a07c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_bootstrap.min_1.css");
            // line 22
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_font-awesome.min_2.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_ionicons.min_3.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_3") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_jquery-jvectormap-1.2.2_4.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_4") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_AdminLTE.min_5.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_5") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_blue_6.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_6") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c_pace.min_7.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "128a07c_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c_7") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c__all-skins.min_8.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        } else {
            // asset "128a07c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_128a07c") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/css/128a07c.css");
            echo "               <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        }
        unset($context["asset_url"]);
        // line 24
        echo "
       </head>

        <div class=\"wrapper\">


        ";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 33
        echo "
          </div>
      

        ";
        // line 37
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "8f32464_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_jQuery-2.2.0.min_1.js");
            // line 51
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_bootstrap.min_2.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_fastclick_3.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_3") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_app.min_4.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_4") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_jquery.sparkline.min_5.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_5") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_jquery-jvectormap-1.2.2.min_6.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_6") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_jquery-jvectormap-world-mill-en_7.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_7") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_jquery.slimscroll.min_8.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_8") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_Chart.min_9.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_9") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_dashboard2_10.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_10") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_demo_11.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_11") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_pace.min_12.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "8f32464_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464_12") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464_icheck.min_13.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "8f32464"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_8f32464") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/js/8f32464.js");
            echo "          <script src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 53
        echo "
            <script type=\"text/javascript\">

                \$('.send').click(function(){

                  \$.ajax({
                      url: '',
                      type: 'post',
                      data: {},
                      success: function (data) {
                        console.log(data);
                      }
                    });



            });




</script>

</html>";
        
        $__internal_8591be9daad68c95aafcaa456f0ea01baf92dbbd5d35dfd05b379d5da97fdd68->leave($__internal_8591be9daad68c95aafcaa456f0ea01baf92dbbd5d35dfd05b379d5da97fdd68_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_9d6202a8562c9d0b32404fabd17ca573b8e4f512d26084c4015a3d02b78ccacb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9d6202a8562c9d0b32404fabd17ca573b8e4f512d26084c4015a3d02b78ccacb->enter($__internal_9d6202a8562c9d0b32404fabd17ca573b8e4f512d26084c4015a3d02b78ccacb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Bem vindo!";
        
        $__internal_9d6202a8562c9d0b32404fabd17ca573b8e4f512d26084c4015a3d02b78ccacb->leave($__internal_9d6202a8562c9d0b32404fabd17ca573b8e4f512d26084c4015a3d02b78ccacb_prof);

    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
        $__internal_0395508ca6ec4dde93276a5186ca5c8b694720f406575e3fb86612d41996e115 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0395508ca6ec4dde93276a5186ca5c8b694720f406575e3fb86612d41996e115->enter($__internal_0395508ca6ec4dde93276a5186ca5c8b694720f406575e3fb86612d41996e115_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 31
        echo "
        ";
        
        $__internal_0395508ca6ec4dde93276a5186ca5c8b694720f406575e3fb86612d41996e115->leave($__internal_0395508ca6ec4dde93276a5186ca5c8b694720f406575e3fb86612d41996e115_prof);

    }

    public function getTemplateName()
    {
        return "BackendBundle:Default:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 31,  252 => 30,  240 => 8,  210 => 53,  124 => 51,  120 => 37,  114 => 33,  112 => 30,  104 => 24,  48 => 22,  44 => 13,  38 => 10,  35 => 9,  33 => 8,  24 => 1,);
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
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
       <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <title>
        {% block title %}Bem vindo!{% endblock %}
        </title>
       <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />


        {% stylesheets
                '@BackendBundle/Resources/public/css/bootstrap.min.css'
                '@BackendBundle/Resources/public/css/font-awesome.min.css'
                '@BackendBundle/Resources/public/css/ionicons.min.css'
                '@BackendBundle/Resources/public/css/jquery-jvectormap-1.2.2.css'
                '@BackendBundle/Resources/public/css/AdminLTE.min.css'
                 '@BackendBundle/Resources/public/css/blue.css'
                  '@BackendBundle/Resources/public/css/pace.min.css'
               '@BackendBundle/Resources/public/css/_all-skins.min.css'%}
               <link rel=\"stylesheet\" href=\"{{ asset_url }}\" />
        {% endstylesheets %}

       </head>

        <div class=\"wrapper\">


        {% block body %}

        {% endblock %}

          </div>
      

        {% javascripts
          '@BackendBundle/Resources/public/js/jQuery-2.2.0.min.js'
          '@BackendBundle/Resources/public/js/bootstrap.min.js'
          '@BackendBundle/Resources/public/js/fastclick.js'
          '@BackendBundle/Resources/public/js/app.min.js'
          '@BackendBundle/Resources/public/js/jquery.sparkline.min.js'
          '@BackendBundle/Resources/public/js/jquery-jvectormap-1.2.2.min.js'
          '@BackendBundle/Resources/public/js/jquery-jvectormap-world-mill-en.js'
          '@BackendBundle/Resources/public/js/jquery.slimscroll.min.js'
          '@BackendBundle/Resources/public/js/Chart.min.js'
          '@BackendBundle/Resources/public/js/dashboard2.js'
          '@BackendBundle/Resources/public/js/demo.js'
           '@BackendBundle/Resources/public/js/pace.min.js'
           '@BackendBundle/Resources/public/js/icheck.min.js'%}
          <script src=\"{{ asset_url }}\"></script>
        {% endjavascripts %}

            <script type=\"text/javascript\">

                \$('.send').click(function(){

                  \$.ajax({
                      url: '',
                      type: 'post',
                      data: {},
                      success: function (data) {
                        console.log(data);
                      }
                    });



            });




</script>

</html>", "BackendBundle:Default:base.html.twig", "/var/www/html/sga/src/Admin/Backend/Resources/views/Default/base.html.twig");
    }
}
