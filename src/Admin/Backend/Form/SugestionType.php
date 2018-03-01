<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Doctrine\ORM\EntityRepository;


class SugestionType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            // ->add('module', 'entity', array(
            //     'class' => 'BackendBundle:Module',
            //     'query_builder' => function (EntityRepository $er) {
            //         return $er->createQueryBuilder('u')
            //         ->where("lower(u.name) like '%suge%' or lower(u.name) like '%recl%' or lower(u.name) like '%extern%'")
            //         ->orderBy('u.name', 'ASC');
            //     },
            //     'choice_label' => 'name'                
            // ))
            // ->add('stage', 'entity', array(
            //     'class' => 'BackendBundle:Stage',
            //     'query_builder' => function (EntityRepository $er) use ($options) {
            //         $qb=$er->createQueryBuilder('u');                    

            //         if ($options['data'] && $options['data']->getModule() 
            //                 && $options['data']->getModule()->getId()) {
            //             $moduleId = $options['data']->getModule()->getId();
            //             $qb->join('BackendBundle:ModuleStage ms', 
            //                     'WITH ms.module = ' . $moduleId . ' AND ms.stage = u.id')
            //             ->orderBy('u.name', 'ASC');
            //         }

            //         return $qb;
            //     },
            //     'choice_label' => 'name'                
            // ))
            ->add('type', 'choice', array(
                    'choices'  => array(
                        'reclamacao' => 'Reclamação externa',
                        'sugestao' => 'Sugestão'
                    ),
            ))
            ->add('name')
            ->add('address')
            ->add('phone')
            ->add('email', 'email')
            ->add('description', 'textarea', array(
                'attr' => array(
                    'class' => 'my-textarea text-editor',
                    'rows' => 6,
                    'placeholder' => 'Insira o ocorrido...'
                )
            ))
            ->add('date')
            // ->add('createdBy', 'entity', array(
            //     'class' => 'BackendBundle:User',
            //     'query_builder' => function (EntityRepository $er) use ($options) {
            //         $qb=$er->createQueryBuilder('u');
            //         if ($options['data'] && $options['data']->getCreatedBy()) {
            //             $qb->where('u.id = ' . $options['data']->getCreatedBy()->getId());
            //         }
    
            //         return $qb->orderBy('u.name', 'ASC');                
            //     },
            //     'choice_label' => 'name',
            // ))
            ->add('submit', 'submit', array(
                'label' => 'Enviar formulário',
                'attr' => array(
                    'class' => 'btn btn-success'
                )
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\Backend\Entity\Sugestion'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'admin_backend_sugestion';
    }
}
