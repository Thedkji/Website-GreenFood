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
    // Hàm này dùng để thêm cart nhanh ở trang chính
    public function addToCart(Request $request)
    {
        $cartItems = CartSession::getContent();
        $existingItem = $cartItems->firstWhere(function ($item) use ($request) {
            return $item->id === $request->id_product && $item->attributes->sku === $request->sku;
        });
        if ($existingItem) {
            CartSession::update($existingItem->id, [
                'quantity' => $existingItem->quantity + 1,
            ]);
        } else {
            CartSession::add([
                'id' => $request->id_product,
                'name' => $request->name,
                'price' => $request->input('price'),
                'quantity' => 1,
                'attributes' => [
                    'added_order' => $cartItems->count() + 1,
                    'sku' => $request->sku,
                ],
            ]);
        }
        if (auth()->check()) {
            $this->saveCartData(auth()->id());
        }
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    // Hàm lưu dữ liệu giỏ hàng vào cơ sở dữ liệu
    private function saveCartData($user_id)
    {
        $cartData = CartSession::getContent();
        foreach ($cartData as $item) {
            Cart::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'product_id' => $item->id,
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
    public function updateCart($id, Request $request)
    {
        $quantity = (int) $request->input('quantity');
        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Số lượng phải lớn hơn 0');
        }
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
                ->where('attributes->sku', CartSession::get($id)->attributes->sku)
                ->first();

            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function removeCart($id)
    {
        $delete = CartSession::remove($id);
        if (auth()->check()) {
            $userId = auth()->id();
            Cart::where('user_id', $userId)->where('product_id', $id)->delete();
        }
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
