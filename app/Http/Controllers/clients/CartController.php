<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function __construct()
    {
        // Chia sẻ dữ liệu giỏ hàng với tất cả các view
        $cartItems = Cart::getContent();
        $cartTotal = Cart::getSubTotal();
        $cartQuantity = Cart::getTotalQuantity();
        view()->share('cartItems', $cartItems);
        view()->share('cartTotal', $cartTotal);
        view()->share('cartQuantity', $cartQuantity);
    }
    public function cart()
    {
        $cartItems = Cart::getContent();
        return view("clients.carts.cart", compact('cartItems'));
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
    public function clearCart()
    {
        Cart::clear();
        return redirect()->route('client.home');
    }
    public function deleteCart()
    {
        Cart::clear();
        return redirect()->route('client.home');
    }
}
