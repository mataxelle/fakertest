<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    public function posts(PostRepository $postRepository): Response
    {
        return $this->json($postRepository->findBy([], ['createdAt' => 'DESC']), 200, [], ['groups'=> 'post:read']);
    }
}
