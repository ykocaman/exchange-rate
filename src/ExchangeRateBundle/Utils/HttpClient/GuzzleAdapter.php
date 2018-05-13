<?php

namespace ExchangeRateBundle\Utils\HttpClient;

use GuzzleHttp\Client;

/**
 * Class GuzzleAdapter
 *  Guzzle istemcisi için wrapper
 * @package ExchangeRateBundle\Utils\HttpClient
 */
class GuzzleAdapter implements ClientInterface
{
    /**
     * @var Client HTTP istemci
     */
    private $client;
    /**
     * @var İstek sonucu
     */
    private $response;
    /**
     * @var URL
     */
    private $url;
    /**
     * @var URL sabit başlangıcı
     */
    private $baseUrl;
    /**
     * @var string HTTP metodu
     */
    private $method = 'GET';

    /**
     * GuzzleAdapter constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $url
     * @return string
     */
    public function request(string $url = ''): string
    {
        $this->setUrl($url);

        $response = $this->client->request($this->method, $this->getUrl());
        if ($response->getStatusCode() == 200) {
            $this->response = (string)$response->getBody();
        }

        return $this->response;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return $this->response;
    }

    /**
     * @param $url
     * @return ClientInterface
     */
    public function setUrl($url): ClientInterface
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->baseUrl ? $this->baseUrl . '/' . $this->url : $this->url;
    }

    /**
     * @param string $baseUrl
     * @return ClientInterface
     */
    public function setBaseUrl(string $baseUrl): ClientInterface
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param string $method
     * @return ClientInterface
     */
    public function setMethod(string $method): ClientInterface
    {
        $this->method = $method;

        return $this;
    }
}