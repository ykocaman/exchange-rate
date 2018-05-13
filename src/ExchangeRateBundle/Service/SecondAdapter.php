<?php


namespace ExchangeRateBundle\Service;

use ExchangeRateBundle\Utils\Enums\RateSource;

/**
 * Class SecondAdapter
 * @package ExchangeRateBundle\Service
 */
class SecondAdapter implements RateAdapterInterface
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
     * SecondAdapter constructor.
     * @param RateProvider $provider
     */
    public function __construct(RateProvider $provider)
    {
        $rate = $provider->load('second.url');

        $this->usdtry = $this->find($rate, 'DOLAR');
        $this->eurtry = $this->find($rate, 'AVRO');
        $this->gbptry = $this->find($rate, 'İNGİLİZ STERLİNİ');

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
            if ($rate->kod == $symbol) {
                return $rate->oran;
            }
        }
    }

    /**
     * @return int|mixed
     */
    public function getSource()
    {
        return RateSource::SECOND_PROVIDER;
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