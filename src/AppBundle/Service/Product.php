<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.03.2016
 * Time: 11:27
 */

namespace AppBundle\Service;

/**
 * Service Class for Product
 *
 * @package AppBundle\Service
 */
class Product
{
    protected $repository;

    /**
     * Constructor.
     *
     * @param $repository
     * @throws \Exception
     */
    function __construct($repository)
    {
        if (empty($repository)) {
            throw new \Exception('Empty name of repository');
        }

        $this->repository = $repository;
    }

    /**
     * Get Repository
     *
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }

}