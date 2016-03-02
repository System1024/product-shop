<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Basket
 *
 * @ORM\Table(name="basket", indexes={@ORM\Index(name="FK_basket_1", columns={"bunch"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BasketRepository")
 */
class Basket
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
     * @ORM\Column(name="count", type="integer", nullable=false)
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="descritption", type="text", length=65535, nullable=false)
     */
    private $descritption;

    /**
     * @var string
     *
     * @ORM\Column(name="uid", type="string", length=32, nullable=false)
     */
    private $uid;

    /**
     * @var \ProductRelationPackage
     *
     * @ORM\ManyToOne(targetEntity="ProductRelationPackage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bunch", referencedColumnName="id")
     * })
     */
    private $bunch;



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
     * Set count
     *
     * @param integer $count
     *
     * @return Basket
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set descritption
     *
     * @param string $descritption
     *
     * @return Basket
     */
    public function setDescritption($descritption)
    {
        $this->descritption = $descritption;

        return $this;
    }

    /**
     * Get descritption
     *
     * @return string
     */
    public function getDescritption()
    {
        return $this->descritption;
    }

    /**
     * Set bunch
     *
     * @param2 \AppBundle\Entity\ProductRelationPackage $bunch
     *
     * @return Basket
     */
    public function setProductRelationPackage(\AppBundle\Entity\ProductRelationPackage $bunch = null)
    {
        $this->bunch = $bunch;

        return $this;
    }

    /**
     * Get bunch
     *
     * @return \AppBundle\Entity\ProductRelationPackage
     */
    public function getProductRelationPackage()
    {
        return $this->bunch;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
}
