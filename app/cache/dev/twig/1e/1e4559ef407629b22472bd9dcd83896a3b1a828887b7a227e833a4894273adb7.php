<?php

/* WebcommandBundle:WebcommandBundle:index.html.twig */
class __TwigTemplate_c769ad8c9ce44ca1552b71f9cd0c353db0dab7299320c2bdd0a5e93155203b86 extends Twig_Template
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
        $__internal_7861f0d34e288e5c9aa59ab7d7d9dbaf1115dc19d9ad00406881d8cb6465a2d5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7861f0d34e288e5c9aa59ab7d7d9dbaf1115dc19d9ad00406881d8cb6465a2d5->enter($__internal_7861f0d34e288e5c9aa59ab7d7d9dbaf1115dc19d9ad00406881d8cb6465a2d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebcommandBundle:WebcommandBundle:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7861f0d34e288e5c9aa59ab7d7d9dbaf1115dc19d9ad00406881d8cb6465a2d5->leave($__internal_7861f0d34e288e5c9aa59ab7d7d9dbaf1115dc19d9ad00406881d8cb6465a2d5_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_6c8e0c5ec663c1d2b2a06e6ba1b823887b1d943eaf88828bbd33a58c6a15fd80 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6c8e0c5ec663c1d2b2a06e6ba1b823887b1d943eaf88828bbd33a58c6a15fd80->enter($__internal_6c8e0c5ec663c1d2b2a06e6ba1b823887b1d943eaf88828bbd33a58c6a15fd80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo twig_escape_filter($this->env, ($context["response"] ?? $this->getContext($context, "response")), "html", null, true);
        echo "

";
        
        $__internal_6c8e0c5ec663c1d2b2a06e6ba1b823887b1d943eaf88828bbd33a58c6a15fd80->leave($__internal_6c8e0c5ec663c1d2b2a06e6ba1b823887b1d943eaf88828bbd33a58c6a15fd80_prof);

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
        return array (  40 => 4,  34 => 3,  11 => 1,);
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
{{ response }}

{% endblock %}
", "WebcommandBundle:WebcommandBundle:index.html.twig", "/var/www/html/sga/src/WebcommandBundle/Resources/views/WebcommandBundle/index.html.twig");
    }
}
