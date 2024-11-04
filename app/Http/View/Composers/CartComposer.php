<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as CartSession;
use App\Models\Cart;
use App\Models\VariantGroup;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    public function compose(View $view)
    {
        $userId = Auth::check() ? Auth::id() : null;
        $variantGroups = [];

        if ($userId) {
            $cartItems = Cart::where('user_id', $userId)->with('product')->get();
            foreach ($cartItems as $item) {
                if ($item->product->status == 1) {
                    $variantGroups[$item->sku] = VariantGroup::where('product_id', $item->product->id)->where('sku', $item->sku)->get();
                }
            }
        } else {
            $cartItems = CartSession::getContent();
        }
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $cartQuantity = $cartItems->sum('quantity');
        $view->with(compact('cartItems', 'cartTotal', 'cartQuantity', 'variantGroups', 'userId'));
    }
}
