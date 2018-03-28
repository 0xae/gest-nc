<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\File;

use Admin\Backend\Entity\Stage;
use Admin\Backend\Entity\IReclamation;
use Admin\Backend\Entity\Upload;
use Admin\Backend\Form\UploadType;
use Admin\Backend\Form\IReclamationType;

/**
 * IReclamation controller
 */
class IReclamationController extends Controller {
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
        $type = @$_GET['type'];
        $tpl = 'receipt';

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        } 

        if ($type=='response') {
            $tpl = 'response';
        }

        return $this->render('BackendBundle:IReclamation:docs/'.$tpl.'.html.twig', array(
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
            "annexReference" => $entity->getAnnexReference(),
            "type" => $entity->getType(),
            "typeData" => $entity->gettypeData(),
            "factDate" => $entity->getfactDate()->format("Y-m-d"),
            "factDetail" => $entity->getFactDetail(),
            "createByName" => $cb->getName(),
            "createByEnt" => $cb->getEntity()->getName(),
        ];

        return new JsonResponse($obj);
    }

    public function byStateAction($state) {
        $em = $this->getDoctrine()->getManager();        
        $tpl = 'listing';
        $label = $state;

        if ($state == Stage::ACOMPANHAMENTO) {
            $label = 'Reclamações internas em acompanhamento';
            $tpl = 'acomp';
        } else if ($state == Stage::TRATAMENTO) { 
            $label = 'Tratamento';
        } else if ($state == Stage::SEM_RESPOSTA) {
            $label = 'Sem resposta';
        } else if ($state == Stage::RESPONDIDO) {
            $label = 'Respondidas';
        } else if ($state == Stage::NO_COMP) {
            $label = 'da competência de terceiros';
        } else if ($state == Stage::NO_FAVORABLE) {
            $label = 'Não favoraveis';
        } else if ($state == Stage::NO_CONFOR) {
            $label = 'Não Conformidades';
        }

        $ary = $this->container
            ->get('sga.admin.filter')
            ->ByState($em, 'IReclamation', $state);

        return $this->render('BackendBundle:IReclamation:' . $tpl .'.html.twig', array(
            'entities' => $ary,
            'label' => $label,
            'state' => $state,
            'ACOMPANHAMENTO' => Stage::ACOMPANHAMENTO,
            'TRATAMENTO' => Stage::TRATAMENTO,
            'RESPONDIDO' => Stage::RESPONDIDO,
            'SEM_RESPOSTA' => Stage::SEM_RESPOSTA
        ));
    }

    public function updateStateAction($id) {
        $content = $this->get("request")->getContent();
        $object = json_decode($content, true);
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Objecto nao encontrado!');
        }

        $state = $object['state'];
        if ($state == Stage::TRATAMENTO) {
            $entity->setState(Stage::TRATAMENTO);
        } else if ($state == Stage::REJEITADO) { 
            $entity->setState(Stage::REJEITADO);
            $entity->setRejectionReason($object['rejectionReason']);
        } else if ($state == Stage::SEM_RESPOSTA) { 
            $entity->setState(Stage::SEM_RESPOSTA);
        } else if ($state == Stage::NO_FAVORABLE) { 
            $entity->setState(Stage::NO_FAVORABLE);
        } else if ($state == Stage::NO_COMP) {
            $entity->setState(Stage::NO_COMP);
        } else if ($state == Stage::ANALYSIS || 
            $state == Stage::DECISION || 
            $state == Stage::ACTION) 
        {
            $entity->setState($state);
        } else {
            throw $this->createNotFoundException('Invalid state provided: "'.$state.'"');
        }

        $em->persist($entity);
        $em->flush();

        return new JsonResponse($object);
    }

    public function changeStepAction($id) {
        $content = $this->get("request")->getContent();
        $object = json_decode($content, true);
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:IReclamation')
                     ->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Essa Reclamacao nao foi encontrada.');
        }

        $object['id'] = $id;
        $step = $object['nextStep'];
        $entity->setStep($step);

        if ($step == IReclamation::ANALYSIS) {
            $entity->setState(Stage::ANALYSIS);
        }

        if ($step == IReclamation::DECISION) {
            $entity->setState(Stage::DECISION);
        }

        if ($step == IReclamation::ACTION) {
            $entity->setState(Stage::ACTION);
        }

        if ($step == IReclamation::CONCLUDED) {
            $entity->setState(Stage::ACOMPANHAMENTO);
        }

        $em->persist($entity);       
        $em->flush();
        return new JsonResponse($object);
    }

    public function respondAction($id) {
        $content = $this->get("request")->getContent();
        $object = json_decode($content, true);
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:IReclamation')
                     ->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Essa Reclamacao nao foi encontrada.');
        }

        $entity->setState(Stage::RESPONDIDO);
        $entity->setResponseContent($object['response']);
        $entity->setResponseDate(new \DateTime);
        $entity->setResponseAuthor($this->getUser());

        $em->persist($entity);       
        $em->flush();
        return new JsonResponse($object);
    }

    /**
     * Creates a new IReclamation entity.
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
            $entity->setState(Stage::ACOMPANHAMENTO);
            // $entity->setStep('step#1');

            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('administration_IReclamation_edit', 
                array('id' => $entity->getId(),
                    'is_new' => true))
            );
        }

        return $this->render('BackendBundle:IReclamation:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new IReclamation entity.
     */
    public function newAction() {
        $entity = new IReclamation();
        $form = $this->createCreateForm($entity);

        return $this->render('BackendBundle:IReclamation:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a IReclamation entity.
     */
    public function showAction($id) {
        return $this->redirect(
            $this->generateUrl('administration_IReclamation_edit', 
            array('id' => $id))            
        );
        // $em = $this->getDoctrine()->getManager();
        // $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        // if (!$entity) {
        //     throw $this->createNotFoundException('Unable to find IReclamation entity.');
        // }

        // $deleteForm = $this->createDeleteForm($id);

        // return $this->render('BackendBundle:IReclamation:show.html.twig', array(
        //     'entity'      => $entity,
        //     'delete_form' => $deleteForm->createView(),
        // ));
    }

    /**
     * Displays a form to edit an existing IReclamation entity.
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:IReclamation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IReclamation entity.');
        }

        $editForm = $this->createEditForm($entity);

        $files = $em->getRepository('BackendBundle:Upload')
                ->findBy(['reference' => $entity->getAnnexReference()]);

        return $this->render('BackendBundle:IReclamation:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'upload_form' => $this->uploadForm($entity),
            'files' => $files
        ));
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

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('administration_IReclamation_edit', 
                    array('id' => $id, 'is_update' => true)));
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

    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_IReclamation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    private function uploadForm($model) {
        $entity = new Upload();
        $entity->setReference($model->getAnnexReference());

        $entity->setContext(json_encode([
            "path" => 'administration_IReclamation_edit',
            "path_args" => array(
                'id' => $model->getId(),
                'upload_added' => true
            )
        ]));

        return $this->createForm(new UploadType(), $entity, array(
                'action' => $this->generateUrl('administration_Upload_create'),
                'method' => 'POST',
            ))->createView();
    }

    private function createEditForm(IReclamation $entity) {
        $form = $this->createForm(new IReclamationType(), $entity, array(
            'action' => $this->generateUrl('administration_IReclamation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    private function createCreateForm(IReclamation $entity) {
        $entity->setFactDate(new \DateTime);
        $entity->setStep(IReclamation::START);        
        $entity->setActionDate(new \DateTime);
        $entity->setDecisionDate(new \DateTime);
        $entity->setAnalysisDate(new \DateTime);    
        $entity->setAnnexReference(md5(uniqid()));

        $form = $this->createForm(new IReclamationType(), $entity, array(
            'action' => $this->generateUrl('administration_IReclamation_create'),
            'method' => 'POST',
        ));

        return $form;
    }
}
