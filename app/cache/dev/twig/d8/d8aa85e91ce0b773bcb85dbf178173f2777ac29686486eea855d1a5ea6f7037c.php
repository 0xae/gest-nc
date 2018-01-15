<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_c8dbb62625969cfd447ec801ea058a00d4130fa7b6b9ffd85218b1cd607aa653 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("BackendBundle:Default:base.html.twig", "FOSUserBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BackendBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_16f61ae795ba8d40fc64ad07c16933c57386e74450dadcbd3dfdeb43d1787ce5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_16f61ae795ba8d40fc64ad07c16933c57386e74450dadcbd3dfdeb43d1787ce5->enter($__internal_16f61ae795ba8d40fc64ad07c16933c57386e74450dadcbd3dfdeb43d1787ce5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_16f61ae795ba8d40fc64ad07c16933c57386e74450dadcbd3dfdeb43d1787ce5->leave($__internal_16f61ae795ba8d40fc64ad07c16933c57386e74450dadcbd3dfdeb43d1787ce5_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_762dfd8647aed96967f3098b7e85fda574e7f9a48430b38e589ed02efe93b002 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_762dfd8647aed96967f3098b7e85fda574e7f9a48430b38e589ed02efe93b002->enter($__internal_762dfd8647aed96967f3098b7e85fda574e7f9a48430b38e589ed02efe93b002_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Log In";
        
        $__internal_762dfd8647aed96967f3098b7e85fda574e7f9a48430b38e589ed02efe93b002->leave($__internal_762dfd8647aed96967f3098b7e85fda574e7f9a48430b38e589ed02efe93b002_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_64f05730cfc17d0d145c0a742e3ba2f926a8b8a4bb1c35e114c523f13e9e7a8a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_64f05730cfc17d0d145c0a742e3ba2f926a8b8a4bb1c35e114c523f13e9e7a8a->enter($__internal_64f05730cfc17d0d145c0a742e3ba2f926a8b8a4bb1c35e114c523f13e9e7a8a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<body class=\"hold-transition login-page\">
        ";
        // line 8
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "     ";
        
        $__internal_64f05730cfc17d0d145c0a742e3ba2f926a8b8a4bb1c35e114c523f13e9e7a8a->leave($__internal_64f05730cfc17d0d145c0a742e3ba2f926a8b8a4bb1c35e114c523f13e9e7a8a_prof);

    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        $__internal_da7c2ce6aea7fa833272f8bc35111aecb80cb83aff5de7322556177d29f4670b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_da7c2ce6aea7fa833272f8bc35111aecb80cb83aff5de7322556177d29f4670b->enter($__internal_da7c2ce6aea7fa833272f8bc35111aecb80cb83aff5de7322556177d29f4670b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 9
        echo "            ";
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 52
        echo "
";
        
        $__internal_da7c2ce6aea7fa833272f8bc35111aecb80cb83aff5de7322556177d29f4670b->leave($__internal_da7c2ce6aea7fa833272f8bc35111aecb80cb83aff5de7322556177d29f4670b_prof);

    }

    // line 9
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_f02e7884db1cd51b193504debad1a9f6528fde0bb886bbcee913d0325ac82b54 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f02e7884db1cd51b193504debad1a9f6528fde0bb886bbcee913d0325ac82b54->enter($__internal_f02e7884db1cd51b193504debad1a9f6528fde0bb886bbcee913d0325ac82b54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 10
        echo "

<div class=\"login-box\">
  <div class=\"login-logo\">
    <a href=\"#\"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class=\"login-box-body\" style=\"border-radius:5px;\">

    <form action=";
        // line 19
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_check");
        echo " method=\"post\">
     <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, ($context["csrf_token"] ?? $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

      <div class=\"form-group has-feedback\">
        <input type=\"text\" class=\"form-control\" placeholder=";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo " name=\"_username\" value=\"";
        echo twig_escape_filter($this->env, ($context["last_username"] ?? $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\">
        </div>

      <div class=\"form-group has-feedback\">
        <input type=\"password\" class=\"form-control\" placeholder=";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo " name=\"_password\" required=\"required\">
        </div>
      <div class=\"row\">
        <div class=\"col-xs-8\">
          <div class=\"checkbox icheck\" style=\"margin-left: 21px;\">
            <label> <input type=\"checkbox\"  name=\"_remember_me\" value=\"on\"> ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo " </label>
          </div>
        </div>
        <!-- /.col -->
        <div class=\"col-xs-4\">
          <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\"  value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" >Entrar</button>
        </div>
        <!-- /.col -->
      </div>
      ";
        // line 41
        if (($context["error"] ?? $this->getContext($context, "error"))) {
            // line 42
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["error"] ?? $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
        ";
        }
        // line 44
        echo "    </form>
  </div>
  <!-- /.login-box-body -->
</div>

</body>

            ";
        
        $__internal_f02e7884db1cd51b193504debad1a9f6528fde0bb886bbcee913d0325ac82b54->leave($__internal_f02e7884db1cd51b193504debad1a9f6528fde0bb886bbcee913d0325ac82b54_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 44,  146 => 42,  144 => 41,  137 => 37,  129 => 32,  121 => 27,  112 => 23,  106 => 20,  102 => 19,  91 => 10,  85 => 9,  77 => 52,  74 => 9,  68 => 8,  61 => 54,  59 => 8,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'BackendBundle:Default:base.html.twig' %}

{% block title %}Log In{% endblock %}

{% block body  %}

<body class=\"hold-transition login-page\">
        {% block content %}
            {% block fos_user_content %}


<div class=\"login-box\">
  <div class=\"login-logo\">
    <a href=\"#\"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class=\"login-box-body\" style=\"border-radius:5px;\">

    <form action={{ path(\"fos_user_security_check\") }} method=\"post\">
     <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token }}\" />

      <div class=\"form-group has-feedback\">
        <input type=\"text\" class=\"form-control\" placeholder={{ 'security.login.username'|trans({}, 'FOSUserBundle') }} name=\"_username\" value=\"{{ last_username }}\" required=\"required\">
        </div>

      <div class=\"form-group has-feedback\">
        <input type=\"password\" class=\"form-control\" placeholder={{ 'security.login.password'|trans({}, 'FOSUserBundle') }} name=\"_password\" required=\"required\">
        </div>
      <div class=\"row\">
        <div class=\"col-xs-8\">
          <div class=\"checkbox icheck\" style=\"margin-left: 21px;\">
            <label> <input type=\"checkbox\"  name=\"_remember_me\" value=\"on\"> {{ 'security.login.remember_me'|trans({}, 'FOSUserBundle') }} </label>
          </div>
        </div>
        <!-- /.col -->
        <div class=\"col-xs-4\">
          <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\"  value=\"{{ 'security.login.submit'|trans({}, 'FOSUserBundle') }}\" >Entrar</button>
        </div>
        <!-- /.col -->
      </div>
      {% if error %}
            <div>{{ error|trans({}, 'FOSUserBundle') }}</div>
        {% endif %}
    </form>
  </div>
  <!-- /.login-box-body -->
</div>

</body>

            {% endblock fos_user_content %}

{% endblock %}
     {% endblock %}", "FOSUserBundle:Security:login.html.twig", "/var/www/html/sga/src/Admin/Backend/Resources/views/Security/login.html.twig");
    }
}
