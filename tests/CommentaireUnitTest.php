<?php

namespace App\Tests;

use App\Entity\Commentaire;
use App\Entity\Peinture;
use App\Entity\Post;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $commentaire = new Commentaire();
        $post = new Post();
        $peinture = new Peinture();
        $datetime = new DateTime();

        $commentaire->setAuteur('auteur')
                    ->setEmail('true@test.com')
                    ->setContenu('contenu')
                    ->setCreatedAt($datetime)
                    ->setPost($post)
                    ->setPeinture($peinture);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'true@test.com');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getCreatedAt() === $datetime);
        $this->assertTrue($commentaire->getPost() === $post);
        $this->assertTrue($commentaire->getPeinture() === $peinture);
    }

    public function testIsFalse(): void
    {
        $commentaire = new Commentaire();
        $post = new Post();
        $peinture = new Peinture();
        $datetime = new DateTime();

        $commentaire->setAuteur('auteur')
                    ->setEmail('true@test.com')
                    ->setContenu('contenu')
                    ->setCreatedAt($datetime)
                    ->setPost($post)
                    ->setPeinture($peinture);

        $this->assertFalse($commentaire->getAuteur() === 'false');
        $this->assertFalse($commentaire->getEmail() === 'false@test.com');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getCreatedAt() === new DateTime());
        $this->assertFalse($commentaire->getPost() === new Post());
        $this->assertFalse($commentaire->getPeinture() === new Peinture());
    }

    public function testIsEmpty(): void
    {
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getPost());
        $this->assertEmpty($commentaire->getPeinture());
        $this->assertEmpty($commentaire->getId());
    }
}
