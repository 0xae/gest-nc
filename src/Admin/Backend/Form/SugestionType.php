<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SugestionType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('type', 'choice', array(
                'choices'  => array(
                    'reclamation' => 'Reclamacao',
                    'sugestion' => 'Sugestion'
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
            ->add('createdAt')
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
