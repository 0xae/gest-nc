<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CorrectionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('source')
            ->add('actionDescription')
            ->add('actionType')
            ->add('actionDate')
            ->add('causeDescription')
            ->add('causeDate')
            ->add('implDate')
            ->add('closeFinished')
            ->add('closeDate2')
            ->add('closeEficacy')
            ->add('closeAction')
            ->add('closeInDate')
            ->add('closeDate')
            ->add('createdAt')
            ->add('actionAuthor')
            ->add('causeResp')
            ->add('implResp')
            ->add('closeResp')
            ->add('createdBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\Backend\Entity\Correction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_backend_correction';
    }
}
