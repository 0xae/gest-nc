<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="complaint", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Complaint {
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;    

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=45, nullable=true)
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=250, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=250, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="op_name", type="string", length=250, nullable=false)
     */
    private $opName;

    /**
     * @var string
     *
     * @ORM\Column(name="op_address", type="string", length=250, nullable=false)
     */
    private $opAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="op_locality", type="string", length=250, nullable=false)
     */
    private $opLocality;

    /**
     * @var string
     *
     * @ORM\Column(name="op_phone", type="string", length=250, nullable=false)
     */
    private $opPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="op_email", type="string", length=250, nullable=false)
     */
    private $opEmail;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="fact_date", type="date", length=45, nullable=false)
     */
    private $factDate;

    /**
     * @var string
     *
     * @ORM\Column(name="fact_annex", type="string", length=250, nullable=true)
     * @Assert\File(mimeTypes={"application/pdf"})
     */
    private $factAnnex;

    /**
     * @var string
     *
     * @ORM\Column(name="fact_detail", type="string", length=250, nullable=false)
     */
    private $factDetail; 

    /**
     * @var string
     *
     * @ORM\Column(name="fact_locality", type="string", length=250, nullable=false)
     */
    private $factLocality; 

    /**
     * @var string
     *
     * @ORM\Column(name="has_product", type="boolean", nullable=true)
     */
    private $hasProduct; 

    /**
     * @var string
     *
     * @ORM\Column(name="has_annex", type="boolean", nullable=true)
     */
    private $hasAnnex;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_id", referencedColumnName="id", nullable=true)
     * })
     */
     private $annexType;

    /**
     * @var \Module
     *
     * @ORM\ManyToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="module_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $module;

    /**
     * @var \Stage
     *
     * @ORM\ManyToOne(targetEntity="Stage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stage_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $stage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=true)
     * })
     * 
     */
    private $createdBy;

    /**
     * @var \Stage
     *
     * @ORM\Column(name="approval_reason", type="string", length=250, nullable=true)
     */
    private $approvalReason;

    /**
     * @var \Stage
     *
     * @ORM\Column(name="rejection_reason", type="string", length=250, nullable=true)
     */
    private $rejectionReason;

    public function getApprovalReason(){
		return $this->approvalReason;
	}

	public function setApprovalReason($approvalReason){
		$this->approvalReason = $approvalReason;
	}

	public function getRejectionReason(){
		return $this->rejectionReason;
	}

	public function setRejectionReason($rejectionReason){
		$this->rejectionReason = $rejectionReason;
	}

    public function getObjCode() {
        if ($this->type == 'queixa') {
            $ty = '/QX/';
        } else {
            $ty = '/DN/';
        }

        $id = str_pad($this->id, 3, '0', STR_PAD_LEFT);
        return $id . 
                $ty .  $this->createdBy->getEntity()->getCode() .
                '/' . $this->createdAt->format("Y");
    }

    public function getModule(){
		return $this->module;
	}

	public function setModule($module){
		$this->module = $module;
	}

    public function getState(){
		return $this->state;
	}

	public function setState($value){
		$this->state = $value;
	}

	public function getStage(){
		return $this->stage;
	}

	public function setStage($stage){
		$this->stage = $stage;
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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    public function getFactLocality() {
        return $this->factLocality;
    }

    public function setFactLocality($val) {
        $this->factLocality = $val;
        return $this;
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

    /**
     * Set address
     *
     * @param string $address
     * @return Complaint
     */
    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set locality
     *
     * @param string $locality
     * @return Complaint
     */
    public function setLocality($locality) {
        $this->locality = $locality;
        return $this;
    }

    /**
     * Get locality
     *
     * @return string 
     */
    public function getLocality() {
        return $this->locality;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Complaint
     */
    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Complaint
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Complaint
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set opName
     *
     * @param string $opName
     * @return Complaint
     */
    public function setOpName($opName) {
        $this->opName = $opName;
        return $this;
    }

    /**
     * Get opName
     *
     * @return string 
     */
    public function getOpName() {
        return $this->opName;
    }

    /**
     * Set opAddress
     *
     * @param string $opAddress
     * @return Complaint
     */
    public function setOpAddress($opAddress) {
        $this->opAddress = $opAddress;
        return $this;
    }

    /**
     * Get opAddress
     *
     * @return string 
     */
    public function getOpAddress() {
        return $this->opAddress;
    }

    /**
     * Set opLocality
     *
     * @param string $opLocality
     * @return Complaint
     */
    public function setOpLocality($opLocality) {
        $this->opLocality = $opLocality;
        return $this;
    }

    /**
     * Get opLocality
     *
     * @return string 
     */
    public function getOpLocality()
    {
        return $this->opLocality;
    }

    /**
     * Set opPhone
     *
     * @param string $opPhone
     * @return Complaint
     */
    public function setOpPhone($opPhone)
    {
        $this->opPhone = $opPhone;

        return $this;
    }

    /**
     * Get opPhone
     *
     * @return string 
     */
    public function getOpPhone()
    {
        return $this->opPhone;
    }

    /**
     * Set opEmail
     *
     * @param string $opEmail
     * @return Complaint
     */
    public function setOpEmail($opEmail)
    {
        $this->opEmail = $opEmail;

        return $this;
    }

    /**
     * Get opEmail
     *
     * @return string 
     */
    public function getOpEmail()
    {
        return $this->opEmail;
    }

    /**
     * Set factDate
     *
     * @param \DateTime $factDate
     * @return Complaint
     */
    public function setFactDate($factDate)
    {
        $this->factDate = $factDate;

        return $this;
    }

    /**
     * Get factDate
     *
     * @return \DateTime 
     */
    public function getFactDate()
    {
        return $this->factDate;
    }

    /**
     * Set factAnnex
     *
     * @param string $factAnnex
     * @return Complaint
     */
    public function setFactAnnex($factAnnex)
    {
        $this->factAnnex = $factAnnex;

        return $this;
    }

    /**
     * Get factAnnex
     *
     * @return string 
     */
    public function getFactAnnex()
    {
        return $this->factAnnex;
    }

    /**
     * Set factDetail
     *
     * @param string $factDetail
     * @return Complaint
     */
    public function setFactDetail($factDetail)
    {
        $this->factDetail = $factDetail;

        return $this;
    }

    /**
     * Get factDetail
     *
     * @return string 
     */
    public function getFactDetail()
    {
        return $this->factDetail;
    }

    /**
     * Set hasProduct
     *
     * @param string $hasProduct
     * @return Complaint
     */
    public function setHasProduct($hasProduct)
    {
        $this->hasProduct = $hasProduct;

        return $this;
    }

    /**
     * Get hasProduct
     *
     * @return string 
     */
    public function getHasProduct()
    {
        return $this->hasProduct;
    }

    /**
     * Set hasProduct
     *
     * @param string $hasProduct
     * @return Complaint
     */
    public function setHasAnnex($val)
    {
        $this->hasAnnex = $val;

        return $this;
    }

    /**
     * Get hasProduct
     *
     * @return string 
     */
    public function getHasAnnex()
    {
        return $this->hasAnnex;
    }

    /**
     * Set annex
     *
     * @param string $annex
     * @return Complaint
     */
    public function setAnnex($annex)
    {
        $this->annex = $annex;

        return $this;
    }

    /**
     * Get annex
     *
     * @return string 
     */
    public function getAnnex()
    {
        return $this->annex;
    }

    /**
     * Set annexType
     *
     * @param string $annexType
     * @return Complaint
     */
    public function setAnnexType($annexType)
    {
        $this->annexType = $annexType;

        return $this;
    }

    /**
     * Get annexType
     *
     * @return string 
     */
    public function getAnnexType()
    {
        return $this->annexType;
    }
}
