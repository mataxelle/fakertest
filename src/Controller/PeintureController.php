<?php

namespace App\Controller;

use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    #[Route('/peintures', name: 'peintures')]
    public function peintures(PeintureRepository $peintureRepository)
    {
        return $this->json($peintureRepository->findAll(), 200, [], ['groups'=> 'peinture:read']);
    }
}
