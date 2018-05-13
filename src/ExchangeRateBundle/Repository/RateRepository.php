<?php

namespace ExchangeRateBundle\Repository;

/**
 * Class RateRepository
 * @package ExchangeRateBundle\Repository
 */
class RateRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * "rate" tablosu içerisinden her kolon için en düşün değeri alır ve bir satır olarak döner
     *
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getMinimum()
    {
        return $this->createQueryBuilder('u')
            ->select('e.id, MIN(e.usdtry) as usdtry,MIN(e.eurtry) as eurtry,' .
                'MIN(e.gbptry) as gbptry,MAX(e.updatedAt) as updatedAt')
            ->from('ExchangeRateBundle:Rate', 'e')
            ->getQuery()
            ->getSingleResult();
    }
}
