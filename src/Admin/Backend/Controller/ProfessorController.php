<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\User;
use Admin\Backend\Entity\TeacherDiscipline;
use Admin\Backend\Entity\Discipline;
use Admin\Backend\Form\ProfessorType;
use Admin\Backend\Form\TeacherDisciplineType;
use Admin\Backend\Entity\UserHasKlass;
use Admin\Backend\Form\UserHasKlassType;

/**
 * Professor controller.
 *
 */
class ProfessorController extends Controller {
    /**
     * Lists all professors
     *
     */
    public function indexAction() {
        $perPage = 2;
        $pageIdx = !array_key_exists('page', $_GET) ? 0 : $_GET['page'];
        $em = $this->getDoctrine()->getManager();

        $builder = $em->createQueryBuilder();
        $q = $builder->select('x')
            ->from(User::class, 'x')
            ->where("x.roles LIKE '%ROLE_PROFESSOR%'")
            ->setMaxResults($perPage)
            ->setFirstResult($pageIdx)
            ->getQuery();

        $fanta = $this->container->get('sga.admin.table.pagination')
                 ->fromQuery($q, $perPage, $pageIdx);
        $entities = $q->getResult();        

        return $this->render('BackendBundle:Professor:index.html.twig', array(
            'entities' => $entities,
            'paginate' => $fanta
        ));
    }

    /**
     * Creates a new professor
     */
    public function createAction(Request $request) {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $userId = $this->getUser()->getId();
            $entity->setCreatedBy($userId);
            $username = substr($entity->getEmail(), 0, strpos($entity->getEmail(), "@"));
            $entity->setUsername($username);
            // XXX: remove this
            $entity->setPassword("123");
            $entity->addRole('ROLE_PROFESSOR');

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_professor_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:Professor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction() {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Professor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Professor invalido.');
        }

        return $this->render('BackendBundle:Professor:show.html.twig', array(
            'entity' => $entity
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $courses = [];
        $disciplines = [];
        $klasses = [];

        $entity = $em->getRepository('BackendBundle:User')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Professor invalido');
        }

        $editForm = $this->createEditForm($entity);
        $addDisciplineForm = $this->createTeacherDisciplineForm($entity);
        $addKlassForm = $this->createTeacherKlassForm($entity);

        $data = $em->getRepository('BackendBundle:TeacherDiscipline')   
                   ->findBy(['teacher' => $id]);
        foreach ($data as $td) {
            $disciplines[] = $td->getDiscipline();
        }

        $data = $em->getRepository('BackendBundle:UserHasKlass')   
                    ->findBy(['user' => $id]);
        foreach ($data as $tk) {
            $klasses[] = [
                "klass" => $tk->getKlass(),
                "discipline" => $tk->getDiscipline()
            ];
        }

        return $this->render('BackendBundle:Professor:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'courses' => $courses,
            'klasses' => $klasses,
            'disciplines' => $disciplines,
            'add_discipline_form' => $addDisciplineForm->createView(),
            'add_klass_form' => $addKlassForm->createView()
        ));
    }

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Professor invalido.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('administration_professor_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:Professor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_professor'));
    }

    public function addDisciplineAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:User')->find($id);

        $editForm = $this->createAddDiscipline($entity);
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {
            
        }
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity) {
        $form = $this->createForm(new ProfessorType(), $entity, array(
            'action' => $this->generateUrl('administration_professor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * A form to add a discipline to a professor
     *
     * @param User $prof The professor
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createTeacherDisciplineForm($prof) {
        $entity = new TeacherDiscipline();
        $entity->setTeacher($prof);

        $form = $this->createForm(new TeacherDisciplineType(), $entity, array(
            'action' => $this->generateUrl('administration_TeacherDiscipline_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Adicionar'));
        return $form;
    }

    /**
     * A form to add a klass to a professor
     *
     * @param User $prof The professor
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createTeacherKlassForm($prof) {
        $entity = new UserHasKlass();
        $entity->setUser($prof);

        $form = $this->createForm(new UserHasKlassType(), $entity, array(
            'action' => $this->generateUrl('administration_UserHasKlass_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Adicionar'));

        return $form;
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity) {
        $form = $this->createForm(new ProfessorType(), $entity, array(
            'action' => $this->generateUrl('administration_professor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_professor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
