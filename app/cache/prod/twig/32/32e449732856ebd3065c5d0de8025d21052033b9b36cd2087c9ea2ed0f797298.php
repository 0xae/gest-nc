<?php

/* WebcommandBundle:WebcommandBundle:index.html.twig */
class __TwigTemplate_7b2c33b38a398d289b47d1d7e0f3dbba73aceeabd894f7ddcc679bccb9788991 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("WebcommandBundle:Layout:base.html.twig", "WebcommandBundle:WebcommandBundle:index.html.twig", 1);
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, ($context["response"] ?? null), "html", null, true);
        echo "

";
    }

    public function getTemplateName()
    {
        return "WebcommandBundle:WebcommandBundle:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "WebcommandBundle:WebcommandBundle:index.html.twig", "/var/www/html/sga/src/WebcommandBundle/Resources/views/WebcommandBundle/index.html.twig");
    }
}
