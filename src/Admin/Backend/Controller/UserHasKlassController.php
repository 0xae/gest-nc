<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\UserHasKlass;
use Admin\Backend\Form\UserHasKlassType;

/**
 * UserHasKlass controller.
 *
 */
class UserHasKlassController extends Controller
{

    /**
     * Lists all UserHasKlass entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackendBundle:UserHasKlass')->findAll();

        return $this->render('BackendBundle:UserHasKlass:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UserHasKlass entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UserHasKlass();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser()->getId();
            $entity->setCreatedBy($userId);
            $entity->setCreatedAt(new \DateTime());

            $em->persist($entity);
            $em->flush();

            // is student
            if ($entity->getDiscipline() == null) {
                return $this->redirect($this->generateUrl('administration_UserHasKlass_show', array('id' => $entity->getId())));
            } else { // is professor
                return $this->redirect($this->generateUrl('administration_professor_edit', array('id' => $entity->getUser()->getId())));
            }
        }

        return $this->render('BackendBundle:UserHasKlass:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UserHasKlass entity.
     *
     * @param UserHasKlass $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UserHasKlass $entity)
    {
        $form = $this->createForm(new UserHasKlassType(), $entity, array(
            'action' => $this->generateUrl('administration_UserHasKlass_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UserHasKlass entity.
     *
     */
    public function newAction()
    {
        $entity = new UserHasKlass();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:UserHasKlass:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserHasKlass entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:UserHasKlass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserHasKlass entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:UserHasKlass:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserHasKlass entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:UserHasKlass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserHasKlass entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:UserHasKlass:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UserHasKlass entity.
    *
    * @param UserHasKlass $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UserHasKlass $entity)
    {
        $form = $this->createForm(new UserHasKlassType(), $entity, array(
            'action' => $this->generateUrl('administration_UserHasKlass_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UserHasKlass entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:UserHasKlass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserHasKlass entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_UserHasKlass_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:UserHasKlass:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UserHasKlass entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:UserHasKlass')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserHasKlass entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_UserHasKlass'));
    }

    /**
     * Creates a form to delete a UserHasKlass entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_UserHasKlass_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
