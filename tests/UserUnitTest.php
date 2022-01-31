<?php

namespace App\Tests;

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
             ->setTelephone('telephone')
             ->setAPropos('a propos');

        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getTelephone() === 'telephone');
        $this->assertTrue($user->getAPropos() === 'a propos');
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setNom('nom')
             ->setPrenom('prenom')
             ->setEmail('true@test.com')
             ->setPassword('password')
             ->setTelephone('telephone')
             ->setAPropos('a propos');

        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getTelephone() === 'false');
        $this->assertFalse($user->getAPropos() === 'a false');
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getAPropos());
    }
}
