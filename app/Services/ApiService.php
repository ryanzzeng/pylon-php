<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiService
{
    const API_URL = 'https://ghibliapi.herokuapp.com';

    /** @var Client */
    public Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get films from api
     * @return array
     */
    public function getFilms(): array
    {
        try {
            $response = $this->client->get(self::API_URL . '/films');
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    /**
     * Get people from api
     * @return array
     */
    public function getPeople(): array
    {
        try {
            $response = $this->client->get(self::API_URL . '/people');
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }
}