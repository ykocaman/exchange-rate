<?php


namespace ExchangeRateBundle\Utils\Facade;

use ExchangeRateBundle\Entity\Rate;
use ExchangeRateBundle\Service\RateAdapterInterface;

/**
 * Class RateFactory
 * @package ExchangeRateBundle\Utils\Facade
 */
class RateFactory
{
    /**
     * RateAdapter nesnesinin Rate instance'ı olarak oluşturulması
     * @param RateAdapterInterface $adapter
     * @return Rate
     */
    public static function create(RateAdapterInterface $adapter): Rate
    {
        $rate = new Rate();
        $rate->setSource($adapter->getSource());
        $rate->setUsdtry($adapter->getUsdtry());
        $rate->setEurtry($adapter->getEurtry());
        $rate->setGbptry($adapter->getGbptry());
        $rate->setUpdatedAt($adapter->getUpdatedAt());
        return $rate;
    }
}