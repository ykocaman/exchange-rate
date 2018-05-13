<?php


namespace Tests\ExchangeRateBundle\Service;


use ExchangeRateBundle\Service\RateProvider;
use ExchangeRateBundle\Utils\HttpClient\GuzzleAdapter;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RateProviderTest extends KernelTestCase
{
    private $container;

    public function setUp()
    {
        self::bootKernel();
        $this->container = self::$kernel->getContainer();
    }

    public function testInstance()
    {
        $provider = new RateProvider($this->container, new GuzzleAdapter());
        $provider->load('first.url');

        $this->assertInstanceOf(RateProvider::class, $provider);
    }
}