<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CvController extends Controller
{
    /**
     * Lists all contact entities.
     *
     * @param Request $request posted info
     *
     * @Route          ("/download/cv",  name="download_cv")
     * @Method({"GET", "POST"})
     * @return         \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function downloadAction()
    {
        $context['path'] = '../public/pdf/cvalexandre.pdf';

        return $this->file($context['path']);
    }
}