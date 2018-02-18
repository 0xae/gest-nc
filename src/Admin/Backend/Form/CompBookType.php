<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompBookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientName')
            ->add('supplierName')
            ->add('supplierAddress')
            ->add('clientAddress')
            ->add('clientNacionality')
            ->add('clientPhone')
            ->add('clientPassport')
            ->add('clientEmail')
            ->add('complaint')
            ->add('complaintDate')
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
            'data_class' => 'Admin\Backend\Entity\CompBook'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_backend_compbook';
    }
}
