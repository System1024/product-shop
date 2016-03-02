<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discount
 *
 * @ORM\Table(name="discount", indexes={@ORM\Index(name="FK_discount_1", columns={"bunch"})})
 * @ORM\Entity
 */
class Discount
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
     * @ORM\Column(name="discount", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $discount;

    /**
     * @var \ProductRelationPackage
     *
     * @ORM\OneToOne(targetEntity="ProductRelationPackage", inversedBy="discount")
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
     * Set discount
     *
     * @param string $discount
     *
     * @return Discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set bunch
     *
     * @param \AppBundle\Entity\ProductRelationPackage $bunch
     *
     * @return Discount
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
