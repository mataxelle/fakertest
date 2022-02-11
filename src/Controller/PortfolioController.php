<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PortfolioController extends AbstractController
{
    
    public function portfolio(CategoryRepository $categoryRepository)
    {
        return $this->json($categoryRepository->findAll(), 200, [], ['groups'=> 'category:read']);
    }

    public function categorie(Category $category)
    {

        return $this->json($category, 200, [], ['groups'=> 'category:read']);
    }
}
