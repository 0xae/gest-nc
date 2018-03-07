<?php
namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\CompBook;
use Admin\Backend\Form\CompBookType;
use Admin\Backend\Entity\Upload;
use Admin\Backend\Form\UploadType;

/**
 * CompBook controller.
 */
class CompBookController extends Controller {
    /**
     * Lists all CompBook entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $pageIdx = !array_key_exists('page', $_GET) ? 1 : $_GET['page'];
        $perPage = 10;

        $q = $this->container
            ->get('sga.admin.filter')
            ->from($em, CompBook::class, $perPage, ($pageIdx-1)*$perPage);

        $fanta = $this->container
            ->get('sga.admin.table.pagination')
            ->fromQuery($q, $perPage, $pageIdx);

        $entities = $q->getResult();         

        return $this->render('BackendBundle:CompBook:index.html.twig', array(
            'entities' => $entities,
            'paginate' => $fanta
        ));
    }

    /**
     * Creates a new CompBook entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new CompBook();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser();
            $entity->setCreatedBy($userId);
            $entity->setCreatedAt(new \DateTime);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_CompBook_edit', array('id' => $entity->getId(), 'is_new' => true)));
        }

        return $this->render('BackendBundle:CompBook:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new CompBook entity.
     *
     */
    public function newAction() {
        $entity = new CompBook();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:CompBook:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CompBook entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:CompBook')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompBook entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        return $this->render('BackendBundle:CompBook:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CompBook entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:CompBook')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompBook entity.');
        }

        $editForm = $this->createEditForm($entity);

        $files = $em->getRepository('BackendBundle:Upload')
                    ->findBy(['reference' => $entity->getAnnexReference()]);

        return $this->render('BackendBundle:CompBook:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'upload_form' => $this->uploadForm($entity),
            'files' => $files
        ));
    }

    /**
     * Creates a form to create a CompBook entity.
     *
     * @param CompBook $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CompBook $entity) {
        $entity->setComplaintDate(new \DateTime);
        $entity->setAnnexReference(md5(uniqid()));
        $form = $this->createForm(new CompBookType(), $entity, array(
            'action' => $this->generateUrl('administration_CompBook_create'),
            'method' => 'POST',
        ));
        return $form;
    }    

    /**
    * Creates a form to edit a CompBook entity.
    *
    * @param CompBook $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CompBook $entity) {
        $form = $this->createForm(new CompBookType(), $entity, array(
            'action' => $this->generateUrl('administration_CompBook_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Edits an existing CompBook entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:CompBook')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompBook entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('administration_CompBook_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:CompBook:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Deletes a CompBook entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:CompBook')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CompBook entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_CompBook'));
    }

    /**
     * Creates a form to delete a CompBook entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_CompBook_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    private function uploadForm($model) {
        $entity = new Upload();
        $entity->setReference($model->getAnnexReference());

        $entity->setContext(json_encode([
            "path" => 'administration_CompBook_edit',
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
}
