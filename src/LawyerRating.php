<?php

namespace App;

use Exception;
use GuzzleHttp\Client;

class LawyerRating
{
    public function __construct(private string $apiToken, private string $apiUrl)
    {
        //
    }

    public function getRating(string $review): array
    {
        try {
            $client = new Client();

            $response = $client->request('POST', $this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiToken,
                    'Content-Type' => 'application/json'
                ]
            ]);

            if($response->getStatusCode() !== 200) {
                throw new Exception('Failed to get rating!', $response->getStatusCode());
            }

            return [
                    'error' => false,
                    'result' => $response->getBody()
            ];
        } catch(Exception $e) {
            return [
                   'error' => false,
                   'message' => $e->getMessage()
            ];
        }
    }
}
