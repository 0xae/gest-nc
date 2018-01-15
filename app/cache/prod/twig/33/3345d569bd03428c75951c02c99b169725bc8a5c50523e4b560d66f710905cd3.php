<?php

/* WebcommandBundle:WebcommandBundle:menu.html.twig */
class __TwigTemplate_18fac410322b865b9089e5b0abf7564d88018263747ffe46d37246a1dfd2aac6 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
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
        return array (  68 => 32,  56 => 23,  40 => 10,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "WebcommandBundle:WebcommandBundle:menu.html.twig", "/var/www/html/sga/src/WebcommandBundle/Resources/views/WebcommandBundle/menu.html.twig");
    }
}
