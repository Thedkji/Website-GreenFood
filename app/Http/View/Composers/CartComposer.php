<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as CartSession;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();
        } else {
            $cartItems = CartSession::getContent();
        }
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $cartQuantity = $cartItems->sum('quantity');
        $view->with(compact('cartItems', 'cartTotal', 'cartQuantity'));
    }
}
