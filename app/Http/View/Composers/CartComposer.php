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
        $cartItems = [];

        if ($userId) {
            $cartItems = Cart::where('user_id', $userId)->with('product')->paginate('7');
            if ($cartItems) {
                foreach ($cartItems as $item) {
                    if ($item->product && $item->product->status == 1) {
                        $variantGroups[$item->sku] = VariantGroup::where('product_id', $item->product->id)
                            ->where('sku', $item->sku)
                            ->get();
                    }
                }
            }
        } else {
            $cartItems = CartSession::getContent();
        }

        $cartTotal = $cartItems->sum(function ($item) use ($variantGroups) {
            if (isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty()) {
                $variant = $variantGroups[$item->sku]->first();
                return $variant->price_sale * $item->quantity;
            } else {
                return ($item->price ?? ($item->product ? $item->product->price_sale : 0)) * $item->quantity;
            }
        });

        $cartQuantity = $cartItems->sum('quantity');

        $view->with(compact('cartItems', 'cartTotal', 'cartQuantity', 'variantGroups', 'userId'));
    }
}
