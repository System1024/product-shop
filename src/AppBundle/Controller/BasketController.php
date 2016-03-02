<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BasketController
 * Work with basket. Get, Put, Get List products in basket, etc...
 *
 * @package AppBundle\Controller
 */
class BasketController extends CommonController
{
    /**
     * Get Basket
     *
     * @Route("/basket")
     */
    public function basketAction(Request $request)
    {
        $this->startSession($request);

        $repository = $this->container->get('app.service.shop')->getRepository();

        // let the session id will be our user identifier
        // it is of cause not good idea for production
        // just for this little test
        $sessionId = $request->getSession()->getId();
        $entityBasket = $repository->getBasket($sessionId);

        return $this->render('default/basket.html.twig', ['modelBasketList' => $entityBasket ]);
    }

    /**
     * Put product to the basket
     *
     * @Route("/basket/put/{id}/{cnt}", requirements={
     *     "id": "\d+",
     *     "cnt": "\d+"
     * })
     */
    public function putAction(Request $request, $id, $cnt)
    {
        $this->startSession($request);

        $sessionId = $request->getSession()->getId();

        $repository = $this->container->get('app.service.shop')->getRepository();
        $repository->putToBasket($sessionId, $id, $cnt);

        return new Response("OK");
    }

    /**
     * Remove product from the basket
     *
     * @Route("/basket/remove/{basketId}", requirements={
     *     "basketId": "\d+"
     * })
     */
    public function removeAction(Request $request, $basketId)
    {
        $this->startSession($request);

        $sessionId = $request->getSession()->getId();

        $repository = $this->container->get('app.service.shop')->getRepository();
        $repository->removeFromBasket($sessionId, $basketId);

        return new Response("OK");
    }

}
