<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    
    public function portfolio(CategoryRepository $categoryRepository): Response
    {
        return $this->json($categoryRepository->findAll(), 200, [], ['groups'=> 'category:read']);
    }

    /*public function categorie(CategoryRepository $categoryRepository): Response
    {
        return $this->render('portfolio/index.html.twig', [
            'controller_name' => 'PortfolioController',
        ]);
    }*/
}
