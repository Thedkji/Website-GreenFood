<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $datas = $request->selectBox;
        $decodedItems = array_map(function ($itemJson) {
            return json_decode($itemJson, true);
        }, $datas);
        $totalPrice = array_reduce($decodedItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        return view("clients.checkouts.checkout", compact('decodedItems', 'totalPrice'));
    }

    public function getCheckOut(Request $request) {}
}
