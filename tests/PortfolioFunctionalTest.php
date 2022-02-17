<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortfolioFunctionalTest extends WebTestCase
{
    public function testShouldDisplayPortfolio(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio');

        $this->assertResponseIsSuccessful();
    }

    public function testShouldDisplayOneCategorie(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio/categorie-test');

        $this->assertResponseIsSuccessful();
    }
}
