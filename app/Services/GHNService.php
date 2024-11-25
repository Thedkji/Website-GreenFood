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
    public function getDistricts($provinceId)
    {
        $response = Http::withHeaders([
            'Token' => $this->apiKey,
        ])->post("https://online-gateway.ghn.vn/shiip/public-api/master-data/district", [
            'province_id' => $provinceId,
        ]);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return [];
    }

    // Lấy danh sách phường/xã theo ID quận/huyện
    public function getWards($districtId)
    {
        $response = Http::withHeaders([
            'Token' => $this->apiKey,
        ])->post("https://online-gateway.ghn.vn/shiip/public-api/master-data/ward", [
            'district_id' => $districtId,
        ]);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return [];
    }
}
