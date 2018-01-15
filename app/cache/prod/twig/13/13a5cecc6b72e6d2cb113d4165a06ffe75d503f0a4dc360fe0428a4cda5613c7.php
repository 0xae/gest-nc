<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_af6d1447962cce069f7d5d874e348591100fca6ae7989c111d28398bafcb407a extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Log In";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
<body class=\"hold-transition login-page\">
        ";
        // line 8
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "     ";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "            ";
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 52
        echo "
";
    }

    // line 9
    public function block_fos_user_content($context, array $blocks = array())
    {
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
        echo twig_escape_filter($this->env, ($context["csrf_token"] ?? null), "html", null, true);
        echo "\" />

      <div class=\"form-group has-feedback\">
        <input type=\"text\" class=\"form-control\" placeholder=";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo " name=\"_username\" value=\"";
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
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
        if (($context["error"] ?? null)) {
            // line 42
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["error"] ?? null), array(), "FOSUserBundle"), "html", null, true);
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
        return array (  125 => 44,  119 => 42,  117 => 41,  110 => 37,  102 => 32,  94 => 27,  85 => 23,  79 => 20,  75 => 19,  64 => 10,  61 => 9,  56 => 52,  53 => 9,  50 => 8,  46 => 54,  44 => 8,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "FOSUserBundle:Security:login.html.twig", "/var/www/html/sga/src/Admin/Backend/Resources/views/Security/login.html.twig");
    }
}
