<?php

namespace App\Tests;

use App\Entity\Post;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class PostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $post = new Post();
        $user = new User();
        $datetime = new DateTime();

        $post->setTitre('titre')
             ->setContenu('contenu')
             ->setSlug('slug')
             ->setCreatedAt($datetime)
             ->setUser($user);

        $this->assertTrue($post->getTitre() === 'titre');
        $this->assertTrue($post->getContenu() === 'contenu');
        $this->assertTrue($post->getSlug() === 'slug');
        $this->assertTrue($post->getCreatedAt() === $datetime);
        $this->assertTrue($post->getUser() === $user);
    }

    public function testIsFalse()
    {
        $post = new Post();
        $user = new User();
        $datetime = new DateTime();

        $post->setTitre('titre')
             ->setContenu('contenu')
             ->setSlug('slug')
             ->setCreatedAt($datetime)
             ->setUser($user);

        $this->assertFalse($post->getTitre() === 'false');
        $this->assertFalse($post->getContenu() === 'false');
        $this->assertFalse($post->getSlug() === 'false');
        $this->assertFalse($post->getCreatedAt() === new DateTime());
        $this->assertFalse($post->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $post = new Post();

        $this->assertEmpty($post->getTitre());
        $this->assertEmpty($post->getContenu());
        $this->assertEmpty($post->getSlug());
        $this->assertEmpty($post->getCreatedAt());
        $this->assertEmpty($post->getUser());
    }
}
