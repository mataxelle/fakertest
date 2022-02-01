<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", name="index")
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('base.html.twig', []);
    }
}
