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
            ->add('complaintCategory')
            ->add('opName')
            ->add('opAddress')
            ->add('opLocality')
            ->add('opPhone')
            ->add('opEmail')
            ->add('factDate')
            ->add('factLocality')
            ->add('factAnnex', 'file', array(
                'label' => 'Anexar documento',
                'required' => false,
                'attr' => [
                    'accept' => '*'
                ]
            ))
            ->add('factDetail', 'textarea', array(
                'attr' => array('rows' => 6)
            ))
            ->add('hasProduct', 'checkbox', array(
                'label' => ' ',
                'required' => false
            ))
            // ->add('hasAnnex', 'checkbox', [
            //     'attr' => [
            //         'required' => false
            //     ]                
            // ])
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
                    'class' => 'btn btn-success',
                    'ng-click' => 'onSubmitForm()'
                )
            ))
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
