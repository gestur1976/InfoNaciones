<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CountryInfoService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getByFieldName(string $fieldName, string $value): ?array
    {
        $response = $this->client->request(
            'GET',
            "https://restcountries.com/v3.1/{$fieldName}/{$value}"
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $data = $response->toArray();

        return empty($data) ? null : $data;
    }
}