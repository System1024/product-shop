<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductController
 * Work with products
 *
 * Show list of products
 * Show particular product
 *
 * @package AppBundle\Controller
 */
class ProductController extends CommonController
{
    /**
     * Show list of products
     *
     * @Route("/")
     */
    public function listAction(Request $request)
    {
        $this->startSession($request);

        $repository = $this->container->get('app.service.product')->getRepository();
        $products = $repository->findAll();

        return $this->render('default/products.html.twig', ['modelProductList' => $products]);
    }

    /**
     * Show particular product
     *
     * @Route("/product/{product}")
     *
     * @param $product integer ProductRelationPackage Id
     * @return Response
     */
    public function productAction(Request $request, $product)
    {
        $this->startSession($request);

        $repository = $this->container->get('app.service.product')->getRepository();
        $result = $repository->findByProduct($product);

        return $this->render('default/product.html.twig', ['modelProductList' => $result]);
    }
}
