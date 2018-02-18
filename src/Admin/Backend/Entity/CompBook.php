<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompBook
 *
 * @ORM\Table(name="comp_book", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class CompBook {
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
     * @ORM\Column(name="client_name", type="string", length=45, nullable=false)
     */
    private $clientName;


        /**
     * @var string
     *
     * @ORM\Column(name="supplier_name", type="string", length=45, nullable=false)
     */
    private $supplierName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="supplier_address", type="string", length=45, nullable=false)
     */
    private $supplierAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="client_address", type="string", length=45, nullable=false)
     */
    private $clientAddress;


    /**
     * @var string
     *
     * @ORM\Column(name="client_nacionality", type="string", length=45, nullable=false)
     */
    private $clientNacionality;

    /**
     * @var string
     *
     * @ORM\Column(name="client_phone", type="string", length=45, nullable=false)
     */
    private $clientPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="client_passport", type="string", length=45, nullable=false)
     */
    private $clientPassport;

    /**
     * @var string
     *
     * @ORM\Column(name="client_email", type="string", length=45, nullable=false)
     */
    private $clientEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="complaint", type="string", length=250, nullable=false)
     */
    private $complaint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="complaint_date", type="datetime", nullable=false)
     */
    private $complaintDate;

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

    public function getComplaintDate(){
		return $this->complaintDate;
	}

	public function setComplaintDate($complaintDate){
		$this->complaintDate = $complaintDate;
	}

    /**
     * Get id
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     * @return Category
     */
    public function setClientName($name) {
        $this->clientName = $name;
        return $this;
    }

    /**
     * Get name
     * @return string 
     */
    public function getClientName() {
        return $this->clientName;
    }

    /**
     * Set createdAt
     * @param \DateTime $createdAt
     * @return Category
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     * @param integer $createdBy
     * @return Category
     */
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     * @return integer 
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }

    /**
     * Set description
     * @param string $description
     * @return Document
     */
    public function setComplaint($description) {
        $this->complaint = $description;
        return $this;
    }

    /**
     * Get description
     * @return string 
     */
    public function getComplaint() {
        return $this->complaint;
    }
    public function getSupplierName(){
		return $this->supplierName;
	}

	public function setSupplierName($supplierName){
		$this->supplierName = $supplierName;
	}

	public function getSupplierAddress(){
		return $this->supplierAddress;
	}

	public function setSupplierAddress($supplierAddress){
		$this->supplierAddress = $supplierAddress;
	}

	public function getClientAddress(){
		return $this->clientAddress;
	}

	public function setClientAddress($clientAddress){
		$this->clientAddress = $clientAddress;
	}

	public function getClientNacionality(){
		return $this->clientNacionality;
	}

	public function setClientNacionality($clientNacionality){
		$this->clientNacionality = $clientNacionality;
	}

	public function getClientPhone(){
		return $this->clientPhone;
	}

	public function setClientPhone($clientPhone){
		$this->clientPhone = $clientPhone;
	}

	public function getClientPassport(){
		return $this->clientPassport;
	}

	public function setClientPassport($clientPassport){
		$this->clientPassport = $clientPassport;
	}

	public function getClientEmail(){
		return $this->clientEmail;
	}

	public function setClientEmail($clientEmail){
		$this->clientEmail = $clientEmail;
	}
}
