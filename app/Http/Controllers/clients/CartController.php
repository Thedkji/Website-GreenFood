<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function cart()
    {
        return view("clients.carts.cart");
    }
    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id_product,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,

        ]);
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
    }
    public function deleteCart()
    {
        Cart::clear();
        return redirect()->route('client.home');
    }
}
