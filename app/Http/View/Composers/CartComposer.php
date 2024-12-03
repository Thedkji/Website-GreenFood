<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as CartSession;
use App\Models\Cart;
use App\Models\Product;
use App\Models\VariantGroup;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    public function compose(View $view)
    {

        $userId = Auth::check() ? Auth::id() : null;
        $variantGroups = [];
        $cartItems = [];
        $lowStockVariants = [];
        if ($userId) {
            $cartItems = Cart::where('user_id', $userId)->with('product')->get();
            if ($cartItems) {
                foreach ($cartItems as $item) {
                    if ($item->product && $item->product->status == 1) {
                        $variantGroups[$item->sku] = VariantGroup::with('variants')
                            ->where('product_id', $item->product->id)
                            ->where('sku', $item->sku)
                            ->get();
                        $variant = $variantGroups[$item->sku]->first();
                        if ($variant && $variant->quantity < $item->quantity) {
                            $lowStockVariants[] = [
                                'sku' => $item->sku,
                                'name' => $item->product->name,
                                'stock' => $variant->quantity,
                            ];
                        }
                    } elseif ($item->product && $item->product->status == 0) {
                        if ($item->product->quantity < $item->quantity) {
                            $lowStockVariants[] = [
                                'sku' => $item->sku,
                                'name' => $item->product->name,
                                'stock' => $item->product->quantity,
                            ];
                        }
                    }
                }
            }
        } else {
            $cartItems = CartSession::getContent();
            foreach ($cartItems as $item) {
                if ($item->attributes->status == 1) {
                    $variantGroups[$item->attributes->sku] = VariantGroup::with('variants')
                        ->where('product_id', $item->id)
                        ->where('sku', $item->attributes->sku)
                        ->get();
                    $variant = $variantGroups[$item->attributes->sku]->first();
                    if ($variant && $variant->quantity < $item->quantity) {
                        $lowStockVariants[] = [
                            'sku' => $item->attributes->sku,
                            'name' => $item->name,
                            'stock' => $variant->quantity,
                        ];
                    }
                } elseif ($item->attributes->status == 0) {
                    $product = Product::find($item->id);
                    if ($product && $product->quantity < $item->quantity) {
                        $lowStockVariants[] = [
                            'sku' => $item->attributes->sku,
                            'name' => $item->name,
                            'stock' => $product->quantity,
                        ];
                    }
                }
            }
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
        $view->with(compact('cartItems', 'cartTotal', 'cartQuantity', 'variantGroups', 'userId', 'lowStockVariants'));
    }
}
