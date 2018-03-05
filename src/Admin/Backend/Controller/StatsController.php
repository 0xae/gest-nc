<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Category;
use Admin\Backend\Form\CategoryType;

/**
 * Statistics controller.
 */
class StatsController extends Controller {
    /**
     * Lists all Category entities.
     */
    public function indexAction() {
        return $this->render('BackendBundle:Stats:index.html.twig', array(
        ));
    }
}
