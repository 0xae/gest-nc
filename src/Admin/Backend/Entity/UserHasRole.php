<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHasRole
 *
 * @ORM\Table(name="user_has_role", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="users_role_UNIQUE", columns={"user_id", "role_id"})}, indexes={@ORM\Index(name="fk_users_has_user_type1_user_type1_idx", columns={"role_id"}), @ORM\Index(name="fk_users_has_user_type1_users1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class UserHasRole
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UserHasRole
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return UserHasRole
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return UserHasRole
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
     * Set role
     *
     * @param \Admin\Backend\Entity\Role $role
     * @return UserHasRole
     */
    public function setRole(\Admin\Backend\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Admin\Backend\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param \Admin\Backend\Entity\User $user
     * @return UserHasRole
     */
    public function setUser(\Admin\Backend\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Admin\Backend\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
