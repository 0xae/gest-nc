<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeacherDiscipline
 *
 * @ORM\Table(name="teacher_discipline", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="users_discipline_UNIQUE", columns={"teacher_id", "dicipline_id"})}, indexes={@ORM\Index(name="fk_users_has_modules_modules1_idx", columns={"dicipline_id"}), @ORM\Index(name="fk_users_has_modules_users1_idx", columns={"teacher_id"})})
 * @ORM\Entity
 */
class TeacherDiscipline
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
     * @var \Discipline
     *
     * @ORM\ManyToOne(targetEntity="Discipline")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dicipline_id", referencedColumnName="id")
     * })
     */
    private $dicipline;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * })
     */
    private $teacher;



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
     * @return TeacherDiscipline
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
     * @return TeacherDiscipline
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
     * Set dicipline
     *
     * @param \Admin\Backend\Entity\Discipline $dicipline
     * @return TeacherDiscipline
     */
    public function setDicipline(\Admin\Backend\Entity\Discipline $dicipline = null)
    {
        $this->dicipline = $dicipline;

        return $this;
    }

    /**
     * Get dicipline
     *
     * @return \Admin\Backend\Entity\Discipline 
     */
    public function getDicipline()
    {
        return $this->dicipline;
    }

    /**
     * Set teacher
     *
     * @param \Admin\Backend\Entity\User $teacher
     * @return TeacherDiscipline
     */
    public function setTeacher(\Admin\Backend\Entity\User $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Admin\Backend\Entity\User 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
