<?php


namespace Tests\ExchangeRateBundle\Service;


use ExchangeRateBundle\Service\FirstAdapter;
use ExchangeRateBundle\Service\RateProvider;
use ExchangeRateBundle\Service\SecondAdapter;
use ExchangeRateBundle\Utils\Enums\RateSource;
use ExchangeRateBundle\Utils\HttpClient\GuzzleAdapter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SecondAdapterTest extends KernelTestCase
{
    private $container;
    private $provider;
    private $adapter;

    public function setUp()
    {
        self::bootKernel();
        $this->container = self::$kernel->getContainer();

        $this->provider = new RateProvider($this->container, new GuzzleAdapter());
        $this->adapter = new SecondAdapter($this->provider);
    }


    public function testProperties()
    {
        $this->assertEquals(RateSource::SECOND_PROVIDER, $this->adapter->getSource());
        $this->assertNotEmpty($this->adapter->getUsdtry());
        $this->assertNotEmpty($this->adapter->getEurtry());
        $this->assertNotEmpty($this->adapter->getGbptry());
        $this->assertInstanceOf(\DateTime::class, $this->adapter->getUpdatedAt());
    }
}