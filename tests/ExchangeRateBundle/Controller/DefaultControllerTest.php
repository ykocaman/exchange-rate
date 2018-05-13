<?php

namespace ExchangeRateBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('USD', $client->getResponse()->getContent());
        $this->assertContains('EURO', $client->getResponse()->getContent());
        $this->assertContains('GBP', $client->getResponse()->getContent());
    }
}
