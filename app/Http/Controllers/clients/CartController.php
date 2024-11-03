<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as CartSession;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function cart()
    {
        return view("clients.carts.cart");
    }

    public function addToCart(Request $request)
    {
        CartSession::add([
            'id' => $request->id_product,
            'name' => $request->name,
            'price' => $request->input('price'),
            'quantity' => 1,
            'attributes' => [
                'added_order' => CartSession::getContent()->count() + 1,
                'sku' => $request->sku,
                'status' => $request->status,
            ],
        ]);
        if (auth()->check()) {
            $this->saveCartData(auth()->id());
        }
        // $cartData = CartSession::getContent();
        // Log::info($cartData);
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    private function saveCartData($user_id)
    {
        $cartData = CartSession::getContent();
        foreach ($cartData as $item) {
            Cart::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'product_id' => $item->id,
                    'attributes->sku' => $item->attributes->sku, // Kiểm tra SKU
                ],
                [
                    'quantity' => $item->quantity,
                    'attributes' => json_encode($item->attributes),
                ]
            );
        }
    }

    public function deleteCart()
    {
        CartSession::clear();
        if (auth()->check()) {
            Cart::where('user_id', auth()->id())->delete();
        }
        return redirect()->route('client.home');
    }

    public function updateCart(Request $request)
    {
        $quantities = $request->input('quantities', []);
        foreach ($quantities as $id => $quantity) {
            $quantity = max(1, (int)$quantity);
            CartSession::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ],
            ]);
            if (auth()->check()) {
                $userId = auth()->id();
                $cartItem = Cart::where('user_id', $userId)
                    ->where('product_id', $id)
                    ->first();
                if ($cartItem) {
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function removeCart($id)
    {
        $delete = CartSession::remove($id);
        if (auth()->check()) {
            $userId = auth()->id();
            $sku = CartSession::get($id)->attributes->sku; // Lấy SKU từ giỏ hàng
            Cart::where('user_id', $userId)
                ->where('product_id', $id)
                ->where('attributes->sku', $sku) // Kiểm tra SKU
                ->delete();
        }

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
