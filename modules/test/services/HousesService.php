<?php

namespace modules\test\services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HousesService
{
    /**
     * @throws Exception
     */
    public function getHouses()
    {
        $client = new Client(['base_uri' => 'https://wizard-world-api.herokuapp.com']);

        try {
            $res = $client->request('GET', 'Houses');
        } catch (GuzzleException $e) {
            throw new Exception('Problem with fetching data from api');
        }

        if($res->getStatusCode() != 200) {
            throw new Exception('Status code not valid');
        }

        return json_decode($res->getBody()->getContents(), true) ?? [];
    }
}