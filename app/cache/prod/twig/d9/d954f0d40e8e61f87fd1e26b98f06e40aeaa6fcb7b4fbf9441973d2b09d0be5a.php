<?php

/* AsdisSityBundle:Default:base.html.twig */
class __TwigTemplate_27af404763dfd18aef12518fcf919e862aa7a4af80b9fe63db9efd493baceb20 extends Twig_Template
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


        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />       
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/css/animate.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/css/prettyPhoto.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/css/responsiveslides.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />



    </head>
    <body>
        ";
        // line 24
        $this->displayBlock('body', $context, $blocks);
        // line 27
        echo "
<script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/jquery-2.1.1.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>
<script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>
<script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/jquery.prettyPhoto.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>
<script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/jquery.isotope.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>
<script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/wow.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>
<script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/responsiveslides.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>
<script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/asdissity/js/functions.js"), "html", null, true);
        echo "\" type=\"text/javascript\"  /></script>


<script type=\"text/javascript\">

    \$(function () {

        // Slideshow 1
        \$(\"#slider1\").responsiveSlides({
            maxwidth: 1500,
            speed: 1200,
            pager: false
        });
    });
</script>


</body>


</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Asdis";
    }

    // line 24
    public function block_body($context, array $blocks = array())
    {
        // line 25
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "AsdisSityBundle:Default:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 25,  130 => 24,  124 => 8,  99 => 34,  95 => 33,  91 => 32,  87 => 31,  83 => 30,  79 => 29,  75 => 28,  72 => 27,  70 => 24,  61 => 18,  57 => 17,  53 => 16,  49 => 15,  45 => 14,  41 => 13,  35 => 10,  32 => 9,  30 => 8,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Default:base.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Default/base.html.twig");
    }
}
