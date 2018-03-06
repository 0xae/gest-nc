<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;

use Admin\Backend\Entity\Sugestion;
use Admin\Backend\Entity\Stage;
use Admin\Backend\Form\SugestionType;
use Admin\Backend\Entity\Upload;
use Admin\Backend\Form\UploadType;

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
        $pageIdx = !array_key_exists('page', $_GET) ? 1 : $_GET['page'];
        $perPage = 10;

        $q = $this->container
            ->get('sga.admin.filter')
            ->from($em, Sugestion::class, $perPage, ($pageIdx-1)*$perPage);

        $fanta = $this->container
            ->get('sga.admin.table.pagination')
            ->fromQuery($q, $perPage, $pageIdx);

        $entities = $q->getResult();

        return $this->render('BackendBundle:Sugestion:index.html.twig', array(
            'entities' => $entities,
            'paginate' => $fanta
        ));
    }

    public function byStateAction($state) {
        $em = $this->getDoctrine()->getManager();        
        $tpl = 'listing';
        $label = $state;
        if ($state == Stage::ACOMPANHAMENTO) {
            $tpl = 'acomp';
        } else if ($state == Stage::TRATAMENTO) { 
            $tpl = 'treat';
        } else if ($state == Stage::SEM_RESPOSTA) {
            $tpl = 'sem_resposta';
        } else if ($state == Stage::RESPONDIDO) {
            $tpl = 'respondidas';
        } else if ($state == Stage::NO_COMP) {
            $label = 'sem competencia';
        } else if ($state == Stage::NO_FAVORABLE) {
            $label = 'não favoraveis';
        } else if ($state == Stage::NO_CONFOR) {
            $label = 'Não Conformidades';
        }

        $ary = $em->getRepository('BackendBundle:Sugestion')
                  ->findBy(['state' => $state]);

        return $this->render('BackendBundle:Sugestion:' . $tpl . '.html.twig', array(
            'objects' => $ary,
            'label' => $label
        ));
    }

    public function respondAction($id) {
        $content = $this->get("request")->getContent();
        $object = json_decode($content, true);
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        }

        $entity->setState(Stage::RESPONDIDO);
        $entity->setClientResponse($object['clientResponse']);
        $entity->setResponseAuthor($this->getUser());
        $em->persist($entity);
        $em->flush();

        return new JsonResponse($object);
    }

    public function receiptAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        }

        return $this->render('BackendBundle:Sugestion:docs/receipt.html.twig', array(
            'entity' => $entity
        ));
    }

    public function parecerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        }

        return $this->render('BackendBundle:Sugestion:docs/parecer.html.twig', array(
            'entity' => $entity
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
        } else if ($state == Stage::SEM_RESPOSTA) { 
            $entity->setState(Stage::SEM_RESPOSTA);
        } else if ($state == Stage::REJEITADO) { 
            $entity->setState(Stage::REJEITADO);
            $entity->setRejectionReason($object['rejectionReason']);
        } else if ($state == Stage::NO_FAVORABLE) { 
            $entity->setState(Stage::NO_FAVORABLE);
        } else if ($state == Stage::NO_COMP) { 
            $entity->setState(Stage::NO_COMP);
        } else {
            // throw new Exception
            throw $this->createNotFoundException('Invalid state provided: "'.$state.'"');
        }

        $em->persist($entity);
        $em->flush();
        return new JsonResponse($object);
    }

    public function showJsonAction($id) {
        $entity = $this->getDoctrine()
                    ->getRepository('BackendBundle:Sugestion')                
                    ->find($id);

        $cb = $entity->getCreatedBy();
        $obj = [
            "id" => $entity->getId(),
            "name" => $entity->getName(),
            "state" => $entity->getState(),
            "email" => $entity->getEmail(),
            "phone" => $entity->getPhone(),
            "type" => $entity->getType(),
            "description" => $entity->getDescription(),
            "objCode" => $entity->getObjCode(),
            "createdAt" => $cb->getCreatedAt()->format("Y-m-d"),
            "createByName" => $cb->getName(),
            "createByEnt" => $cb->getEntity()->getName(),
        ];

        if ($entity->getResponseAuthor()) {
            $obj["approvalReason"] = $entity->getApprovalReason();
            $obj["rejectionReason"] = $entity->getRejectionReason();
            $obj["clientResponse"] = $entity->getClientResponse();
            $obj["responseAuthor"] = $entity->getResponseAuthor()->getName();
            $obj["responseAuthorEnt"] = $entity->getResponseAuthor()->getEntity()->getName();            
            $obj["responseDate"] = $entity->getResponseDate()->format("Y-m-d");       
        }

        if ($entity->getParCode()) {         
            $obj["parCode"] = $entity->getParCode();
            $obj["parDate"] = $entity->getParDate()->format("Y-m-d");
            $obj["parAuthorName"] = $entity->getParAuthor()->getName();
            $obj["parSubject"] = $entity->getParSubject();
            $obj["parDest"] = $entity->getParDest();
            $obj["parDescription"] = $entity->getParDescription();
        }

        return new JsonResponse($obj);
    }

    public function updateParAction($id) {
        $content = $this->get("request")->getContent();
        $data = json_decode($content, true);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:Sugestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Essa Sugestao/Reclamacao nao foi encontrada.');
        }

        $entity->setParCode($data['parCode']);
        $entity->setParSubject($data['parSubject']);
        $entity->setParDest($data['parDestination']);
        $entity->setParDescription($data['parDescription']);
        $entity->setParType($data['type']);
        $entity->setParAuthor($this->getUser());
        $entity->setParDate(new \DateTime());

        // sends it back to acomp
        $entity->setState(Stage::RESPONDIDO);
        $em->persist($entity);       
        $em->flush();

        return new JsonResponse([
            "id" => $entity->getId()
        ]);
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
            $entity->setCreatedAt(new \DateTime);
            $entity->setState(Stage::ACOMPANHAMENTO);

            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('administration_Sugestion_edit', 
                        array('id' => $entity->getId(),
                              'is_new' => true)));
        }

        return $this->render('BackendBundle:Sugestion:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView()
        ));
    }

    private function uploadForm($model) {
        $entity = new Upload();
        $entity->setReference($model->getAnnexReference());
        return $this->createForm(new UploadType(), $entity, array(
                'action' => $this->generateUrl('administration_Upload_create'),
                'method' => 'POST',
            ))->createView();
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

        if ($entity->getAnnex()) {
            $entity->setAnnex(
                new File($this->getParameter('sugestions_directory').'/'.$entity->getAnnex())
            );
        }

        return $this->render('BackendBundle:Sugestion:show.html.twig', array(
            'entity' => $entity
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
        $files = $em->getRepository('BackendBundle:Upload')
                    ->findBy(['reference' => $entity->getAnnexReference()]);

        return $this->render('BackendBundle:Sugestion:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'upload_form' => $this->uploadForm($entity),
            'files' => $files
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
        $annex = $entity->getAnnex();

        // upload is the same
        if ($entity->getAnnex() && is_string($entity->getAnnex())) {
            $entity->setAnnex(null);
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($entity->getAnnex()) {
            $file = $entity->getAnnex();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('sugestions_directory'),
                $fileName
            );

            $annex = $fileName;
        } 

        $entity->setAnnex($annex);

        if ($editForm->isValid()) {
            $entity->setCreatedBy($userId);
            $em->flush();
            return $this->redirect($this->generateUrl('administration_Sugestion_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:Sugestion:edit.html.twig', array(
            'entity' => $entity,
            'edit_form'  => $editForm->createView()    
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
    * @param Sugestion         $entity->setAnnexReference(md5(uniqid()));
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
        $entity->setAnnexReference(md5(uniqid()));
        $entity->setDate(new \DateTime());
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
