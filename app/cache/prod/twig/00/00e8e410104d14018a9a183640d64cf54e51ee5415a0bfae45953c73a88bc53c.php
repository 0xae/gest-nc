<?php

/* AsdisSityBundle:Site:galeria.html.twig */
class __TwigTemplate_ec83c580f1b1cc6889cbe2d7017ae6493805ba5fb672175a26f277fde651702e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AsdisSityBundle:Default:layout.html.twig", "AsdisSityBundle:Site:galeria.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AsdisSityBundle:Default:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "galleria e videos";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <div id=\"breadcrumb\">
        <div class=\"container\">\t
            <div class=\"breadcrumb\">\t\t\t\t\t\t\t
                <li><a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("asdis_sity_homepage");
        echo "\">Home</a></li>
                <li>Galleria</li>\t\t\t
            </div>\t\t
        </div>
    </div>

    <section id=\"portfolio\">\t
        <div class=\"container\">
            <div class=\"center\">
                <p>Visite as nossas galerias</p>
            </div>

            <ul class=\"portfolio-filter text-center\">
                <li><a class=\"btn btn-default active\" href=\"#\" data-filter=\"*\">Todas Categorias</a></li>
                <li><a class=\"btn btn-default\" href=\"#\" data-filter=\".bootstrap\">Creative</a></li>
                <li><a class=\"btn btn-default\" href=\"#\" data-filter=\".html\">Photography</a></li>
                <li><a class=\"btn btn-default\" href=\"#\" data-filter=\".wordpress\">Web Development</a></li>
            </ul><!--/#portfolio-filter-->
        </div>
        <div class=\"container\">
            <div class=\"\">
                <div class=\"portfolio-items isotope\" style=\"position: relative; overflow: hidden; height: 740px;\">
                    <div class=\"portfolio-item apps col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item1.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item1.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(285px, 0px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item2.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item2.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item bootstrap wordpress col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(570px, 0px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item3.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item3.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item joomla wordpress apps col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(855px, 0px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item4.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item4.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item joomla html bootstrap col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 370px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item5.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item5.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>      
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(285px, 370px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item6.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item6.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>         
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item wordpress html col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(570px, 370px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item7.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item7.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class=\"portfolio-item wordpress html bootstrap col-xs-12 col-sm-4 col-md-3 isotope-item\" style=\"position: absolute; left: 0px; top: 0px; transform: translate3d(855px, 370px, 0px);\">
                        <div class=\"recent-work-wrap\">
                            <img class=\"img-responsive\" src=\"images/portfolio/recent/item8.png\" alt=\"\">
                            <div class=\"overlay\">
                                <div class=\"recent-work-inner\">
                                    <h3><a href=\"#\">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class=\"preview\" href=\"images/portfolio/full/item8.png\" rel=\"prettyPhoto\"><i class=\"fa fa-eye\"></i> Ver</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
                </div>
            </div>
        </div>
    </section>

";
    }

    public function getTemplateName()
    {
        return "AsdisSityBundle:Site:galeria.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 12,  38 => 8,  35 => 7,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Site:galeria.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Site/galeria.html.twig");
    }
}
