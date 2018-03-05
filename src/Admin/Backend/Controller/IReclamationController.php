<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\File;

use Admin\Backend\Entity\IReclamation;
use Admin\Backend\Form\IReclamationType;

/**
 * IReclamation controller.
 *
 */
class IReclamationController extends Controller {
    /**
     * Lists all IReclamation entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BackendBundle:IReclamation')->findAll();

        return $this->render('BackendBundle:IReclamation:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function receiptAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        }

        return $this->render('BackendBundle:IReclamation:docs/receipt.html.twig', array(
            'entity' => $entity
        ));        
    }

    public function showJsonAction($id) {
        $entity = $this->getDoctrine()
                    ->getRepository('BackendBundle:IReclamation')                
                    ->find($id);

        $cb = $entity->getCreatedBy();

        $obj = [
            "id" => $entity->getId(),
            "name" => $entity->getName(),
            "objCode" => $entity->getObjCode(),
            "direction" => $entity->getDirection(),
            "type" => $entity->getType(),
            "typeData" => $entity->gettypeData(),
            "factDate" => $entity->getfactDate()->format("Y-m-d"),
            "factDetail" => $entity->getFactDetail(),
            "createByName" => $cb->getName(),
            "createByEnt" => $cb->getEntity()->getName(),
        ];

        return new JsonResponse($obj);
    }

    /**
     * Creates a new IReclamation entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new IReclamation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser();
            $entity->setCreatedBy($userId);
            $entity->setCreatedAt(new \DateTime);

            if ($entity->getFactAnnex()) {
                $file = $entity->getFactAnnex();
                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
    
                // moves the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('sugestions_directory'),
                    $fileName
                );
    
                $entity->setFactAnnex($fileName);    
            }

            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('administration_IReclamation_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:IReclamation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a IReclamation entity.
     *
     * @param IReclamation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(IReclamation $entity) {
        $entity->setFactDate(new \DateTime);
        $entity->setActionDate(new \DateTime);
        $entity->setDecisionDate(new \DateTime);
        $entity->setAnalysisDate(new \DateTime);    

        $form = $this->createForm(new IReclamationType(), $entity, array(
            'action' => $this->generateUrl('administration_IReclamation_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new IReclamation entity.
     *
     */
    public function newAction() {
        $entity = new IReclamation();
        $form = $this->createCreateForm($entity);
        return $this->render('BackendBundle:IReclamation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'fact_annex' => ""
        ));
    }

    /**
     * Finds and displays a IReclamation entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IReclamation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:IReclamation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing IReclamation entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IReclamation entity.');
        }

        $annexFile = $entity->getFactAnnex();
        if ($entity->getFactAnnex()) {
            $entity->setFactAnnex(
                new File($this->getParameter('sugestions_directory').'/'.$entity->getFactAnnex())
            );
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('BackendBundle:IReclamation:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'fact_annex' => $annexFile
        ));
    }

    /**
    * Creates a form to edit a IReclamation entity.
    *
    * @param IReclamation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(IReclamation $entity) {
        $form = $this->createForm(new IReclamationType(), $entity, array(
            'action' => $this->generateUrl('administration_IReclamation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    /**
     * Edits an existing IReclamation entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IReclamation entity.');
        }

        $annex = $entity->getFactAnnex();
        
        // upload is the same
        if ($entity->getFactAnnex() && is_string($entity->getFactAnnex())) {
            $entity->setFactAnnex(null);
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($entity->getFactAnnex()) {
            $file = $entity->getFactAnnex();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('sugestions_directory'),
                $fileName
            );

            $annex = $fileName;
        }

        $entity->setFactAnnex($annex);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('administration_IReclamation_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:IReclamation:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView()
        ));
    }

    /**
     * Deletes a IReclamation entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find IReclamation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_IReclamation'));
    }

    /**
     * Creates a form to delete a IReclamation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_IReclamation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
