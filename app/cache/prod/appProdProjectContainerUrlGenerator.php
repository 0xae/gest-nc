<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdProjectContainerUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'webcommand_webcommandbundle_menu' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'WebcommandBundle\\Controller\\WebcommandBundleController::menuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/command-runner',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'commandrunner' => array (  0 =>   array (    0 => 'commandName',  ),  1 =>   array (    '_controller' => 'WebcommandBundle\\Controller\\WebcommandBundleController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'commandName',    ),    1 =>     array (      0 => 'text',      1 => '/command-runner',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'asdis_sity_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Site\\AsdisBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/site/home',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'asdis_sity_contact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Site\\AsdisBundle\\Controller\\ContactoController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/site/contacto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'asdis_sity_perguntasfrequentes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Site\\AsdisBundle\\Controller\\PerguntasFrequentesController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/site/perguntasfrequentes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'asdis_sity_galleria' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Site\\AsdisBundle\\Controller\\GalleriaController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/site/galeria',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'asdis_sity_produtosservicos' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Site\\AsdisBundle\\Controller\\ProdutosServicosController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/site/produtosservicos',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sga_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Admin\\Backend\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/administration/dashboard',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Admin\\Backend\\Controller\\SecurityController::checkAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Admin\\Backend\\Controller\\SecurityController::logoutAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_show' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/administration/dashboard/profile/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/administration/dashboard/profile/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_register' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/administration/dashboard/register/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/administration/dashboard/register/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirm' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/administration/dashboard/register/confirm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirmed' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/administration/dashboard/register/confirmed',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_request' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/reset/request',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_send_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/reset/send-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/reset/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_reset' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/reset/reset',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_change_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/change-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Admin\\Backend\\Controller\\SecurityController::loginAction',    '_method' => 'POST',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/security/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
