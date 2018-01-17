<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CourseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('monthDuration')
            ->add('code')
            ->add('level')
            ->add('isActive')
            ->add('category', 'entity', array(
                'class' => 'BackendBundle:Category',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                      ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
              ))
            ->add('coordenator')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\Backend\Entity\Course'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_backend_course';
    }
}
