<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostFunctionalTest extends WebTestCase
{
    public function testShouldDisplayPost(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/posts');

        $this->assertResponseIsSuccessful();
    }

    public function testShouldDisplayOnePost(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/post/show/post-test');

        $this->assertResponseIsSuccessful();
    }
}
