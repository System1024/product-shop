<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.03.2016
 * Time: 14:37
 */

namespace tests\AppBundle\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasketRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    private $repository;

    private $userId = 'testid';

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->repository = $this->em->getRepository('AppBundle:Basket');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }

    public function testBasket()
    {
        $result = $this->repository
            ->findAll();
        $this->assertInternalType('array',$result);
    }

    public function testCleanBasket()
    {
        $result = $this->repository->cleanBasket($this->userId);
        $this->assertTrue($result);
    }

    public function testGetBasketCount()
    {
        $count = $this->repository->getBasketCount($this->userId);
        $this->assertEquals(0, $count);
    }

    public function testPutToBasket()
    {
        $bunchId = 1;
        $count = 1;

        $result = $this->repository
            ->putToBasket($this->userId, $bunchId, $count);

        $this->assertTrue($result);
    }

    public function testGetBasketCountAfterInsert()
    {
        $count = $this->repository->getBasketCount($this->userId);
        $this->assertEquals(1, $count);
    }

    public function testGetBasket()
    {
        $result = $this->repository
            ->getBasket($this->userId);

        $this->assertInternalType('array',$result);
        $this->assertCount(1, $result);

        return $result[0]->getId();
    }

    /**
     * @depends testGetBasket
     */
    public function testRemoveFromBasket($basketId)
    {
        $result = $this->repository
            ->removeFromBasket($this->userId, $basketId);

        $this->assertTrue($result);
    }

    public function testGetBasketCountAfterRemove()
    {
        $count = $this->repository->getBasketCount($this->userId);
        $this->assertEquals(0, $count);
    }

}
