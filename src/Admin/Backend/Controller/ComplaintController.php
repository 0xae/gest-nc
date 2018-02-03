<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;

use Admin\Backend\Entity\Complaint;
use Admin\Backend\Form\ComplaintType;

/**
 * Complaint controller.
 *
 */
class ComplaintController extends Controller {
    /**
     * Lists all Complaint entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BackendBundle:Complaint')->findAll();

        return $this->render('BackendBundle:Complaint:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Complaint entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Complaint();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser();
            $entity->setCreatedBy($userId);

            $entity->setState('acompanhamento');

            // $file = $entity->getFactAnnex();
            // if ($file) {
            //     $fileName = md5(uniqid()).'.'.$file->guessExtension();
            //     $file->move(
            //         $this->getParameter('complaints_directory'),
            //         $fileName
            //     );
            //     $entity->setFactAnnex($fileName);
            // }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_Complaint_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:Complaint:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Complaint entity.
     *
     * @param Complaint $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Complaint $entity) {
        $form = $this->createForm(new ComplaintType(), $entity, array(
            'action' => $this->generateUrl('administration_Complaint_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Complaint entity.
     *
     */
    public function newAction() {
        $entity = new Complaint();
        $form = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Complaint:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Complaint entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        // $annex = $entity->getFactAnnex();        
        // $path = false;
        // if ($annex) {
        //     $path = $this->getParameter('complaints_directory') . '/' . $annex;
        //     $entity->setFactAnnex(new File($path));
        // }

        return $this->render('BackendBundle:Complaint:show.html.twig', array(
            'entity' => $entity
        ));
    }

    /**
     * Displays a form to edit an existing Complaint entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        // $annex = $entity->getFactAnnex();
        // $path = false;
        // if ($annex) {
        //     $path = $this->getParameter('complaints_directory') . '/' . $annex;
        //     $entity->setFactAnnex(new File($path));
        // }

        $editForm = $this->createEditForm($entity);
        return $this->render('BackendBundle:Complaint:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView()
            // 'upload_path' => $path
        ));
    }

    /**
     * Edits an existing Complaint entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        // $annex = $entity->getFactAnnex();
        // $path = false;
        // if ($annex) {
        //     $path = $this->getParameter('complaints_directory') . '/' . $annex;
        //     $entity->setFactAnnex(new File($path));
        // }
        // $name = $entity->getFactAnnex();
        // if ($name) {
        //     $path = $this->getParameter('complaints_directory') . '/' . $name;
        //     $file=new File($path);
        //     $fileName = md5(uniqid()).'.'.$file->guessExtension();
        //     $file->move(
        //         $this->getParameter('complaints_directory'),
        //         $fileName
        //     );
        //     $entity->setFactAnnex($file);
        // }    

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('administration_Complaint_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:Complaint:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

    /**
    * Creates a form to edit a Complaint entity.
    *
    * @param Complaint $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Complaint $entity) {
        $form = $this->createForm(new ComplaintType(), $entity, array(
            'action' => $this->generateUrl('administration_Complaint_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Deletes a Complaint entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:Complaint')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Complaint entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_Complaint'));
    }

    /**
     * Creates a form to delete a Complaint entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_Complaint_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
