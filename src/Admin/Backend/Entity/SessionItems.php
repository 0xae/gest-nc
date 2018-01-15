<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SessionItems
 *
 * @ORM\Table(name="session_items", uniqueConstraints={@ORM\UniqueConstraint(name="session_inventory_UNIQUE", columns={"lesson_session_id", "inventory_id"}), @ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_teacher_session_has_inventory_inventory1_idx", columns={"inventory_id"}), @ORM\Index(name="fk_teacher_session_has_inventory_teacher_session1_idx", columns={"lesson_session_id"})})
 * @ORM\Entity
 */
class SessionItems
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
     * @ORM\Column(name="item_amount", type="integer", nullable=false)
     */
    private $itemAmount;

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
     * @var \Inventory
     *
     * @ORM\ManyToOne(targetEntity="Inventory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inventory_id", referencedColumnName="id")
     * })
     */
    private $inventory;

    /**
     * @var \LessonSession
     *
     * @ORM\ManyToOne(targetEntity="LessonSession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lesson_session_id", referencedColumnName="id")
     * })
     */
    private $lessonSession;



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
     * Set itemAmount
     *
     * @param integer $itemAmount
     * @return SessionItems
     */
    public function setItemAmount($itemAmount)
    {
        $this->itemAmount = $itemAmount;

        return $this;
    }

    /**
     * Get itemAmount
     *
     * @return integer 
     */
    public function getItemAmount()
    {
        return $this->itemAmount;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SessionItems
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
     * @return SessionItems
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
     * Set inventory
     *
     * @param \Admin\Backend\Entity\Inventory $inventory
     * @return SessionItems
     */
    public function setInventory(\Admin\Backend\Entity\Inventory $inventory = null)
    {
        $this->inventory = $inventory;

        return $this;
    }

    /**
     * Get inventory
     *
     * @return \Admin\Backend\Entity\Inventory 
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Set lessonSession
     *
     * @param \Admin\Backend\Entity\LessonSession $lessonSession
     * @return SessionItems
     */
    public function setLessonSession(\Admin\Backend\Entity\LessonSession $lessonSession = null)
    {
        $this->lessonSession = $lessonSession;

        return $this;
    }

    /**
     * Get lessonSession
     *
     * @return \Admin\Backend\Entity\LessonSession 
     */
    public function getLessonSession()
    {
        return $this->lessonSession;
    }
}
