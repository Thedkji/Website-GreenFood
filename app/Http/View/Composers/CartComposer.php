<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartComposer
{
    public function compose(View $view)
    {
        $cartItems = Cart::getContent();
        $cartTotal = Cart::getSubTotal();
        $cartQuantity = Cart::getTotalQuantity();

        // Chia sẻ dữ liệu giỏ hàng với view
        $view->with(compact('cartItems', 'cartTotal', 'cartQuantity'));
    }
}
