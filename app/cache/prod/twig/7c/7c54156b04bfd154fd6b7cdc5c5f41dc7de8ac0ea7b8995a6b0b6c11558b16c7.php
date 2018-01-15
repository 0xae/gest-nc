<?php

/* AsdisSityBundle:Site:contacto.html.twig */
class __TwigTemplate_880a9de6b267feec84a088d25bd07989ede22db6ab5ae97540874ec51aaf920e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AsdisSityBundle:Default:layout.html.twig", "AsdisSityBundle:Site:contacto.html.twig", 1);
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
        echo "contacto";
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
                <li>Contacto</li>\t\t\t
            </div>\t\t
        </div>
     </div>
   <section id=\"contact-page\">
        <div class=\"container\">
            <div class=\"center\">        
                ";
        // line 22
        echo "            </div> 
            <div class=\"row contact-wrap\"> 
                <div class=\"status alert alert-success\" style=\"display: none\"></div>
                <div class=\"col-sm-6\">
                    ";
        // line 27
        echo "                    <div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\" role=\"tab\" id=\"headingOne\">
                                <h4 class=\"panel-title\">
                                    <a role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                                        Calheta
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseOne\" class=\"panel-collapse collapse in\" role=\"tabpanel\" aria-labelledby=\"headingOne\">
                                <div class=\"panel-body\">                                  
                                    <p> Tel: 2731630</p>
                                    <p>  Fax: 2731405</p>
                                    <p>  Voip: 3573349</p>
                                    <p> e-mail: info@asdis.org.cv</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\" role=\"tab\" id=\"headingTwo\">
                                <h4 class=\"panel-title\">
                                    <a class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                                        Santa cruz
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseTwo\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingTwo\">
                                <div class=\"panel-body\">
                                    <p> Tel: 2692342</p>                                   
                                    <p>  Voip: 3569055</p>
                                    <p> e-mail: info@asdis.org.cv</p>                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\" role=\"tab\" id=\"headingThree\">
                                <h4 class=\"panel-title\">
                                    <a class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseThree\" aria-expanded=\"false\" aria-controls=\"collapseThree\">
                                        Praia
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapseThree\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingThree\">
                                <div class=\"panel-body\">
                                    <p> Voip: 3561545</p>
                                    <p> e-mail: info@asdis.org.cv</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\" role=\"tab\" id=\"headingThree\">
                                <h4 class=\"panel-title\">
                                    <a class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapsefour\" aria-expanded=\"false\" aria-controls=\"collapseThree\">
                                        S. Nicolau
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapsefour\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingThree\">
                                <div class=\"panel-body\">                                    
                                    <p> Tel: 2371555</p>
                                    <p> Voip: 3535109</p>
                                    <p>e-mail: info@asdis.org.cv</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6\">";
        // line 94
        echo "                    <div id=\"sendmessage\">Seu Menssagem foi enviado</div>
                    <div id=\"errormessage\"></div>
                    <form action=\"\" method=\"post\" role=\"form\" class=\"contactForm\">
                        <div class=\"form-group\">
                            <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Seu nome\" data-rule=\"minlen:4\" data-msg=\"Please enter at least 4 chars\" />
                            <div class=\"validation\"></div>
                        </div>
                        <div class=\"form-group\">
                            <input type=\"email\" class=\"form-control\" name=\"email\" id=\"email\" placeholder=\"Seu Email\" data-rule=\"email\" data-msg=\"Please enter a valid email\" />
                            <div class=\"validation\"></div>
                        </div>
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" name=\"subject\" id=\"subject\" placeholder=\"Assunto\" data-rule=\"minlen:4\" data-msg=\"Please enter at least 8 chars of subject\" />
                            <div class=\"validation\"></div>
                        </div>
                        <div class=\"form-group\">
                            <textarea class=\"form-control\" name=\"message\" rows=\"5\" data-rule=\"required\" data-msg=\"Please write something for us\" placeholder=\"Menssagem\"></textarea>
                            <div class=\"validation\"></div>
                        </div>
                        <div class=\"text-center\"><button type=\"submit\" name=\"submit\" class=\"btn btn-primary btn-lg\" required=\"required\">Enviar</button></div>
                    </form>                       
                </div>
                <div class=\"localization col-sm-12\">

                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyAu5KLlNkFTsyOfLG3qR0M-v9Ei7Dim9ZI '></script><div style='overflow:hidden;height:242px;width:100%;'><div id='gmap_canvas' style='height:242px;width:1261px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://indiatvnow.com/'>Bollywood Soaps</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=c77ee843c48ea88f4f9086b9d40040c1d117d2b8'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12, center:new google.maps.LatLng(15.1854144, - 23.592193899999984), mapTypeId: google.maps.MapTypeId.ROADMAP}; map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions); marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(15.1854144, - 23.592193899999984)}); infowindow = new google.maps.InfoWindow({content:'<strong>Asdis</strong><br><br> Calheta de São Miguel<br>'}); google.maps.event.addListener(marker, 'click', function(){infowindow.open(map, marker); }); infowindow.open(map, marker); }google.maps.event.addDomListener(window, 'load', init_map);</script>           
                </div>
            </div><!--/.row-->

        </div><!--/.container-->

    </section><!--/#contact-page-->



";
    }

    public function getTemplateName()
    {
        return "AsdisSityBundle:Site:contacto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 94,  61 => 27,  55 => 22,  44 => 12,  38 => 8,  35 => 7,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AsdisSityBundle:Site:contacto.html.twig", "/var/www/html/sga/src/Site/AsdisBundle/Resources/views/Site/contacto.html.twig");
    }
}
