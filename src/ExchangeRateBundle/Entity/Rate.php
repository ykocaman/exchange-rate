<?php

namespace ExchangeRateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity(repositoryClass="ExchangeRateBundle\Repository\RateRepository")
 */
class Rate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="source", type="smallint", unique=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="usdtry", type="decimal", precision=10, scale=5)
     */
    private $usdtry;

    /**
     * @var string
     *
     * @ORM\Column(name="eurtry", type="decimal", precision=10, scale=5)
     */
    private $eurtry;

    /**
     * @var string
     *
     * @ORM\Column(name="gbptry", type="decimal", precision=10, scale=5)
     */
    private $gbptry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * Set id
     *
     * @param integer $source
     *
     * @return int
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set source
     *
     * @param integer $source
     *
     * @return Rate
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set usdtry
     *
     * @param string $usdtry
     *
     * @return Rate
     */
    public function setUsdtry($usdtry)
    {
        $this->usdtry = $usdtry;

        return $this;
    }

    /**
     * Get usdtry
     *
     * @return string
     */
    public function getUsdtry()
    {
        return $this->usdtry;
    }

    /**
     * Set eurtry
     *
     * @param string $eurtry
     *
     * @return Rate
     */
    public function setEurtry($eurtry)
    {
        $this->eurtry = $eurtry;

        return $this;
    }

    /**
     * Get eurtry
     *
     * @return string
     */
    public function getEurtry()
    {
        return $this->eurtry;
    }

    /**
     * Set gbptry
     *
     * @param string $gbptry
     *
     * @return Rate
     */
    public function setGbptry($gbptry)
    {
        $this->gbptry = $gbptry;

        return $this;
    }

    /**
     * Get gbptry
     *
     * @return string
     */
    public function getGbptry()
    {
        return $this->gbptry;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Rate
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

