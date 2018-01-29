<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Sugestion;
use Admin\Backend\Form\SugestionType;

/**
 * Sugestion controller.
 *
 */
class SugestionController extends Controller
{

    /**
     * Lists all Sugestion entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BackendBundle:Sugestion')->findAll();

        return $this->render('BackendBundle:Sugestion:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Sugestion entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Sugestion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser()->getId();
            $entity->setCreatedBy($userId);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_Sugestion_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:Sugestion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Sugestion entity.
     *
     * @param Sugestion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Sugestion $entity)
    {
        $form = $this->createForm(new SugestionType(), $entity, array(
            'action' => $this->generateUrl('administration_Sugestion_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Sugestion entity.
     *
     */
    public function newAction()
    {
        $entity = new Sugestion();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Sugestion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sugestion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sugestion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Sugestion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sugestion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sugestion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Sugestion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Sugestion entity.
    *
    * @param Sugestion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sugestion $entity)
    {
        $form = $this->createForm(new SugestionType(), $entity, array(
            'action' => $this->generateUrl('administration_Sugestion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        // $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }
    /**
     * Edits an existing Sugestion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sugestion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_Sugestion_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:Sugestion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Sugestion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sugestion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_Sugestion'));
    }

    /**
     * Creates a form to delete a Sugestion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_Sugestion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
