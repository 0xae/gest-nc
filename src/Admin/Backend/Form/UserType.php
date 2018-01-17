<?php

namespace Admin\Backend\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class UserType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
                    ->add('name')
                    ->add('username')
                    ->add('password')
                    ->add('code')
                    ->add('phone')
                    ->add('birthdate')
                    ->add('address')
                    ->add('email')
                    ->add('fkUserType', 'entity', array(
                        'class' => 'BackendBundle:Role',
                        'query_builder' => function (EntityRepository $er) {
                            return $er->createQueryBuilder('u')
                              ->orderBy('u.description', 'ASC');
                        },
                        'choice_label' => 'description',
                      ))
		;
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'Admin\Backend\Entity\User',
		));
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'sgabundle_user';
	}
}
