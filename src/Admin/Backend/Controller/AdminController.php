<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\User;
use Admin\Backend\Form\UserType;
use Admin\Backend\Entity\Profile;
use Admin\Backend\Form\ProfileType;
use Admin\Backend\Entity\UserProfile;
use Admin\Backend\Form\UserProfileType;

/**
 * Admin controller.
 */
class AdminController extends Controller {
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $userForm = $this->createUserForm();
        $profileForm = $this->createProfileForm();
        $userList = $em->getRepository('BackendBundle:User')->findAll();
        $profileList = $em->getRepository('BackendBundle:Profile')->findAll();
        $assocProfile = $this->createAssocProfileForm();

        return $this->render('BackendBundle:Admin:index.html.twig', array(
            'user_form' => $userForm->createView(),
            'user_list' => $userList,
            'profile_form' => $profileForm->createView(),
            'profile_list' => $profileList,
            'assoc_profile_form' => $assocProfile->createView(),
        ));
    }

   /**
     * Fetches all profiles of a user
     * @param User $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    public function profilesAction($id) {
        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('BackendBundle:UserProfile')
        ->findBy(array(
            'user' => $id
        ));

        $ary = [];
        foreach ($results as $val) {
            $ary[] = [
                'id' => $val->getid(),
                'profile_id' => $val->getProfile()->getId(),
                'name' => $val->getProfile()->getName(),
                'permission' => $val->getProfile()->getPermission()
            ];
        }

        return new JsonResponse($ary);
    }

    public function removeUserProfileAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackendBundle:UserProfile')->find($id);
        $em->remove($entity);
        $em->flush();

        return new JsonResponse(array(
            'status' => 200,
            'message' => 'Perfil removido com sucesso'
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
        return $form;
    }

    /**
     * Creates a form to create a UserProfile entity.
     *
     * @param UserProfile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createAssocProfileForm() {
        $form = $this->createForm(new UserProfileType(), new UserProfile(), array(
            'action' => $this->generateUrl('administration_UserProfile_create'),
            'method' => 'POST',
        ));
        return $form;
    }
}

