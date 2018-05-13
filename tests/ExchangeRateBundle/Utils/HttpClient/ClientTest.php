<?php


namespace Tests\ExchangeRateBundle\Utils\HttpClient;


use ExchangeRateBundle\Utils\HttpClient\ClientInterface;
use ExchangeRateBundle\Utils\HttpClient\GuzzleAdapter;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new GuzzleAdapter();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(ClientInterface::class, $this->client);
    }

    public function testUrl()
    {
        $this->client->setBaseUrl('http://test.com');
        $this->client->setUrl('test');

        $this->assertEquals('http://test.com/test', $this->client->getUrl());
    }


}