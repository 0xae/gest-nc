<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_28256545ea5526111248869d7f3afeb3adf1021b8bf50e7c379468e36199766b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ed06adc794a4a8b8696e6e87c97d169cf125e4450f41d5645b0d5bbf529165f8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ed06adc794a4a8b8696e6e87c97d169cf125e4450f41d5645b0d5bbf529165f8->enter($__internal_ed06adc794a4a8b8696e6e87c97d169cf125e4450f41d5645b0d5bbf529165f8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ed06adc794a4a8b8696e6e87c97d169cf125e4450f41d5645b0d5bbf529165f8->leave($__internal_ed06adc794a4a8b8696e6e87c97d169cf125e4450f41d5645b0d5bbf529165f8_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_106975b4c667da0779c97a35f00a296c5acfaea4b6e384146b7d59d916c59635 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_106975b4c667da0779c97a35f00a296c5acfaea4b6e384146b7d59d916c59635->enter($__internal_106975b4c667da0779c97a35f00a296c5acfaea4b6e384146b7d59d916c59635_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_106975b4c667da0779c97a35f00a296c5acfaea4b6e384146b7d59d916c59635->leave($__internal_106975b4c667da0779c97a35f00a296c5acfaea4b6e384146b7d59d916c59635_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_039eb2641226cab82fb884f43287eeaca536280a7c1ab99260ea47c5b61a439c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_039eb2641226cab82fb884f43287eeaca536280a7c1ab99260ea47c5b61a439c->enter($__internal_039eb2641226cab82fb884f43287eeaca536280a7c1ab99260ea47c5b61a439c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_039eb2641226cab82fb884f43287eeaca536280a7c1ab99260ea47c5b61a439c->leave($__internal_039eb2641226cab82fb884f43287eeaca536280a7c1ab99260ea47c5b61a439c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_971e2c96fa1978df4b8f35f39956d10280f894f1fbca4414a9d17649f8ac0fdd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_971e2c96fa1978df4b8f35f39956d10280f894f1fbca4414a9d17649f8ac0fdd->enter($__internal_971e2c96fa1978df4b8f35f39956d10280f894f1fbca4414a9d17649f8ac0fdd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_971e2c96fa1978df4b8f35f39956d10280f894f1fbca4414a9d17649f8ac0fdd->leave($__internal_971e2c96fa1978df4b8f35f39956d10280f894f1fbca4414a9d17649f8ac0fdd_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'TwigBundle::layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include 'TwigBundle:Exception:exception.html.twig' %}
{% endblock %}
", "TwigBundle:Exception:exception_full.html.twig", "/var/www/html/sga/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
