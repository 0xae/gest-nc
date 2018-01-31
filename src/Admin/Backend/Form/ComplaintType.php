<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComplaintType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
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
            ->add('factAnnex', 'file', array(
                'attr' => array(
                    'class' => "form-control"
                )
            ))
            ->add('factDetail', 'textarea', array(
                'attr' => array(
                    'rows' => 6
                )
            ))
            ->add('hasProduct', 'checkbox')
            ->add('hasAnnex', 'checkbox')            
            ->add('annex')
            ->add('annexType')
            ->add('createdAt')
            // ->add('createdBy')
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
