<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wikihistory
 *
 * @ORM\Table(name="wikihistory", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_WikiHistory_User1_idx", columns={"User_id"}), @ORM\Index(name="fk_WikiHistory_WikiArticle1_idx", columns={"WikiArticle_id"})})
 * @ORM\Entity
 */
class Wikihistory
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Wikiarticle
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Wikiarticle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="WikiArticle_id", referencedColumnName="id")
     * })
     */
    private $wikiarticle;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Wikihistory
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set wikiarticle
     *
     * @param \AppBundle\Entity\Wikiarticle $wikiarticle
     *
     * @return Wikihistory
     */
    public function setWikiarticle(\AppBundle\Entity\Wikiarticle $wikiarticle = null)
    {
        $this->wikiarticle = $wikiarticle;

        return $this;
    }

    /**
     * Get wikiarticle
     *
     * @return \AppBundle\Entity\Wikiarticle
     */
    public function getWikiarticle()
    {
        return $this->wikiarticle;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Wikihistory
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
