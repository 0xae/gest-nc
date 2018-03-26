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
use Admin\Backend\Entity\ProfilePermission;

/**
 * Admin controller.
 */
class AdminController extends Controller {
    const PermissionMap = [];

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $userForm = $this->createUserForm();
        $profileForm = $this->createProfileForm();
        
        $userList = $em->getRepository('BackendBundle:User')
            ->findAll();

        $profileList = $em->getRepository('BackendBundle:Profile')
            ->findAll();

        $assocProfile = $this->createAssocProfileForm();
        $permissions = $this->getPermissions();

        return $this->render('BackendBundle:Admin:index.html.twig', array(
            'user_form' => $userForm->createView(),
            'user_list' => $userList,
            'profile_form' => $profileForm->createView(),
            'profile_list' => $profileList,
            'assoc_profile_form' => $assocProfile->createView(),
            'permissions' => $permissions
        ));
    }

    private function paginate($em, $class) {
        $pageIdx = !array_key_exists('page', $_GET) ? 1 : $_GET['page'];        
        $perPage = 10;
        
        $q = $this->container
            ->get('sga.admin.filter')
            ->from($em, $class, $perPage, 
                        ($pageIdx-1)*$perPage);

        $fanta = $this->container
            ->get('sga.admin.table.pagination')
            ->fromQuery($q, $perPage, $pageIdx);
            
        return [$q, $fanta];
    }

   /**
     * Fetches all permissions of a profile
     * @param User $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    public function permissionsOfAction($id) {
        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('BackendBundle:ProfilePermission')
        ->findBy(array(
            'profile' => $id
        ));

        $ary = [];
        foreach ($results as $val) {
            $ary[] = [
                'id' => $val->getId(),
                'profile' => $id,
                'permission' => $val->getPermission(),
                'permissionLabel' => $val->getPermissionLabel(),
                'label'
            ];
        }

        return new JsonResponse($ary);
    }

    public function removePermissionAction($id) {  
        $em = $this->getDoctrine()->getManager();                
        $ent = $em->getRepository('BackendBundle:ProfilePermission')->find($id);

        if ($ent) {
            $users = $em->getRepository('BackendBundle:User')
                        ->findBy(['profile' => $ent->getProfile()->getId()]);

            $permission = $ent->getPermission();

            foreach ($users as $user) {
                $user->removeRole($permission);
            }

            $em->remove($ent);
            $em->flush();        
        }

        return new JsonResponse([
            'msg' => 'Permissao removida'
        ]);
    }

    public function addPermissionAction() {
        $em = $this->getDoctrine()->getManager();        
        $permission = trim(strtolower($_GET['permission']));
        $profileId = $_GET['profile_id'];
        $permissionLabel = $_GET['permission_label'];

        $ent = $em->getRepository('BackendBundle:ProfilePermission')
            ->findBy(array(
                'profile' => $profileId,
                'permission' => $permission
            ));

        // this profile already has that permission
        if ($ent) {
            $resp = [
                'id' => $ent[0]->getId(),
                'permission' => $ent[0]->getPermission(),
                'permissionLabel' => $ent[0]->getPermissionLabel(),
                'profile' => $ent[0]->getProfile()->getId(),
            ];
        } else {
            $profile = $em->getRepository('BackendBundle:Profile')
                ->find($profileId);

            if (!$profile) {
                throw $this->createNotFoundException("Perfil ($profileId) invalido!");
            }        

            $ent = new ProfilePermission;
            $ent->setPermission($permission);
            $ent->setCreatedBy($this->getUser());
            $ent->setCreatedAt(new \DateTime);
            $ent->setPermissionLabel($permissionLabel);
            $ent->setProfile($profile);
            
            $users = $em->getRepository('BackendBundle:User')
                        ->findBy(['profile' => $profileId]);
            
            foreach ($users as $user) {
                $user->addRole($permission);
            }

            $em->persist($ent);
            $em->flush();          
            
            $resp = [
                'id' => $ent->getId(),
                'permission' => $ent->getPermission(),
                'permissionLabel' => $ent->getPermissionLabel(),
                'profile' => $ent->getProfile()->getId(),
            ];
        }

        return new JsonResponse($resp);
    }

    private function getPermissions() {
        // $routeCollection = $this->get('router')
        //                         ->getRouteCollection();
        // foreach ($routeCollection->all() as $routeName => $route) {            
        //     if (strstr($routeName, 'administration_')){
        //         $ary[] = $routeName;
        //     }
        // }
        $ary = [
            [
                "label" => "Estatisticas",
                "code" => "BACKEND_ADMINISTRATION_STATS",
            ],
            [
                "label" => "Administracao",
                "code" => "ROLE_ADMIN",
            ],

            // complaint
            [
                "label" => "Registro de Queixas/Reclamacao",
                "code" => "ADMINISTRATION_COMPLAINT_NEW",
            ],
            [
                "label" => "Listagem de Queixas/Reclamacao",
                "code" => "ADMINISTRATION_COMPLAINT",
            ],
            [
                "label" => "Acompanhamento de Queixas/Reclamacao",
                "code" => "ADMINISTRATION_COMPLAINT_ACOMP",
            ],
            [
                "label" => "Tratamento de Queixas/Reclamacao",
                "code" => "ADMINISTRATION_COMPLAINT_TREAT",
            ],
            [
                "label" => "Queixas/Reclamacao respondidas",
                "code" => "ADMINISTRATION_COMPLAINT_RESP",
            ],
            [
                "label" => "Queixas/Reclamacao sem resposta",
                "code" => "ADMINISTRATION_COMPLAINT_NORESP",
            ],
            [
                "label" => "Queixas/Reclamacao nao favoravel",
                "code" => "ADMINISTRATION_COMPLAINT_NF",
            ],
            [
                "label" => "Queixas/Reclamacao sem competencia",
                "code" => "ADMINISTRATION_COMPLAINT_SC",
            ],
            [
                "label" => "Queixas/Reclamacao nao-conforme",
                "code" => "ADMINISTRATION_COMPLAINT_NC",
            ],

            // sugestion
            [
                "label" => "Listagem de Sugestao/Reclamacao Externa",
                "code" => "ADMINISTRATION_SUGESTION",
            ],
            [
                "label" => "Registro de Sugestao/Reclamacao Externa",
                "code" => "ADMINISTRATION_SUGESTION_NEW",
            ],
            [
                "label" => "Acompanhamento de Sugestao/Reclamacao Externa",
                "code" => "ADMINISTRATION_SUGESTION_ACOMP",
            ],
            [
                "label" => "Tratamento de Sugestao/Reclamacao Externa",
                "code" => "ADMINISTRATION_SUGESTION_TREAT",
            ],
            [
                "label" => "Sugestao/Reclamacao respondida",
                "code" => "ADMINISTRATION_SUGESTION_RESP",
            ],
            [
                "label" => "Sugestao/Reclamacao sem resposta",
                "code" => "ADMINISTRATION_SUGESTION_NORESP",
            ],
            [
                "label" => "Sugestao/Reclamacao Externa nao favoravel",
                "code" => "ADMINISTRATION_SUGESTION_NF",
            ],
            [
                "label" => "Sugestao/Reclamacao sem competencia",
                "code" => "ADMINISTRATION_SUGESTION_SC",
            ],
            [
                "label" => "Sugestao/Reclamacao nao conforme",
                "code" => "ADMINISTRATION_SUGESTION_NC",
            ],

            // Ireclamacion
            [
                "label" => "Registro de Reclamacao Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_NEW",
            ],
            [
                "label" => "Listagem de Reclamacao Interna",
                "code" => "ADMINISTRATION_IRECLAMATION",
            ],
            [
                "label" => "Reclamacao Interna em acompanhamento",
                "code" => "ADMINISTRATION_IRECLAMATION_ACOMP",
            ],
            [
                "label" => "Reclamacao Interna respondidas",
                "code" => "ADMINISTRATION_IRECLAMATION_RESP",
            ],
            [
                "label" => "Reclamacao Interna sem resposta",
                "code" => "ADMINISTRATION_IRECLAMATION_NORESP",
            ],
            [
                "label" => "Nao conformidades da Reclamacao Interna",
                "code" => "ADMINISTRATION_IRECLAMATION_NC",
            ],

            // Livro de Reclamacao
            [
                "label" => "Listagem de livro de reclamacao",
                "code" => "ADMINISTRATION_COMPBOOK",
            ],
            [
                "label" => "Acompanhamento de livro de reclamacao",
                "code" => "ADMINISTRATION_COMPBOOK_ACOMP",
            ],
            [
                "label" => "Nao conformidades do livro de reclamacao",
                "code" => "ADMINISTRATION_COMPBOOK_NC",
            ],
            [
                "label" => "Criar Livro de reclamacao",
                "code" => "ADMINISTRATION_COMPBOOK_NEW",
            ],

            // Nao conformidades
            [
                "label" => "Listagem de NÃO CONFORMIDADES",
                "code" => "ADMINISTRATION_CORRECTION",
            ],
            [
                "label" => "Criar NÃO CONFORMIDADES",
                "code" => "ADMINISTRATION_CORRECTION_NEW",
            ]            
        ];

        return $ary;
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
            'method' => 'POST'
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
            'method' => 'POST'
        ));
        return $form;
    }
}

