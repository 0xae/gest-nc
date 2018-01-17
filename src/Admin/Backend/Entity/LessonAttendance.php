<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LessonAttendance
 *
 * @ORM\Table(name="lesson_attendance", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="user_attendance_UNIQUE", columns={"user_id", "lesson_id"})}, indexes={@ORM\Index(name="fk_users_has_lesson_lesson2_idx", columns={"lesson_id"}), @ORM\Index(name="fk_users_has_lesson_users2_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class LessonAttendance
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
     * @var boolean
     *
     * @ORM\Column(name="attendant", type="boolean", nullable=false)
     */
    private $attendant;

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
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

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
     * Set attendant
     *
     * @param boolean $attendant
     * @return LessonAttendance
     */
    public function setAttendant($attendant)
    {
        $this->attendant = $attendant;

        return $this;
    }

    /**
     * Get attendant
     *
     * @return boolean 
     */
    public function getAttendant()
    {
        return $this->attendant;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LessonAttendance
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
     * @return LessonAttendance
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
     * Set lesson
     *
     * @param \Admin\Backend\Entity\Lesson $lesson
     * @return LessonAttendance
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
     * Set user
     *
     * @param \Admin\Backend\Entity\User $user
     * @return LessonAttendance
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
