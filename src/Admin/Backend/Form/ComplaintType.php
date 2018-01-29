<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComplaintType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('locality')
            ->add('phone')
            ->add('email')
            ->add('type')
            ->add('opName')
            ->add('opAddress')
            ->add('opLocality')
            ->add('opPhone')
            ->add('opEmail')
            ->add('factDate')
            ->add('factAnnex')
            ->add('factDetail')
            ->add('hasProduct')
            ->add('annex')
            ->add('annexType')
            ->add('createdAt')
            ->add('createdBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\Backend\Entity\Complaint'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_backend_complaint';
    }
}
