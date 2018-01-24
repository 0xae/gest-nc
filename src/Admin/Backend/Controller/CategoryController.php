<?php

namespace Admin\Backend\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackendBundle:Category')->findAll();

        return $this->render('BackendBundle:Category:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('BackendBundle:Category:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
