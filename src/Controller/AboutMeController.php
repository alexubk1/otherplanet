<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Contact controller.
 *
 *
 */
class AboutMeController extends Controller
{
    /**
     * Lists all contact entities.
     *
     * @param Request $request posted info
     *
     * @Route          ("/aboutme",  name="aboutme_index")
     * @Method({"GET", "POST"})
     * @return         \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {

        return $this->render(
            'aboutme/index.html.twig', [
            ]
        );
    }
}