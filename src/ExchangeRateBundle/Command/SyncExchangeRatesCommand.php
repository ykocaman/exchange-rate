<?php

namespace ExchangeRateBundle\Command;

use ExchangeRateBundle\Utils\Facade\RateFactory;
use ExchangeRateBundle\Service\FirstAdapter;
use ExchangeRateBundle\Service\RateProvider;
use ExchangeRateBundle\Service\SecondAdapter;
use ExchangeRateBundle\Entity\Rate;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncExchangeRatesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('sync:exchange-rates')
            ->setDescription('Döviz kurlarını servislerden çeker ve veritabanına yazar.');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $doctrine = $this->getContainer()->get('doctrine');
        $repository = $doctrine->getRepository(Rate::class);

        $provider = $this->getContainer()->get(RateProvider::class);

        $updateOrInsert = function ($adapterClass) use ($provider, $repository, $doctrine) {
            $adapter = new $adapterClass($provider);
            $rate = RateFactory::create($adapter);

            $current = $repository->findOneBy(['source' => $rate->getSource()]);

            if (is_null($current) == false) {
                $rate->setId($current->getId());
            }

            $doctrine->getEntityManager()->merge($rate);
        };

        $updateOrInsert(FirstAdapter::class);
        $updateOrInsert(SecondAdapter::class);

        $doctrine->getEntityManager()->flush();

    }

}

