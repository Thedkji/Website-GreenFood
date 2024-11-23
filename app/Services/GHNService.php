<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GHNService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GHN_KEY');
    }

    public function getProvinces()
    {
        $response = Http::withHeaders([
            'Token' => $this->apiKey,
        ])->get("https://online-gateway.ghn.vn/shiip/public-api/master-data/province");

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return [];
    }
}
