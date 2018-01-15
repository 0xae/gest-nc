<?php

/* WebcommandBundle:WebcommandBundle:menu.html.twig */
class __TwigTemplate_6c02d401b5bae4f64344282d29b6dc09256131383233eb07b819478505c326b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("WebcommandBundle:Layout:base.html.twig", "WebcommandBundle:WebcommandBundle:menu.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebcommandBundle:Layout:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_053c883bb4c3337c3c0036a0ed82bab7d340ef5bd009013a34502453f9b10087 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_053c883bb4c3337c3c0036a0ed82bab7d340ef5bd009013a34502453f9b10087->enter($__internal_053c883bb4c3337c3c0036a0ed82bab7d340ef5bd009013a34502453f9b10087_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebcommandBundle:WebcommandBundle:menu.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_053c883bb4c3337c3c0036a0ed82bab7d340ef5bd009013a34502453f9b10087->leave($__internal_053c883bb4c3337c3c0036a0ed82bab7d340ef5bd009013a34502453f9b10087_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_a0bad58989a1263b1b0ac5685ccc590d65415205d76dca87b1fc87da687ad8b6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a0bad58989a1263b1b0ac5685ccc590d65415205d76dca87b1fc87da687ad8b6->enter($__internal_a0bad58989a1263b1b0ac5685ccc590d65415205d76dca87b1fc87da687ad8b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "<nav class=\"navbar navbar-default navbar-fixed-top\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"#\">WebCommand</a>
    </div>
</nav>
<div class=\"container\">
    <div class=\"row\">
        <form class=\"form-horizontal\" action=\"";
        // line 10
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("commandrunner", array("commandName" => "cache:clear"));
        echo "\" method=\"POST\">
            <fieldset>
                <!-- Form Name -->
                <legend>Select Options</legend>
                <!-- Button -->
                <div class=\"form-group\">
                    <label class=\"col-md-6 control-label\" for=\"singlebutton\">Limpar cache</label>
                    <div class=\"col-md-6\">
                        <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Limpar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <form class=\"form-horizontal\" action=\"";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("commandrunner", array("commandName" => "doctrine:schema:update --force "));
        echo "\" method=\"POST\">
            <!-- Button -->
            <div class=\"form-group\">
                <label class=\"col-md-6 control-label\" for=\"singlebutton\">Actualizar Base de dados</label>
                <div class=\"col-md-6\">
                    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Actualizar</button>
                </div>
            </div>
        </form>
        <form class=\"form-horizontal\" action=\"";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("commandrunner", array("commandName" => "assets:install"));
        echo "\" method=\"POST\">
            <!-- Button -->
            <div class=\"form-group\">
                <label class=\"col-md-6 control-label\" for=\"singlebutton\">Install Assets</label>
                <div class=\"col-md-6\">
                    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Install</button>
                </div>
            </div>
        </form>
    </div>
</div>
<footer>
    <p>&copy; Badiu.net</p>
</footer>
";
        
        $__internal_a0bad58989a1263b1b0ac5685ccc590d65415205d76dca87b1fc87da687ad8b6->leave($__internal_a0bad58989a1263b1b0ac5685ccc590d65415205d76dca87b1fc87da687ad8b6_prof);

    }

    public function getTemplateName()
    {
        return "WebcommandBundle:WebcommandBundle:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 32,  65 => 23,  49 => 10,  40 => 3,  34 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'WebcommandBundle:Layout:base.html.twig' %}
{% block body %}
<nav class=\"navbar navbar-default navbar-fixed-top\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"#\">WebCommand</a>
    </div>
</nav>
<div class=\"container\">
    <div class=\"row\">
        <form class=\"form-horizontal\" action=\"{{path('commandrunner', {'commandName':'cache:clear'})}}\" method=\"POST\">
            <fieldset>
                <!-- Form Name -->
                <legend>Select Options</legend>
                <!-- Button -->
                <div class=\"form-group\">
                    <label class=\"col-md-6 control-label\" for=\"singlebutton\">Limpar cache</label>
                    <div class=\"col-md-6\">
                        <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Limpar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <form class=\"form-horizontal\" action=\"{{path('commandrunner', {'commandName':'doctrine:schema:update --force '})}}\" method=\"POST\">
            <!-- Button -->
            <div class=\"form-group\">
                <label class=\"col-md-6 control-label\" for=\"singlebutton\">Actualizar Base de dados</label>
                <div class=\"col-md-6\">
                    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Actualizar</button>
                </div>
            </div>
        </form>
        <form class=\"form-horizontal\" action=\"{{path('commandrunner', {'commandName':'assets:install'})}}\" method=\"POST\">
            <!-- Button -->
            <div class=\"form-group\">
                <label class=\"col-md-6 control-label\" for=\"singlebutton\">Install Assets</label>
                <div class=\"col-md-6\">
                    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Install</button>
                </div>
            </div>
        </form>
    </div>
</div>
<footer>
    <p>&copy; Badiu.net</p>
</footer>
{% endblock %}", "WebcommandBundle:WebcommandBundle:menu.html.twig", "/var/www/html/sga/src/WebcommandBundle/Resources/views/WebcommandBundle/menu.html.twig");
    }
}
