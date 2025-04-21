<?php

namespace SmtpExpress;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use SmtpExpress\Exception\SmtpExpressException;

class HttpClient
{
    protected Client $client;
    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://api.smtpexpress.com/',
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     * @throws SmtpExpressException
     */
    public function post(string $uri, array $data): array
    {
        try {
            $response = $this->client->post($uri, ['json' => $data]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            throw new SmtpExpressException('Request failed: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
}