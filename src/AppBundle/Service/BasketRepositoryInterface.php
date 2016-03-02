<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.03.2016
 * Time: 11:23
 */

namespace AppBundle\Service;


interface BasketRepositoryInterface
{
    public function getBasket($userid);
    public function putToBasket($userId, $bunchId, $count);
    public function removeFromBasket($userId, $id);
    public function getBasketCount($userId);
    public function cleanBasket($userId);
}