<?php

namespace App\Tests;

use App\Entity\Contact;
use DateTime;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contact = new Contact();
        $datetime = new DateTime();

        $contact->setNom('nom')
                ->setEmail('test@test.com')
                ->setMessage('message')
                ->setCreatedAt($datetime)
                ->setIsSend(true);

        $this->assertTrue($contact->getNom() === 'nom');
        $this->assertTrue($contact->getEmail() === 'test@test.com');
        $this->assertTrue($contact->getMessage() === 'message');
        $this->assertTrue($contact->getCreatedAt() === $datetime);
        $this->assertTrue($contact->getIsSend() === true);
    }

    public function testIsFalse(): void
    {
        $contact = new Contact();
        $datetime = new DateTime();

        $contact->setNom('nom')
                ->setEmail('test@test.com')
                ->setMessage('message')
                ->setCreatedAt($datetime)
                ->setIsSend(true);

        $this->assertFalse($contact->getNom() === 'false');
        $this->assertFalse($contact->getEmail() === 'false@test.com');
        $this->assertFalse($contact->getMessage() === 'false');
        $this->assertFalse($contact->getCreatedAt() === new DateTime());
        $this->assertFalse($contact->getIsSend() === 'false');
    }

    public function testIsEmpty(): void
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getCreatedAt());
        $this->assertEmpty($contact->getIsSend());
        $this->assertEmpty($contact->getId());
    }
}
