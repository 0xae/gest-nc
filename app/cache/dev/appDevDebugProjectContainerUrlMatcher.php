<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/fonts/fontawesome-webfont')) {
            // _assetic_font_awesome_ttf
            if ($pathinfo === '/fonts/fontawesome-webfont.ttf') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_ttf',  'pos' => NULL,  '_format' => 'ttf',  '_route' => '_assetic_font_awesome_ttf',);
            }

            // _assetic_font_awesome_ttf_0
            if ($pathinfo === '/fonts/fontawesome-webfont_fontawesome-webfont_1.ttf') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_ttf',  'pos' => 0,  '_format' => 'ttf',  '_route' => '_assetic_font_awesome_ttf_0',);
            }

            // _assetic_font_awesome_woff
            if ($pathinfo === '/fonts/fontawesome-webfont.woff') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_woff',  'pos' => NULL,  '_format' => 'woff',  '_route' => '_assetic_font_awesome_woff',);
            }

            // _assetic_font_awesome_woff_0
            if ($pathinfo === '/fonts/fontawesome-webfont_fontawesome-webfont_1.woff') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_woff',  'pos' => 0,  '_format' => 'woff',  '_route' => '_assetic_font_awesome_woff_0',);
            }

            // _assetic_font_awesome_woff2
            if ($pathinfo === '/fonts/fontawesome-webfont.woff2') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_woff2',  'pos' => NULL,  '_format' => 'woff2',  '_route' => '_assetic_font_awesome_woff2',);
            }

            // _assetic_font_awesome_woff2_0
            if ($pathinfo === '/fonts/fontawesome-webfont_fontawesome-webfont_1.woff2') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_woff2',  'pos' => 0,  '_format' => 'woff2',  '_route' => '_assetic_font_awesome_woff2_0',);
            }

        }

        if (0 === strpos($pathinfo, '/images/d84ab0f')) {
            // _assetic_d84ab0f
            if ($pathinfo === '/images/d84ab0f.jpg') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd84ab0f',  'pos' => NULL,  '_format' => 'jpg',  '_route' => '_assetic_d84ab0f',);
            }

            // _assetic_d84ab0f_0
            if ($pathinfo === '/images/d84ab0f_user2-160x160_1.jpg') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd84ab0f',  'pos' => 0,  '_format' => 'jpg',  '_route' => '_assetic_d84ab0f_0',);
            }

        }

        if (0 === strpos($pathinfo, '/css/128a07c')) {
            // _assetic_128a07c
            if ($pathinfo === '/css/128a07c.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_128a07c',);
            }

            if (0 === strpos($pathinfo, '/css/128a07c_')) {
                // _assetic_128a07c_0
                if ($pathinfo === '/css/128a07c_bootstrap.min_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_128a07c_0',);
                }

                // _assetic_128a07c_1
                if ($pathinfo === '/css/128a07c_font-awesome.min_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_128a07c_1',);
                }

                // _assetic_128a07c_2
                if ($pathinfo === '/css/128a07c_ionicons.min_3.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_128a07c_2',);
                }

                // _assetic_128a07c_3
                if ($pathinfo === '/css/128a07c_jquery-jvectormap-1.2.2_4.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_128a07c_3',);
                }

                // _assetic_128a07c_4
                if ($pathinfo === '/css/128a07c_AdminLTE.min_5.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 4,  '_format' => 'css',  '_route' => '_assetic_128a07c_4',);
                }

                // _assetic_128a07c_5
                if ($pathinfo === '/css/128a07c_blue_6.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 5,  '_format' => 'css',  '_route' => '_assetic_128a07c_5',);
                }

                // _assetic_128a07c_6
                if ($pathinfo === '/css/128a07c_pace.min_7.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 6,  '_format' => 'css',  '_route' => '_assetic_128a07c_6',);
                }

                // _assetic_128a07c_7
                if ($pathinfo === '/css/128a07c__all-skins.min_8.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '128a07c',  'pos' => 7,  '_format' => 'css',  '_route' => '_assetic_128a07c_7',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/8f32464')) {
            // _assetic_8f32464
            if ($pathinfo === '/js/8f32464.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_8f32464',);
            }

            if (0 === strpos($pathinfo, '/js/8f32464_')) {
                // _assetic_8f32464_0
                if ($pathinfo === '/js/8f32464_jQuery-2.2.0.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_8f32464_0',);
                }

                // _assetic_8f32464_1
                if ($pathinfo === '/js/8f32464_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_8f32464_1',);
                }

                // _assetic_8f32464_2
                if ($pathinfo === '/js/8f32464_fastclick_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_8f32464_2',);
                }

                // _assetic_8f32464_3
                if ($pathinfo === '/js/8f32464_app.min_4.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_8f32464_3',);
                }

                if (0 === strpos($pathinfo, '/js/8f32464_jquery')) {
                    // _assetic_8f32464_4
                    if ($pathinfo === '/js/8f32464_jquery.sparkline.min_5.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_8f32464_4',);
                    }

                    if (0 === strpos($pathinfo, '/js/8f32464_jquery-jvectormap-')) {
                        // _assetic_8f32464_5
                        if ($pathinfo === '/js/8f32464_jquery-jvectormap-1.2.2.min_6.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_8f32464_5',);
                        }

                        // _assetic_8f32464_6
                        if ($pathinfo === '/js/8f32464_jquery-jvectormap-world-mill-en_7.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_8f32464_6',);
                        }

                    }

                    // _assetic_8f32464_7
                    if ($pathinfo === '/js/8f32464_jquery.slimscroll.min_8.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_8f32464_7',);
                    }

                }

                // _assetic_8f32464_8
                if ($pathinfo === '/js/8f32464_Chart.min_9.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 8,  '_format' => 'js',  '_route' => '_assetic_8f32464_8',);
                }

                if (0 === strpos($pathinfo, '/js/8f32464_d')) {
                    // _assetic_8f32464_9
                    if ($pathinfo === '/js/8f32464_dashboard2_10.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 9,  '_format' => 'js',  '_route' => '_assetic_8f32464_9',);
                    }

                    // _assetic_8f32464_10
                    if ($pathinfo === '/js/8f32464_demo_11.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 10,  '_format' => 'js',  '_route' => '_assetic_8f32464_10',);
                    }

                }

                // _assetic_8f32464_11
                if ($pathinfo === '/js/8f32464_pace.min_12.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 11,  '_format' => 'js',  '_route' => '_assetic_8f32464_11',);
                }

                // _assetic_8f32464_12
                if ($pathinfo === '/js/8f32464_icheck.min_13.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '8f32464',  'pos' => 12,  '_format' => 'js',  '_route' => '_assetic_8f32464_12',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/91ec1a2')) {
            // _assetic_91ec1a2
            if ($pathinfo === '/css/91ec1a2.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '91ec1a2',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_91ec1a2',);
            }

            if (0 === strpos($pathinfo, '/css/91ec1a2_')) {
                // _assetic_91ec1a2_0
                if ($pathinfo === '/css/91ec1a2_bootstrap.min_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '91ec1a2',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_91ec1a2_0',);
                }

                if (0 === strpos($pathinfo, '/css/91ec1a2_part_2_style_')) {
                    // _assetic_91ec1a2_1
                    if ($pathinfo === '/css/91ec1a2_part_2_style_1.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '91ec1a2',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_91ec1a2_1',);
                    }

                    // _assetic_91ec1a2_2
                    if ($pathinfo === '/css/91ec1a2_part_2_style_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '91ec1a2',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_91ec1a2_2',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/js/c9929cf')) {
            // _assetic_c9929cf
            if ($pathinfo === '/js/c9929cf.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'c9929cf',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_c9929cf',);
            }

            if (0 === strpos($pathinfo, '/js/c9929cf_')) {
                // _assetic_c9929cf_0
                if ($pathinfo === '/js/c9929cf_jquery.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c9929cf',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_c9929cf_0',);
                }

                // _assetic_c9929cf_1
                if ($pathinfo === '/js/c9929cf_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c9929cf',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_c9929cf_1',);
                }

                // _assetic_c9929cf_2
                if ($pathinfo === '/js/c9929cf_functions_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c9929cf',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_c9929cf_2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/command-runner')) {
            // webcommand_webcommandbundle_menu
            if ($pathinfo === '/command-runner') {
                return array (  '_controller' => 'WebcommandBundle\\Controller\\WebcommandBundleController::menuAction',  '_route' => 'webcommand_webcommandbundle_menu',);
            }

            // commandrunner
            if (preg_match('#^/command\\-runner/(?P<commandName>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commandrunner')), array (  '_controller' => 'WebcommandBundle\\Controller\\WebcommandBundleController::indexAction',));
            }

        }

        // sga_homepage
        if ($pathinfo === '/administration/dashboard') {
            return array (  '_controller' => 'Admin\\Backend\\Controller\\DefaultController::indexAction',  '_route' => 'sga_homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            // fos_user_security_check
            if ($pathinfo === '/login_check') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_security_check;
                }

                return array (  '_controller' => 'Admin\\Backend\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
            }
            not_fos_user_security_check:

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'Admin\\Backend\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/administration/dashboard')) {
            if (0 === strpos($pathinfo, '/administration/dashboard/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/administration/dashboard/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/administration/dashboard/profile/edit') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_profile_edit;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }
                not_fos_user_profile_edit:

            }

            if (0 === strpos($pathinfo, '/administration/dashboard/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/administration/dashboard/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/administration/dashboard/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/administration/dashboard/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/administration/dashboard/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/administration/dashboard/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/administration/dashboard/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/reset')) {
            // fos_user_resetting_request
            if ($pathinfo === '/reset/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/reset/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/reset/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/reset/reset') && preg_match('#^/reset/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // fos_user_security_login
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fos_user_security_login');
            }

            return array (  '_controller' => 'Admin\\Backend\\Controller\\SecurityController::loginAction',  '_method' => 'POST',  '_route' => 'fos_user_security_login',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
