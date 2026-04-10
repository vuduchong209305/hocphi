<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class LogMailService
{
    protected string $apiKey;
    protected string $baseUrl = 'https://api.elasticemail.com/v2';

    public function __construct()
    {
        $this->apiKey = config('services.elastic_email.api_key');
    }
    
    /**
     * Gọi API chung
     */
    protected function request(string $endpoint, array $params = [])
    {
        $params['apikey'] = $this->apiKey;

        $response = Http::get($this->baseUrl . $endpoint, $params);

        if ($response->failed()) {
            throw new \Exception('ElasticEmail API error: ' . $response->body());
        }

        return $response->json();
    }

    /**
     * Lấy log email
     */
    public function getLogs(array $params = [])
    {
        return $this->request('/log/load', $params);
    }

    /**
     * Lấy log email
     */
    public function getDetailLogs(array $params = [])
    {
        return $this->request('/email/view', $params);
    }

    /**
     * Lấy link tracking
     */
    public function getLinkTracking(array $params = [])
    {
        return $this->request('/log/linktracking', $params);
    }
}