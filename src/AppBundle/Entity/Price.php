<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="price", indexes={@ORM\Index(name="FK_price_1", columns={"bunch"})})
 * @ORM\Entity
 */
class Price
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
     * @ORM\Column(name="price", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var \ProductRelationPackage
     *
     * @ORM\OneToOne(targetEntity="ProductRelationPackage", inversedBy="price")
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
     * Set price
     *
     * @param string $price
     *
     * @return Price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set bunch
     *
     * @param \AppBundle\Entity\ProductRelationPackage $bunch
     *
     * @return Price
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
}
