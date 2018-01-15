<?php

/* BackendBundle:Home:home.html.twig */
class __TwigTemplate_c67b8c54bae0bace00a7593621cc46deecfe2efb5f313892a128e6067d88692d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("BackendBundle:Default:layout.html.twig", "BackendBundle:Home:home.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BackendBundle:Default:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_65c9513e9c3da05a7f8f2e4d5d2b912df681bbd6998d21560dc9afc3b4ed780a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_65c9513e9c3da05a7f8f2e4d5d2b912df681bbd6998d21560dc9afc3b4ed780a->enter($__internal_65c9513e9c3da05a7f8f2e4d5d2b912df681bbd6998d21560dc9afc3b4ed780a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendBundle:Home:home.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_65c9513e9c3da05a7f8f2e4d5d2b912df681bbd6998d21560dc9afc3b4ed780a->leave($__internal_65c9513e9c3da05a7f8f2e4d5d2b912df681bbd6998d21560dc9afc3b4ed780a_prof);

    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        $__internal_e09a092660644fe5c6020be6b756008cfe6c1c3669780db6e3a936211529890a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e09a092660644fe5c6020be6b756008cfe6c1c3669780db6e3a936211529890a->enter($__internal_e09a092660644fe5c6020be6b756008cfe6c1c3669780db6e3a936211529890a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 5
        echo "
<h1>Home</h1>


          ";
        
        $__internal_e09a092660644fe5c6020be6b756008cfe6c1c3669780db6e3a936211529890a->leave($__internal_e09a092660644fe5c6020be6b756008cfe6c1c3669780db6e3a936211529890a_prof);

    }

    public function getTemplateName()
    {
        return "BackendBundle:Home:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 5,  34 => 4,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'BackendBundle:Default:layout.html.twig' %}


   {% block content %}

<h1>Home</h1>


          {% endblock %}", "BackendBundle:Home:home.html.twig", "/var/www/html/sga/src/Admin/Backend/Resources/views/Home/home.html.twig");
    }
}
