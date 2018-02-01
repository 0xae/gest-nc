<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Admin\Backend\Entity\User;
use Admin\Backend\Form\UserType;
use Admin\Backend\Entity\Profile;
use Admin\Backend\Form\ProfileType;

/**
 * Category controller.
 *
 */
class AdminController extends Controller {
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();        
        $userForm = $this->createUserForm();
        $profileForm = $this->createProfileForm();
        $userList = $em->getRepository('BackendBundle:User')->findAll();
        $profileList = $em->getRepository('BackendBundle:Profile')->findAll();
        
        return $this->render('BackendBundle:Admin:index.html.twig', array(
            'user_form' => $userForm->createView(),
            'user_list' => $userList,
            'profile_form' => $profileForm->createView(),
            'profile_list' => $profileList
        ));
    }

   /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createUserForm() {
        $form = $this->createForm(new UserType(), new User, array(
            'action' => $this->generateUrl('administration_user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));
        return $form;
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createProfileForm() {
        $form = $this->createForm(new ProfileType(), new Profile(), array(
            'action' => $this->generateUrl('administration_Profile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
}
