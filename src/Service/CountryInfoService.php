<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CountryInfoService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function findAll():?array
    {
        $response = $this->client->request(
            'GET',
            "https://restcountries.com/v3.1/all",
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $data = $response->toArray();

        if (empty($data)) {
            return null;
        }

        return $data;
    }

    public function findByName(string $countryName):?array
    {
        $response = $this->client->request(
            'GET',
            "https://restcountries.com/v3.1/country/{$countryName}",
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $data = $response->toArray();

        if (empty($data)) {
            return null;
        }

        return $data;
    }
}