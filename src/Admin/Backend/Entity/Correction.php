<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="correction", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Correction {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=false)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="action_description", type="string", length=255, nullable=false)
     */
    private $actionDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="action_type", type="string", length=255, nullable=false)
     */
    private $actionType;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="action_author", referencedColumnName="id", nullable=false)
     * })
     */
     private $actionAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="action_date", type="datetime", nullable=false)
     */
    private $actionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cause_description", type="string", length=255, nullable=false)
     */
    private $causeDescription;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cause_resp", referencedColumnName="id", nullable=false)
     * })
     */
    private $causeResp;

    /**
     * @var string
     *
     * @ORM\Column(name="cause_date", type="datetime", nullable=false)
     */    
    private $causeDate;

    /**
     * \ImplMeasure
     */
    private $implObjs;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="impl_resp", referencedColumnName="id", nullable=true)
     * })
     */
    private $implResp;

    /**
     * @var string
     *
     * @ORM\Column(name="impl_date", type="datetime", nullable=true)
     */    
    private $implDate;

    /**
     * @var string
     *
     * @ORM\Column(name="close_finished", type="boolean", nullable=true)
    */    
    private $closeFinished;

    /**
     * @var string
     *
     * @ORM\Column(name="close_date2", type="datetime", nullable=true)
    */  
    private $closeDate2;

        /**
     * @var string
     *
     * @ORM\Column(name="close_eficacy", type="boolean", nullable=true)
    */    
    private $closeEficacy;

    /**
     * @var string
     *
     * @ORM\Column(name="close_action", type="string", length=255, nullable=false)
     */
    private $closeAction;
    
    /**
     * @var string
     *
     * @ORM\Column(name="close_in_date", type="datetime", nullable=true)
    */ 
    private $closeInDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="close_resp", referencedColumnName="id", nullable=true)
     * })
     */
    private $closeResp;

    /**
     * @var string
     *
     * @ORM\Column(name="close_date", type="datetime", nullable=true)
    */ 
    private $closeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=false)
     * })
     */
    private $createdBy;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Category
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Category
     */
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }
}
