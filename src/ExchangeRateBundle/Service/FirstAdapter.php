<?php


namespace ExchangeRateBundle\Service;

use ExchangeRateBundle\Entity\Rate;
use ExchangeRateBundle\Utils\Enums\RateSource;

/**
 * Class FirstAdapter
 * @package ExchangeRateBundle\Service
 */
class FirstAdapter implements RateAdapterInterface
{
    /**
     * @var USD kuru
     */
    private $usdtry;
    /**
     * @var EURO kuru
     */
    private $eurtry;
    /**
     * @var GBP kuru
     */
    private $gbptry;
    /**
     * @var \DateTime Güncellenme zamanı
     */
    private $updatedAt;

    /**
     * FirstAdapter constructor.
     * @param RateProvider $provider
     */
    public function __construct(RateProvider $provider)
    {
        $rate = $provider->load('first.url');
        $result = $rate->result;

        $this->usdtry = $this->find($result, 'USDTRY');
        $this->eurtry = $this->find($result, 'EURTRY');
        $this->gbptry = $this->find($result, 'GBPTRY');

        $this->updatedAt = new \DateTime();
    }

    /**
     * @param $list
     * @param $symbol
     * @return mixed
     */
    private function find($list, $symbol)
    {
        foreach ($list as $rate) {
            if ($rate->symbol == $symbol) {
                return $rate->amount;
            }
        }
    }

    /**
     * @return int|mixed
     */
    public function getSource()
    {
        return RateSource::FIRST_PROVIDER;
    }

    /**
     * @return mixed
     */
    public function getUsdtry()
    {
        return $this->usdtry;
    }

    /**
     * @return mixed
     */
    public function getEurtry()
    {
        return $this->eurtry;
    }

    /**
     * @return mixed
     */
    public function getGbptry()
    {
        return $this->gbptry;
    }

    /**
     * @return \DateTime|mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

}