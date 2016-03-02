<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.03.2016
 * Time: 11:27
 */

namespace AppBundle\Service;

/**
 * Service Class Basket
 *
 * @package AppBundle\Service
 */
class Basket
{
    protected $basketRepository;

    /**
     * Basket constructor.
     *
     * @param BasketRepositoryInterface $basketRepository
     * @throws \Exception
     */
    function __construct(BasketRepositoryInterface $basketRepository)
    {
        if (empty($basketRepository)) {
            throw new \Exception('Empty name of repository');
        }

        $this->basketRepository = $basketRepository;
    }

    /**
     * Get Basket Repository
     *
     * @return BasketRepositoryInterface
     */
    public function getRepository()
    {
        return $this->basketRepository;
    }

}