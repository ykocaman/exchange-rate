<?php

namespace ExchangeRateBundle\Utils\Enums;

/**
 * Class RateSource
 * Her Provider için bir numara tanımlanmaktadır.
 * @package ExchangeRateBundle\Utils\Enums
 */
abstract class RateSource
{
    const FIRST_PROVIDER = 1;
    const SECOND_PROVIDER = 2;
}