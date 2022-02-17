<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PeintureFunctionalTest extends WebTestCase
{
    public function testShouldDisplayPeinture(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/peintures');

        $this->assertResponseIsSuccessful();
    }

    public function testShouldDisplayOnePeinture(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/peinture/show/peinture-test');

        $this->assertResponseIsSuccessful();
    }
}
