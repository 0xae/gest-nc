<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ComplaintType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('module', 'entity', array(
                'class' => 'BackendBundle:Module',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                      ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name'                
            ))
            ->add('stage', 'entity', array(
                'class' => 'BackendBundle:Stage',
                'query_builder' => function (EntityRepository $er) use ($options) {
                    $qb=$er->createQueryBuilder('u');                    

                    if ($options['data'] && $options['data']->getModule()->getId()) {
                        $moduleId = $options['data']->getModule()->getId();
                        $qb->join('BackendBundle:ModuleStage ms', 
                                  'WITH ms.module = ' . $moduleId . ' AND ms.stage = u.id')
                           ->orderBy('u.name', 'ASC');
                    }

                    return $qb;
                },
                'choice_label' => 'name'                
            ))
            ->add('name')
            ->add('address')
            ->add('locality')
            ->add('phone')
            ->add('email', 'email')
            ->add('type', 'choice', array(
                'choices'  => array(
                    'queixa' => 'Queixa',
                    'denuncia' => 'Denuncia'
                ),
            ))
            // ->add('type', 'choice', array(
            //     'expanded' => true,
            //     'multiple' => true,
            //     'choices'  => array(
            //         'ROLE_CONTENT' => 'Innehåll',
            //         'ROLE_LAYOUT'  => 'Skärmlayout',
            //         'ROLE_VIDEO'   => 'Videouppladdning',
            //         'ROLE_ADMIN'   => 'Administratör',
            //     ),
            // ))
            ->add('opName')
            ->add('opAddress')
            ->add('opLocality')
            ->add('opPhone')
            ->add('opEmail')
            ->add('factDate')
            ->add('factLocality')
            // ->add('factAnnex', 'file')
            ->add('factDetail', 'textarea', array(
                'attr' => array('rows' => 6)
            ))
            ->add('hasProduct', 'checkbox')
            ->add('hasAnnex', 'checkbox')            
            ->add('annexType', 'entity', array(
                'class' => 'BackendBundle:Document',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                      ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name'                
            ))
            ->add('createdAt')
            ->add('submit', 'submit', array(
                'label' => 'Enviar formulário',
                'attr' => array(
                    'class' => 'btn btn-success'
                )
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\Backend\Entity\Complaint'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'admin_backend_complaint';
    }
}
