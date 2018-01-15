<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseHasDiscipline
 *
 * @ORM\Table(name="course_has_discipline", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="courses_discipline_UNIQUE", columns={"course_id", "discipline_id"})}, indexes={@ORM\Index(name="fk_courses_has_modules_modules1_idx", columns={"discipline_id"}), @ORM\Index(name="fk_courses_has_modules_courses1_idx", columns={"course_id"})})
 * @ORM\Entity
 */
class CourseHasDiscipline
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
     * @ORM\Column(name="hour_workload", type="integer", nullable=false)
     */
    private $hourWorkload;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \Course
     *
     * @ORM\ManyToOne(targetEntity="Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

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
     * @return CourseHasDiscipline
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
     * Set hourWorkload
     *
     * @param integer $hourWorkload
     * @return CourseHasDiscipline
     */
    public function setHourWorkload($hourWorkload)
    {
        $this->hourWorkload = $hourWorkload;

        return $this;
    }

    /**
     * Get hourWorkload
     *
     * @return integer 
     */
    public function getHourWorkload()
    {
        return $this->hourWorkload;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return CourseHasDiscipline
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
     * Set course
     *
     * @param \Admin\Backend\Entity\Course $course
     * @return CourseHasDiscipline
     */
    public function setCourse(\Admin\Backend\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \Admin\Backend\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set discipline
     *
     * @param \Admin\Backend\Entity\Discipline $discipline
     * @return CourseHasDiscipline
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
}
