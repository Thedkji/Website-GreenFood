<?php

use App\Models\Product;
use App\Models\User;
use App\Notifications\StatusOrderNotification;
use Illuminate\Support\Facades\Notification;

if (!function_exists('checkAllProductQuantities')) {
    function checkAllProductQuantities()
    {
        $products = Product::all();
        $messages = [];

        foreach ($products as $product) {
            if ($product->status == 0) {
                if ($product->quantity <= 5) {
                    if (auth()->check() && auth()->user()->role == 0) {
                        $messages[] = "Sản phẩm {$product->name} mã {$product->sku} sắp hết còn lại {$product->quantity} sản phẩm";
                    }
                }
            } else {
                foreach ($product->variantGroups as $variant) {
                    if ($variant->quantity <= 5) {
                        if (auth()->check() && auth()->user()->role == 0) {
                            $messages[] = "Sản phẩm {$product->name} mã {$variant->sku} sắp hết còn lại {$variant->quantity} sản phẩm";
                        }
                    }
                }
            }
        }
        if (!empty($messages)) {
            session(['statusProducts' => $messages]);
        }
    }
}
