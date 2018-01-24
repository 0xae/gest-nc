<?php

namespace Admin\Backend\Form;

use Admin\Backend\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ProfessorType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('name')
			->add('email')
			->add('phone')
			->add('birthdate')
			->add('address')
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
