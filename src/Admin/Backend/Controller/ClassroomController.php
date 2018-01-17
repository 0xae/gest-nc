<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Classroom;
use Admin\Backend\Form\ClassroomType;

/**
 * Classroom controller.
 *
 */
class ClassroomController extends Controller
{

    /**
     * Lists all Classroom entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackendBundle:Classroom')->findAll();

        return $this->render('BackendBundle:Classroom:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Classroom entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Classroom();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $userId = $this->getUser()->getId();
            $entity->setCreatedBy($userId);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_classroom_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:Classroom:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Classroom entity.
     *
     * @param Classroom $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Classroom $entity)
    {
        $form = $this->createForm(new ClassroomType(), $entity, array(
            'action' => $this->generateUrl('administration_classroom_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Classroom entity.
     *
     */
    public function newAction()
    {
        $entity = new Classroom();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Classroom:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Classroom entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Classroom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classroom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Classroom:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Classroom entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Classroom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classroom entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Classroom:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Classroom entity.
    *
    * @param Classroom $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Classroom $entity)
    {
        $form = $this->createForm(new ClassroomType(), $entity, array(
            'action' => $this->generateUrl('administration_classroom_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Classroom entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Classroom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classroom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_classroom_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:Classroom:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Classroom entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:Classroom')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classroom entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_classroom'));
    }

    /**
     * Creates a form to delete a Classroom entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_classroom_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
