<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\UserHasRole;
use Admin\Backend\Form\UserHasRoleType;

/**
 * UserHasRole controller.
 *
 */
class UserHasRoleController extends Controller
{

    /**
     * Lists all UserHasRole entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackendBundle:UserHasRole')->findAll();

        return $this->render('BackendBundle:UserHasRole:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UserHasRole entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UserHasRole();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_userHasRole_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:UserHasRole:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UserHasRole entity.
     *
     * @param UserHasRole $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UserHasRole $entity)
    {
        $form = $this->createForm(new UserHasRoleType(), $entity, array(
            'action' => $this->generateUrl('administration_userHasRole_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UserHasRole entity.
     *
     */
    public function newAction()
    {
        $entity = new UserHasRole();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:UserHasRole:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserHasRole entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:UserHasRole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserHasRole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:UserHasRole:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserHasRole entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:UserHasRole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserHasRole entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:UserHasRole:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UserHasRole entity.
    *
    * @param UserHasRole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UserHasRole $entity)
    {
        $form = $this->createForm(new UserHasRoleType(), $entity, array(
            'action' => $this->generateUrl('administration_userHasRole_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UserHasRole entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:UserHasRole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserHasRole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_userHasRole_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:UserHasRole:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UserHasRole entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:UserHasRole')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserHasRole entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_userHasRole'));
    }

    /**
     * Creates a form to delete a UserHasRole entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_userHasRole_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
