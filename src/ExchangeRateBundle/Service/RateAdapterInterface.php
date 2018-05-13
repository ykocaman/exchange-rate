<?php

namespace ExchangeRateBundle\Service;

/**
 * Interface RateAdapterInterface
 * @package ExchangeRateBundle\Service
 */
interface RateAdapterInterface
{
    /**
     * @return mixed
     */
    public function getSource();

    /**
     * @return mixed
     */
    public function getUsdtry();

    /**
     * @return mixed
     */
    public function getEurtry();

    /**
     * @return mixed
     */
    public function getGbptry();

    /**
     * @return mixed
     */
    public function getUpdatedAt();
}