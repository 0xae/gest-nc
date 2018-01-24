<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TeacherDisciplineType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('teacher', 'entity', array(
                'class' => 'BackendBundle:User',
            ))
            ->add('discipline', 'entity', array(
                'class' => 'BackendBundle:Discipline',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                            ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\Backend\Entity\TeacherDiscipline'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'admin_backend_teacherdiscipline';
    }
}
