<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_evaluation_lesson1_idx", columns={"lesson_id"}), @ORM\Index(name="fk_evaluation_users1_idx", columns={"student_id"})})
 * @ORM\Entity
 */
class Evaluation
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
     * @var integer
     *
     * @ORM\Column(name="grade", type="integer", nullable=true)
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="document_dir", type="string", length=100, nullable=true)
     */
    private $documentDir;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_project_date", type="datetime", nullable=true)
     */
    private $startProjectDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_project_date", type="datetime", nullable=true)
     */
    private $endProjectDate;

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
     *   @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * })
     */
    private $student;



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
     * Set grade
     *
     * @param integer $grade
     * @return Evaluation
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set documentDir
     *
     * @param string $documentDir
     * @return Evaluation
     */
    public function setDocumentDir($documentDir)
    {
        $this->documentDir = $documentDir;

        return $this;
    }

    /**
     * Get documentDir
     *
     * @return string 
     */
    public function getDocumentDir()
    {
        return $this->documentDir;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Evaluation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set startProjectDate
     *
     * @param \DateTime $startProjectDate
     * @return Evaluation
     */
    public function setStartProjectDate($startProjectDate)
    {
        $this->startProjectDate = $startProjectDate;

        return $this;
    }

    /**
     * Get startProjectDate
     *
     * @return \DateTime 
     */
    public function getStartProjectDate()
    {
        return $this->startProjectDate;
    }

    /**
     * Set endProjectDate
     *
     * @param \DateTime $endProjectDate
     * @return Evaluation
     */
    public function setEndProjectDate($endProjectDate)
    {
        $this->endProjectDate = $endProjectDate;

        return $this;
    }

    /**
     * Get endProjectDate
     *
     * @return \DateTime 
     */
    public function getEndProjectDate()
    {
        return $this->endProjectDate;
    }

    /**
     * Set lesson
     *
     * @param \Admin\Backend\Entity\Lesson $lesson
     * @return Evaluation
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
     * Set student
     *
     * @param \Admin\Backend\Entity\User $student
     * @return Evaluation
     */
    public function setStudent(\Admin\Backend\Entity\User $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Admin\Backend\Entity\User 
     */
    public function getStudent()
    {
        return $this->student;
    }
}
