<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as CartSession;

class CartComposer
{
    public function compose(View $view)
    {
        $cartItems = CartSession::getContent()->sortBy('attributes.added_order');
        $cartTotal = CartSession::getSubTotal();
        $cartQuantity = CartSession::getTotalQuantity();
        $view->with(compact('cartItems', 'cartTotal', 'cartQuantity'));
    }
}
