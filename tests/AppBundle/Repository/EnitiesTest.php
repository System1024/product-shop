<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.03.2016
 * Time: 14:37
 */

namespace tests\AppBundle\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

//class BasketRepositoryTest extends \PHPUnit_Framework_TestCase
class EntitiesTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }

    public function testPrice()
    {
        $result = $this->em
            ->getRepository('AppBundle:Price')
            ->findAll();

        $this->assertInternalType('array',$result);
//        $this->assertNotEmpty($result);
    }

    public function testProduct()
    {
        $result = $this->em
            ->getRepository('AppBundle:Product')
            ->findAll();
        $this->assertInternalType('array',$result);
    }

    public function testBasket()
    {
        $result = $this->em
            ->getRepository('AppBundle:Basket')
            ->findAll();
        $this->assertInternalType('array',$result);
    }

    public function testDiscount()
    {
        $result = $this->em
            ->getRepository('AppBundle:Discount')
            ->findAll();
        $this->assertInternalType('array',$result);
    }
    public function testPackage()
    {
        $result = $this->em
            ->getRepository('AppBundle:Package')
            ->findAll();
        $this->assertInternalType('array',$result);
    }
    public function testProductRelationPackage()
    {
        $result = $this->em
            ->getRepository('AppBundle:ProductRelationPackage')
            ->findAll();
        $this->assertInternalType('array',$result);
    }
}
