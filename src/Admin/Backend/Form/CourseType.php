<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('createdAt')
            ->add('code')
            ->add('level')
            ->add('createdBy')
            ->add('isActive')
            ->add('category')
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
