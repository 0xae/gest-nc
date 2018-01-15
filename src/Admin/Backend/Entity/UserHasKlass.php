<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHasKlass
 *
 * @ORM\Table(name="user_has_klass", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="users_class_discipline_UNIQUE", columns={"user_id", "klass_id", "discipline_id"})}, indexes={@ORM\Index(name="fk_users_has_class_class1_idx", columns={"klass_id"}), @ORM\Index(name="fk_users_has_class_users1_idx", columns={"user_id"}), @ORM\Index(name="fk_users_has_class_discipline1_idx", columns={"discipline_id"})})
 * @ORM\Entity
 */
class UserHasKlass
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
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \Klass
     *
     * @ORM\ManyToOne(targetEntity="Klass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="klass_id", referencedColumnName="id")
     * })
     */
    private $klass;

    /**
     * @var \Discipline
     *
     * @ORM\ManyToOne(targetEntity="Discipline")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discipline_id", referencedColumnName="id")
     * })
     */
    private $discipline;

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
     * @return UserHasKlass
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
     * @return UserHasKlass
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
     * Set klass
     *
     * @param \Admin\Backend\Entity\Klass $klass
     * @return UserHasKlass
     */
    public function setKlass(\Admin\Backend\Entity\Klass $klass = null)
    {
        $this->klass = $klass;

        return $this;
    }

    /**
     * Get klass
     *
     * @return \Admin\Backend\Entity\Klass 
     */
    public function getKlass()
    {
        return $this->klass;
    }

    /**
     * Set discipline
     *
     * @param \Admin\Backend\Entity\Discipline $discipline
     * @return UserHasKlass
     */
    public function setDiscipline(\Admin\Backend\Entity\Discipline $discipline = null)
    {
        $this->discipline = $discipline;

        return $this;
    }

    /**
     * Get discipline
     *
     * @return \Admin\Backend\Entity\Discipline 
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Set user
     *
     * @param \Admin\Backend\Entity\User $user
     * @return UserHasKlass
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
