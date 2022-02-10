<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    public function apropos(UserRepository $userRepository): Response
    {
        return $this->json($userRepository->getPeintre(), 200, [], ['groups'=> 'peintre:apropos']);
    }
}
