<?php

/* BackendBundle:Default:layout.html.twig */
class __TwigTemplate_1ca25de10e593e5676726f75c0ad1e0bc22d652e97149532dbf957b75d272178 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("BackendBundle:Default:base.html.twig", "BackendBundle:Default:layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BackendBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ce701256fed3bba4b5f81a82a4fa4d6ec267bc1cc571d14d27bcc26ee94f20bf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ce701256fed3bba4b5f81a82a4fa4d6ec267bc1cc571d14d27bcc26ee94f20bf->enter($__internal_ce701256fed3bba4b5f81a82a4fa4d6ec267bc1cc571d14d27bcc26ee94f20bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendBundle:Default:layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ce701256fed3bba4b5f81a82a4fa4d6ec267bc1cc571d14d27bcc26ee94f20bf->leave($__internal_ce701256fed3bba4b5f81a82a4fa4d6ec267bc1cc571d14d27bcc26ee94f20bf_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_7f3ea27a3e4abec4a2cb851a410585de094930daac76065065fb534a490e7f54 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7f3ea27a3e4abec4a2cb851a410585de094930daac76065065fb534a490e7f54->enter($__internal_7f3ea27a3e4abec4a2cb851a410585de094930daac76065065fb534a490e7f54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Administração";
        
        $__internal_7f3ea27a3e4abec4a2cb851a410585de094930daac76065065fb534a490e7f54->leave($__internal_7f3ea27a3e4abec4a2cb851a410585de094930daac76065065fb534a490e7f54_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_e622539388ac09a3eb2703e729a4fea69d6c0afc49cac827ef4cca9805ac4949 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e622539388ac09a3eb2703e729a4fea69d6c0afc49cac827ef4cca9805ac4949->enter($__internal_e622539388ac09a3eb2703e729a4fea69d6c0afc49cac827ef4cca9805ac4949_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "
<body class=\"skin-blue sidebar-mini pace-done fixed\">
<div class=\"pace  pace-inactive\"><div class=\"pace-progress\" style=\"transform: translate3d(100%, 0px, 0px);\" data-progress-text=\"100%\" data-progress=\"99\">
  <div class=\"pace-progress-inner\"></div>
</div>
<div class=\"pace-activity\"></div></div>
<header class=\"main-header\">

    <!-- Logo -->
    <a href=\"index2.html\" class=\"logo\">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class=\"logo-mini\"><b>S</b>GA</span>
      <!-- logo for regular state and mobile devices -->
      <span class=\"logo-lg\"><b>SGA</b> 1.0</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class=\"navbar navbar-static-top\" role=\"navigation\">
      <!-- Sidebar toggle button-->
      <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
        <span class=\"sr-only\">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class=\"navbar-custom-menu\">
        <ul class=\"nav navbar-nav\">
          <!-- Messages: style can be found in dropdown.less-->
          <li class=\"dropdown messages-menu\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-envelope-o\"></i>
              <span class=\"label label-success\">4</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class=\"dropdown user user-menu\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

            ";
        // line 44
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d84ab0f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_d84ab0f_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/images/d84ab0f_user2-160x160_1.jpg");
            // line 45
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" class=\"user-image\" alt=\"User Image!\" />
             ";
        } else {
            // asset "d84ab0f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_d84ab0f") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/images/d84ab0f.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" class=\"user-image\" alt=\"User Image!\" />
             ";
        }
        unset($context["asset_url"]);
        // line 47
        echo "
              <span class=\"hidden-xs\"> ";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
        echo "</span>
            </a>
            <ul class=\"dropdown-menu\">
              <!-- User image -->
              <li class=\"user-header\">


         ";
        // line 55
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d84ab0f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_d84ab0f_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/images/d84ab0f_user2-160x160_1.jpg");
            // line 56
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" class=\"img-circle\" alt=\"User Image!\" />
             ";
        } else {
            // asset "d84ab0f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_d84ab0f") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("_controller/images/d84ab0f.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" class=\"img-circle\" alt=\"User Image!\" />
             ";
        }
        unset($context["asset_url"]);
        // line 58
        echo "
                <p>
                   ";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
        echo "
                  <small>";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.logged_in_as", array("%username%" => twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "user", array()), "lastlogin", array()), "d-m-y")), "FOSUserBundle"), "html", null, true);
        echo "</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class=\"user-footer\">
                <div class=\"pull-left\">
                  <a href=\"";
        // line 67
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_profile_show");
        echo "\" class=\"btn btn-default btn-flat\">Perfil</a>
                </div>
                <div class=\"pull-right\">
                  <a href=\"";
        // line 70
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
        echo "\" class=\"btn btn-default btn-flat\">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<!-- end header -->

<aside class=\"main-sidebar\">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class=\"sidebar\" style=\"height: auto;\">
     <ul class=\"sidebar-menu\">
        <li class=\"header\"></li>
        <li class=\"active treeview\">
          <a href=\"#\">
            <i class=\"fa fa-dashboard\"></i> <span>Dashboard</span> <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"dashboard\"><i class=\"fa fa-circle-o\"></i> Pagina principal</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-laptop\"></i>
            <span>UI Elements</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/UI/general.html\"><i class=\"fa fa-circle-o\"></i> General</a></li>
            <li><a href=\"pages/UI/icons.html\"><i class=\"fa fa-circle-o\"></i> Icons</a></li>
            <li><a href=\"pages/UI/buttons.html\"><i class=\"fa fa-circle-o\"></i> Buttons</a></li>
            <li><a href=\"pages/UI/sliders.html\"><i class=\"fa fa-circle-o\"></i> Sliders</a></li>
            <li><a href=\"pages/UI/timeline.html\"><i class=\"fa fa-circle-o\"></i> Timeline</a></li>
            <li><a href=\"pages/UI/modals.html\"><i class=\"fa fa-circle-o\"></i> Modals</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-edit\"></i> <span>Forms</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/forms/general.html\"><i class=\"fa fa-circle-o\"></i> General Elements</a></li>
            <li><a href=\"pages/forms/advanced.html\"><i class=\"fa fa-circle-o\"></i> Advanced Elements</a></li>
            <li><a href=\"pages/forms/editors.html\"><i class=\"fa fa-circle-o\"></i> Editors</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-table\"></i> <span>Tables</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/tables/simple.html\"><i class=\"fa fa-circle-o\"></i> Simple tables</a></li>
            <li><a href=\"pages/tables/data.html\"><i class=\"fa fa-circle-o\"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href=\"pages/calendar.html\">
            <i class=\"fa fa-calendar\"></i> <span>Calendar</span>
            <small class=\"label pull-right bg-red\">3</small>
          </a>
        </li>
        <li>
          <a href=\"pages/mailbox/mailbox.html\">
            <i class=\"fa fa-envelope\"></i> <span>Mailbox</span>
            <small class=\"label pull-right bg-yellow\">12</small>
          </a>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-folder\"></i> <span>Examples</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/examples/invoice.html\"><i class=\"fa fa-circle-o\"></i> Invoice</a></li>
            <li><a href=\"pages/examples/profile.html\"><i class=\"fa fa-circle-o\"></i> Profile</a></li>
            <li><a href=\"pages/examples/login.html\"><i class=\"fa fa-circle-o\"></i> Login</a></li>
            <li><a href=\"pages/examples/register.html\"><i class=\"fa fa-circle-o\"></i> Register</a></li>
            <li><a href=\"pages/examples/lockscreen.html\"><i class=\"fa fa-circle-o\"></i> Lockscreen</a></li>
            <li><a href=\"pages/examples/404.html\"><i class=\"fa fa-circle-o\"></i> 404 Error</a></li>
            <li><a href=\"pages/examples/500.html\"><i class=\"fa fa-circle-o\"></i> 500 Error</a></li>
            <li><a href=\"pages/examples/blank.html\"><i class=\"fa fa-circle-o\"></i> Blank Page</a></li>
            <li><a href=\"pages/examples/pace.html\"><i class=\"fa fa-circle-o\"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-share\"></i> <span>Multilevel</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
            <li>
              <a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One <i class=\"fa fa-angle-left pull-right\"></i></a>
              <ul class=\"treeview-menu\">
                <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two</a></li>
                <li>
                  <a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two <i class=\"fa fa-angle-left pull-right\"></i></a>
                  <ul class=\"treeview-menu\">
                    <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
                    <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href=\"documentation/index.html\"><i class=\"fa fa-book\"></i> <span>Documentation</span></a></li>
        <li class=\"header\">LABELS</li>
        <li><a href=\"#\"><i class=\"fa fa-circle-o text-red\"></i> <span>Important</span></a></li>
        <li><a href=\"#\"><i class=\"fa fa-circle-o text-yellow\"></i> <span>Warning</span></a></li>
        <li><a href=\"#\"><i class=\"fa fa-circle-o text-aqua\"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <div class=\"content-wrapper\" style=\"min-height: 916px;\">
 <section class=\"content\">
          ";
        // line 194
        $this->displayBlock('content', $context, $blocks);
        // line 211
        echo "
          </section>
</div>

</body>

";
        
        $__internal_e622539388ac09a3eb2703e729a4fea69d6c0afc49cac827ef4cca9805ac4949->leave($__internal_e622539388ac09a3eb2703e729a4fea69d6c0afc49cac827ef4cca9805ac4949_prof);

    }

    // line 194
    public function block_content($context, array $blocks = array())
    {
        $__internal_d22fc4e24c3afeba764b835947efcbd218bc848b8dbd5caaac29e764ae312e36 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d22fc4e24c3afeba764b835947efcbd218bc848b8dbd5caaac29e764ae312e36->enter($__internal_d22fc4e24c3afeba764b835947efcbd218bc848b8dbd5caaac29e764ae312e36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 195
        echo "

              <!--   <section class=\"content-header\">
                <h1>
                  Dashboard
                  <small>Version 2.0</small>
                </h1>
                <ol class=\"breadcrumb\">
                  <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
                  <li class=\"active\">Dashboard</li>
                </ol>
              </section> -->



          ";
        
        $__internal_d22fc4e24c3afeba764b835947efcbd218bc848b8dbd5caaac29e764ae312e36->leave($__internal_d22fc4e24c3afeba764b835947efcbd218bc848b8dbd5caaac29e764ae312e36_prof);

    }

    public function getTemplateName()
    {
        return "BackendBundle:Default:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  312 => 195,  306 => 194,  293 => 211,  291 => 194,  164 => 70,  158 => 67,  149 => 61,  145 => 60,  141 => 58,  127 => 56,  123 => 55,  113 => 48,  110 => 47,  96 => 45,  92 => 44,  54 => 8,  48 => 7,  36 => 4,  11 => 1,);
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


 {% block title %}Administração{% endblock %}


{% block body %}

<body class=\"skin-blue sidebar-mini pace-done fixed\">
<div class=\"pace  pace-inactive\"><div class=\"pace-progress\" style=\"transform: translate3d(100%, 0px, 0px);\" data-progress-text=\"100%\" data-progress=\"99\">
  <div class=\"pace-progress-inner\"></div>
</div>
<div class=\"pace-activity\"></div></div>
<header class=\"main-header\">

    <!-- Logo -->
    <a href=\"index2.html\" class=\"logo\">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class=\"logo-mini\"><b>S</b>GA</span>
      <!-- logo for regular state and mobile devices -->
      <span class=\"logo-lg\"><b>SGA</b> 1.0</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class=\"navbar navbar-static-top\" role=\"navigation\">
      <!-- Sidebar toggle button-->
      <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
        <span class=\"sr-only\">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class=\"navbar-custom-menu\">
        <ul class=\"nav navbar-nav\">
          <!-- Messages: style can be found in dropdown.less-->
          <li class=\"dropdown messages-menu\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-envelope-o\"></i>
              <span class=\"label label-success\">4</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class=\"dropdown user user-menu\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

            {% image '@BackendBundle/Resources/public/img/user2-160x160.jpg' %}
                    <img src=\"{{ asset_url }}\" class=\"user-image\" alt=\"User Image!\" />
             {% endimage %}

              <span class=\"hidden-xs\"> {{ 'layout.logged_in_as'|trans({'%username%': app.user.username}, 'FOSUserBundle') }}</span>
            </a>
            <ul class=\"dropdown-menu\">
              <!-- User image -->
              <li class=\"user-header\">


         {% image '@BackendBundle/Resources/public/img/user2-160x160.jpg' %}
                    <img src=\"{{ asset_url }}\" class=\"img-circle\" alt=\"User Image!\" />
             {% endimage %}

                <p>
                   {{ 'layout.logged_in_as'|trans({'%username%': app.user.username}, 'FOSUserBundle') }}
                  <small>{{ 'layout.logged_in_as'|trans({'%username%': app.user.lastlogin|date(\"d-m-y\")}, 'FOSUserBundle') }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class=\"user-footer\">
                <div class=\"pull-left\">
                  <a href=\"{{ path('fos_user_profile_show') }}\" class=\"btn btn-default btn-flat\">Perfil</a>
                </div>
                <div class=\"pull-right\">
                  <a href=\"{{ path('fos_user_security_logout') }}\" class=\"btn btn-default btn-flat\">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<!-- end header -->

<aside class=\"main-sidebar\">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class=\"sidebar\" style=\"height: auto;\">
     <ul class=\"sidebar-menu\">
        <li class=\"header\"></li>
        <li class=\"active treeview\">
          <a href=\"#\">
            <i class=\"fa fa-dashboard\"></i> <span>Dashboard</span> <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"dashboard\"><i class=\"fa fa-circle-o\"></i> Pagina principal</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-laptop\"></i>
            <span>UI Elements</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/UI/general.html\"><i class=\"fa fa-circle-o\"></i> General</a></li>
            <li><a href=\"pages/UI/icons.html\"><i class=\"fa fa-circle-o\"></i> Icons</a></li>
            <li><a href=\"pages/UI/buttons.html\"><i class=\"fa fa-circle-o\"></i> Buttons</a></li>
            <li><a href=\"pages/UI/sliders.html\"><i class=\"fa fa-circle-o\"></i> Sliders</a></li>
            <li><a href=\"pages/UI/timeline.html\"><i class=\"fa fa-circle-o\"></i> Timeline</a></li>
            <li><a href=\"pages/UI/modals.html\"><i class=\"fa fa-circle-o\"></i> Modals</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-edit\"></i> <span>Forms</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/forms/general.html\"><i class=\"fa fa-circle-o\"></i> General Elements</a></li>
            <li><a href=\"pages/forms/advanced.html\"><i class=\"fa fa-circle-o\"></i> Advanced Elements</a></li>
            <li><a href=\"pages/forms/editors.html\"><i class=\"fa fa-circle-o\"></i> Editors</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-table\"></i> <span>Tables</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/tables/simple.html\"><i class=\"fa fa-circle-o\"></i> Simple tables</a></li>
            <li><a href=\"pages/tables/data.html\"><i class=\"fa fa-circle-o\"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href=\"pages/calendar.html\">
            <i class=\"fa fa-calendar\"></i> <span>Calendar</span>
            <small class=\"label pull-right bg-red\">3</small>
          </a>
        </li>
        <li>
          <a href=\"pages/mailbox/mailbox.html\">
            <i class=\"fa fa-envelope\"></i> <span>Mailbox</span>
            <small class=\"label pull-right bg-yellow\">12</small>
          </a>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-folder\"></i> <span>Examples</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"pages/examples/invoice.html\"><i class=\"fa fa-circle-o\"></i> Invoice</a></li>
            <li><a href=\"pages/examples/profile.html\"><i class=\"fa fa-circle-o\"></i> Profile</a></li>
            <li><a href=\"pages/examples/login.html\"><i class=\"fa fa-circle-o\"></i> Login</a></li>
            <li><a href=\"pages/examples/register.html\"><i class=\"fa fa-circle-o\"></i> Register</a></li>
            <li><a href=\"pages/examples/lockscreen.html\"><i class=\"fa fa-circle-o\"></i> Lockscreen</a></li>
            <li><a href=\"pages/examples/404.html\"><i class=\"fa fa-circle-o\"></i> 404 Error</a></li>
            <li><a href=\"pages/examples/500.html\"><i class=\"fa fa-circle-o\"></i> 500 Error</a></li>
            <li><a href=\"pages/examples/blank.html\"><i class=\"fa fa-circle-o\"></i> Blank Page</a></li>
            <li><a href=\"pages/examples/pace.html\"><i class=\"fa fa-circle-o\"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class=\"treeview\">
          <a href=\"#\">
            <i class=\"fa fa-share\"></i> <span>Multilevel</span>
            <i class=\"fa fa-angle-left pull-right\"></i>
          </a>
          <ul class=\"treeview-menu\">
            <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
            <li>
              <a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One <i class=\"fa fa-angle-left pull-right\"></i></a>
              <ul class=\"treeview-menu\">
                <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two</a></li>
                <li>
                  <a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two <i class=\"fa fa-angle-left pull-right\"></i></a>
                  <ul class=\"treeview-menu\">
                    <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
                    <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href=\"documentation/index.html\"><i class=\"fa fa-book\"></i> <span>Documentation</span></a></li>
        <li class=\"header\">LABELS</li>
        <li><a href=\"#\"><i class=\"fa fa-circle-o text-red\"></i> <span>Important</span></a></li>
        <li><a href=\"#\"><i class=\"fa fa-circle-o text-yellow\"></i> <span>Warning</span></a></li>
        <li><a href=\"#\"><i class=\"fa fa-circle-o text-aqua\"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <div class=\"content-wrapper\" style=\"min-height: 916px;\">
 <section class=\"content\">
          {% block content %}


              <!--   <section class=\"content-header\">
                <h1>
                  Dashboard
                  <small>Version 2.0</small>
                </h1>
                <ol class=\"breadcrumb\">
                  <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
                  <li class=\"active\">Dashboard</li>
                </ol>
              </section> -->



          {% endblock %}

          </section>
</div>

</body>

{% endblock %}", "BackendBundle:Default:layout.html.twig", "/var/www/html/sga/src/Admin/Backend/Resources/views/Default/layout.html.twig");
    }
}
