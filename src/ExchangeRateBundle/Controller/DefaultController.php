<?php

namespace ExchangeRateBundle\Controller;

use ExchangeRateBundle\Repository\RateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package ExchangeRateBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @var RateRepository
     */
    private $repository;

    /**
     * DefaultController constructor.
     * @param RateRepository $repository
     */
    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $rate = $this->repository->getMinimum();
        return $this->render('@ExchangeRate/Default/index.html.twig', compact('rate'));
    }
}
