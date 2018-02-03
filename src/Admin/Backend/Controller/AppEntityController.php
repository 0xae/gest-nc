<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\AppEntity;
use Admin\Backend\Form\AppEntityType;

/**
 * AppEntity controller.
 *
 */
class AppEntityController extends Controller {
    /**
     * Lists all AppEntity entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BackendBundle:AppEntity')->findAll();

        return $this->render('BackendBundle:AppEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new AppEntity entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new AppEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser()->getId();
            $entity->setCreatedBy($userId);
            $entity->setCreatedAt(new \DateTime);

            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('administration_entities_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:AppEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new AppEntity entity.
     *
     */
    public function newAction() {
        $entity = new AppEntity();
        $form = $this->createCreateForm($entity);

        return $this->render('BackendBundle:AppEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AppEntity entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:AppEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AppEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:AppEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AppEntity entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:AppEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AppEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:AppEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing AppEntity entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:AppEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AppEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_entities_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:AppEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AppEntity entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:AppEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AppEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_entities'));
    }

    /**
     * Creates a form to create a AppEntity entity.
     *
     * @param AppEntity $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AppEntity $entity) {
        $form = $this->createForm(new AppEntityType(), $entity, array(
            'action' => $this->generateUrl('administration_entities_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
    * Creates a form to edit a AppEntity entity.
    *
    * @param AppEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AppEntity $entity) {
        $form = $this->createForm(new AppEntityType(), $entity, array(
            'action' => $this->generateUrl('administration_entities_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Creates a form to delete a AppEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_entities_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
