<?php

namespace Admin\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoginHistory
 *
 * @ORM\Table(name="login_history", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="login_date_UNIQUE", columns={"login_date"}), @ORM\UniqueConstraint(name="logout_date_UNIQUE", columns={"logout_date"})}, indexes={@ORM\Index(name="fk_login_history_users1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class LoginHistory
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
     * @ORM\Column(name="login_date", type="datetime", nullable=false)
     */
    private $loginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logout_date", type="datetime", nullable=false)
     */
    private $logoutDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set loginDate
     *
     * @param \DateTime $loginDate
     * @return LoginHistory
     */
    public function setLoginDate($loginDate)
    {
        $this->loginDate = $loginDate;

        return $this;
    }

    /**
     * Get loginDate
     *
     * @return \DateTime 
     */
    public function getLoginDate()
    {
        return $this->loginDate;
    }

    /**
     * Set logoutDate
     *
     * @param \DateTime $logoutDate
     * @return LoginHistory
     */
    public function setLogoutDate($logoutDate)
    {
        $this->logoutDate = $logoutDate;

        return $this;
    }

    /**
     * Get logoutDate
     *
     * @return \DateTime 
     */
    public function getLogoutDate()
    {
        return $this->logoutDate;
    }

    /**
     * Set user
     *
     * @param \Admin\Backend\Entity\User $user
     * @return LoginHistory
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
