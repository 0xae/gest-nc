<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends BaseUser {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct() {
		parent::__construct();
		// your own logic
	}

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="ultimo_login", type="datetime", nullable=true)
	 */
	private $ultimoLogin;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set ultimoLogin
	 *
	 * @param \DateTime $ultimoLogin
	 * @return User
	 */
	public function setUltimoLogin($ultimoLogin) {
		$this->ultimoLogin = $ultimoLogin;

		return $this;
	}

	/**
	 * Get ultimoLogin
	 *
	 * @return \DateTime
	 */
	public function getUltimoLogin() {
		return $this->ultimoLogin;
	}
}
