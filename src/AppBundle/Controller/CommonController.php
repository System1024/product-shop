<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CommonController
 * Provides simple basic finctions
 *
 * @package AppBundle\Controller
 */
class CommonController extends Controller
{
    /**
     * Start php session
     *
     * @param Request $request
     */
    protected function startSession(Request $request)
    {
        if (!$request->getSession()->isStarted()) {
            $request->getSession()->start();
        }
    }
}
