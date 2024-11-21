<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;

use App\Services\GHNService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getDistricts(Request $request)
    {
        $provinceId = $request->input('province_id');
        $districts = app(GHNService::class)->getDistricts($provinceId);
        return response()->json($districts);
    }

    public function getWards(Request $request)
    {
        $districtId = $request->input('district_id');
        $wards = app(GHNService::class)->getWards($districtId);
        return response()->json($wards);
    }
}
