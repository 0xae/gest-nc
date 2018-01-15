<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="type_UNIQUE", columns={"description"})})
 * @ORM\Entity
 */
class Role
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=25, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="fkUserType")
     */
    private $fkUsers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkUsers = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set description
     *
     * @param string $description
     * @return Role
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Role
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
     * @return Role
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
     * Add fkUsers
     *
     * @param \Admin\Backend\Entity\User $fkUsers
     * @return Role
     */
    public function addFkUser(\Admin\Backend\Entity\User $fkUsers)
    {
        $this->fkUsers[] = $fkUsers;

        return $this;
    }

    /**
     * Remove fkUsers
     *
     * @param \Admin\Backend\Entity\User $fkUsers
     */
    public function removeFkUser(\Admin\Backend\Entity\User $fkUsers)
    {
        $this->fkUsers->removeElement($fkUsers);
    }

    /**
     * Get fkUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFkUsers()
    {
        return $this->fkUsers;
    }
}
