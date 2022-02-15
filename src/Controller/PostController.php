<?php

namespace App\Controller;

use App\Entity\Post;
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

    public function show(Post $post)
    {
        return $this->json($post, 200, [], ['groups'=> 'post:read']);
    }
}
