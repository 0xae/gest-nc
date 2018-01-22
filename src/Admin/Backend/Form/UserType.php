<?php

namespace Admin\Backend\Form;

use Admin\Backend\Entity\User;

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
                    ->add('fkUserType', 'choice', array(
                        'choices' => $options['sysRoles'],
                        'multiple'=>true,
                        'expanded'=>true,
                        'required'=>true,
                        'data' => $options['userRoles']
                      ))
		;
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'Admin\Backend\Entity\User',
                    	'sysRoles' => null,
                    	'userRoles' => null,

		));
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'sgabundle_user';
	}
}
