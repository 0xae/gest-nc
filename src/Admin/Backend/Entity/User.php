<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="school_id_UNIQUE", columns={"code"})})
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    public function __construct() {


		parent::__construct();
		$this->fkUserType = new \Doctrine\Common\Collections\ArrayCollection();
	}

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_dir", type="string", length=100, nullable=true)
     */
    private $photoDir;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=true)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=true)
     */
    private $createdBy;

    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="fkUsers")
     * @ORM\JoinTable(name="users_has_user_type",
     *   joinColumns={
     *     @ORM\JoinColumn(name="fk_users", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="fk_user_type", referencedColumnName="id")
     *   }
     * )
     */
    private $fkUserType;

    
   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set photoDir
     *
     * @param string $photoDir
     * @return User
     */
    public function setPhotoDir($photoDir)
    {
        $this->photoDir = $photoDir;

        return $this;
    }

    /**
     * Get photoDir
     *
     * @return string 
     */
    public function getPhotoDir()
    {
        return $this->photoDir;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return User
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return User
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    

    /**
     * Add fkUserType
     *
     * @param \Admin\Backend\Entity\Role $fkUserType
     * @return User
     */
    public function addFkUserType(\Admin\Backend\Entity\Role $fkUserType)
    {
        $this->fkUserType[] = $fkUserType;

        return $this;
    }

    /**
     * Remove fkUserType
     *
     * @param \Admin\Backend\Entity\Role $fkUserType
     */
    public function removeFkUserType(\Admin\Backend\Entity\Role $fkUserType)
    {
        $this->fkUserType->removeElement($fkUserType);
    }

    /**
     * Get fkUserType
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFkUserType()
    {
        return $this->fkUserType;
    }
}
