<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactFunctionalTest extends WebTestCase
{
    public function testContact(): void
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/contact');

        $this->assertResponseIsSuccessful();
    }
}
