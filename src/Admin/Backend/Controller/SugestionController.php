<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Sugestion;
use Admin\Backend\Entity\Stage;
use Admin\Backend\Form\SugestionType;

/**
 * Sugestion controller.
 */
class SugestionController extends Controller {
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

    public function byStateAction($state) {
        $em = $this->getDoctrine()->getManager();        
        $tpl = '';
        if ($state == Stage::ACOMPANHAMENTO) {
            $tpl = 'acomp';
        } else if ($state == Stage::TRATAMENTO) { 
            $tpl = 'treat';            
        } else {
            $tpl = 'acomp';
        }

        $ary = $em->getRepository('BackendBundle:Sugestion')
                  ->findBy(['state' => $state]);

        return $this->render('BackendBundle:Sugestion:' . $tpl . '.html.twig', array(
            'objects' => $ary
        ));
    }

    public function updateStateAction($id) {
        $content = $this->get("request")->getContent();
        $object = json_decode($content, true);
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        }

        $state = $object['state'];
        if ($state == Stage::TRATAMENTO) {
            $entity->setState(Stage::TRATAMENTO);
        } else if ($state == Stage::REJEITADO) { 
            $entity->setState(Stage::REJEITADO);
            $entity->setRejectionReason($object['rejectionReason']);
        } else {
            // throw new Exception
            throw $this->createNotFoundException('Invalid state provided: "'.$state.'"');
        }

        $em->persist($entity);
        $em->flush();
        return new JsonResponse($object);
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
            $userId = $this->getUser();
            $entity->setCreatedBy($userId);
            $entity->setState(Stage::ACOMPANHAMENTO);            

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
     * Displays a form to create a new Sugestion entity.
     *
     */
    public function newAction() {
        $entity = new Sugestion();
        $entity->setCreatedAt(new \DateTime);
        $form  = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Sugestion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sugestion entity.
     *
     */
    public function showAction($id) {
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
    public function editAction($id) {
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
     * Edits an existing Sugestion entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sugestion entity.');
        }

        $userId = $entity->getCreatedBy();        

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setCreatedBy($userId);

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
    public function deleteAction(Request $request, $id) {
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
    * Creates a form to edit a Sugestion entity.
    *
    * @param Sugestion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sugestion $entity) {
        $form = $this->createForm(new SugestionType(), $entity, array(
            'action' => $this->generateUrl('administration_Sugestion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Creates a form to create a Sugestion entity.
     *
     * @param Sugestion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Sugestion $entity) {
        $dev = true;
        if ($dev) {
            $entity->setName("Jonhy Gomes");
            $entity->setAddress("Praia, Cabo Verde");
            $entity->setPhone("255 12 90");
            $entity->setEmail("djonhy@gmail.com");
        }

        $entity->setDescription("teste 123 djonhy@gmail.com");
        

        $form = $this->createForm(new SugestionType(), $entity, array(
            'action' => $this->generateUrl('administration_Sugestion_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Creates a form to delete a Sugestion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_Sugestion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
