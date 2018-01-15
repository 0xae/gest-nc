<?php

/* FOSUserBundle:Registration:confirmed.html.twig */
class __TwigTemplate_d8aab3f652d4b0d72695edbd5f5f979a71d64bc513c3b5e86dfd990dd1b464a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Registration:confirmed.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        echo "    <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("registration.confirmed", array("%username%" => $this->getAttribute(($context["user"] ?? null), "username", array())), "FOSUserBundle"), "html", null, true);
        echo "</p>
    ";
        // line 5
        if ( !twig_test_empty($this->getAttribute(($context["app"] ?? null), "session", array()))) {
            // line 6
            echo "        ";
            $context["targetUrl"] = $this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", array()), "get", array(0 => (("_security." . $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "security", array()), "token", array()), "providerKey", array())) . ".target_path")), "method");
            // line 7
            echo "        ";
            if ( !twig_test_empty(($context["targetUrl"] ?? null))) {
                echo "<p><a href=\"";
                echo twig_escape_filter($this->env, ($context["targetUrl"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("registration.back", array(), "FOSUserBundle"), "html", null, true);
                echo "</a></p>";
            }
            // line 8
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:confirmed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 8,  41 => 7,  38 => 6,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "FOSUserBundle:Registration:confirmed.html.twig", "/var/www/html/sga/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/views/Registration/confirmed.html.twig");
    }
}
