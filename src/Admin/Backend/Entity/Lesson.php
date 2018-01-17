<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lesson
 *
 * @ORM\Table(name="lesson", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="class_discipline_UNIQUE", columns={"discipline_id", "klass_id"})}, indexes={@ORM\Index(name="fk_class_has_modules_modules1_idx", columns={"discipline_id"}), @ORM\Index(name="fk_class_has_modules_class1_idx", columns={"klass_id"}), @ORM\Index(name="fk_lesson_classrooms1_idx", columns={"classroom_id"})})
 * @ORM\Entity
 */
class Lesson
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
     * @ORM\Column(name="started_at", type="time", nullable=false)
     */
    private $startedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ended_at", type="time", nullable=false)
     */
    private $endedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

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
     * @var \Classroom
     *
     * @ORM\ManyToOne(targetEntity="Classroom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classroom_id", referencedColumnName="id")
     * })
     */
    private $classroom;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
     * Set startedAt
     *
     * @param \DateTime $startedAt
     * @return Lesson
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Get startedAt
     *
     * @return \DateTime 
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * Set endedAt
     *
     * @param \DateTime $endedAt
     * @return Lesson
     */
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * Get endedAt
     *
     * @return \DateTime 
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Lesson
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Lesson
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
     * @return Lesson
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
     * @return Lesson
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
     * @return Lesson
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
     * Set classroom
     *
     * @param \Admin\Backend\Entity\Classroom $classroom
     * @return Lesson
     */
    public function setClassroom(\Admin\Backend\Entity\Classroom $classroom = null)
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * Get classroom
     *
     * @return \Admin\Backend\Entity\Classroom 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }
}
