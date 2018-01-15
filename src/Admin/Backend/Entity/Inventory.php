<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventory
 *
 * @ORM\Table(name="inventory", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="product_name_UNIQUE", columns={"product_name"})})
 * @ORM\Entity
 */
class Inventory
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
     * @ORM\Column(name="product_name", type="string", length=45, nullable=true)
     */
    private $productName;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_amount", type="integer", nullable=false)
     */
    private $totalAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="available_amount", type="integer", nullable=false)
     */
    private $availableAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;



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
     * Set productName
     *
     * @param string $productName
     * @return Inventory
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set totalAmount
     *
     * @param integer $totalAmount
     * @return Inventory
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return integer 
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Inventory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Inventory
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
     * Set availableAmount
     *
     * @param integer $availableAmount
     * @return Inventory
     */
    public function setAvailableAmount($availableAmount)
    {
        $this->availableAmount = $availableAmount;

        return $this;
    }

    /**
     * Get availableAmount
     *
     * @return integer 
     */
    public function getAvailableAmount()
    {
        return $this->availableAmount;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Inventory
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
}
