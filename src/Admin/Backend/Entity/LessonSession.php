<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LessonSession
 *
 * @ORM\Table(name="lesson_session", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_teacher_session_lesson1_idx", columns={"lesson_id"}), @ORM\Index(name="fk_teacher_session_users1_idx", columns={"teacher_id"})})
 * @ORM\Entity
 */
class LessonSession
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
     * @ORM\Column(name="summary", type="string", length=45, nullable=true)
     */
    private $summary;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="text", length=65535, nullable=true)
     */
    private $observation;

    /**
     * @var \Lesson
     *
     * @ORM\ManyToOne(targetEntity="Lesson")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lesson_id", referencedColumnName="id")
     * })
     */
    private $lesson;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * })
     */
    private $teacher;

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
     * Set summary
     *
     * @param string $summary
     * @return LessonSession
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LessonSession
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
     * Set observation
     *
     * @param string $observation
     * @return LessonSession
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string 
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set lesson
     *
     * @param \Admin\Backend\Entity\Lesson $lesson
     * @return LessonSession
     */
    public function setLesson(\Admin\Backend\Entity\Lesson $lesson = null)
    {
        $this->lesson = $lesson;

        return $this;
    }

    /**
     * Get lesson
     *
     * @return \Admin\Backend\Entity\Lesson 
     */
    public function getLesson()
    {
        return $this->lesson;
    }

    /**
     * Set teacher
     *
     * @param \Admin\Backend\Entity\User $teacher
     * @return LessonSession
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
