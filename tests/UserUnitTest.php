<?php

namespace App\Tests;

use App\Entity\Peinture;
use App\Entity\Post;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setNom('nom')
             ->setPrenom('prenom')
             ->setEmail('true@test.com')
             ->setPassword('password')
             ->setTelephone('0123456789')
             ->setAPropos('a propos')
             ->setRoles(['ROLE_TEST']);

        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getUserIdentifier() === 'true@test.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getTelephone() === '0123456789');
        $this->assertTrue($user->getAPropos() === 'a propos');
        $this->assertTrue($user->getRoles() === ['ROLE_TEST', 'ROLE_USER']);
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setNom('nom')
             ->setPrenom('prenom')
             ->setEmail('true@test.com')
             ->setPassword('password')
             ->setTelephone('0123456789')
             ->setAPropos('a propos');

        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getUserIdentifier() === 'false@test.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getTelephone() === '0987654321');
        $this->assertFalse($user->getAPropos() === 'a false');
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUserIdentifier());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getId());
    }

    public function testGetAddRemovePeinture() {
        $user = new User();
        $peinture = new Peinture();

        $this->assertEmpty($user->getPeintures());

        $user->addPeinture(($peinture));
        $this->assertContains($peinture, $user->getPeintures());

        $user->removePeinture(($peinture));
        $this->assertEmpty($user->getPeintures());
    }

    public function testGetAddRemovePost() {
        $user = new User();
        $post = new Post();

        $this->assertEmpty($user->getPosts());

        $user->addPost(($post));
        $this->assertContains($post, $user->getPosts());

        $user->removePost(($post));
        $this->assertEmpty($user->getPosts());
    }
}
