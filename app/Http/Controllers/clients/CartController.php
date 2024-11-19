<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as CartSession;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Exception;

class CartController extends Controller
{
    public function cart()
    {
        return view("clients.carts.cart");
    }
    // Trang chủ
    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $sku = $request->sku;
        $quantity = $request->input('quantity', 1);

        if (auth()->check()) {
            $existingCartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->where('sku', $sku)
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $productId,
                    'sku' => $sku,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            $existingSessionItem = CartSession::get($productId);

            if ($existingSessionItem) {
                CartSession::update($productId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => $quantity,
                    ],
                ]);
            } else {
                CartSession::add([
                    'id' => $productId,
                    'name' => $request->name,
                    'price' => $request->input('price'),
                    'quantity' => $quantity,
                    'attributes' => [
                        'added_order' => CartSession::getContent()->count() + 1,
                        'sku' => $sku,
                        'img' => $request->img,
                        'status' => $request->status,
                    ],
                ]);
            }
        }
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    public function deleteCart()
    {
        CartSession::clear();

        if (auth()->check()) {
            Cart::where('user_id', auth()->id())->delete();
        }

        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function updateCart(Request $request)
    {
        $quantities = $request->input('quantities', []);
        $userId = auth()->check() ? auth()->id() : null;
        foreach ($quantities as $id => $quantity) {
            $quantity = max(0, (int)$quantity);
            if ($quantity === 0) {
                if ($userId) {
                    Cart::where('user_id', $userId)->where('id', $id)->delete();
                    CartSession::remove($id);
                } else {
                    CartSession::remove($id);
                }
            } else {
                if ($userId) {
                    $cartItem = Cart::where('user_id', $userId)->where('id', $id)->first();
                    if ($cartItem) {
                        $cartItem->quantity = $quantity;
                        $cartItem->save();
                    }
                } else {
                    CartSession::update($id, [
                        'quantity' => [
                            'relative' => false,
                            'value' => $quantity,
                        ],
                    ]);
                }
            }
        }
        session()->put('cart', CartSession::getContent()->toArray());
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function removeCart($id)
    {
        CartSession::remove($id);

        if (auth()->check()) {
            $userId = auth()->id();
            Cart::where('user_id', $userId)->where('id', $id)->delete();
        }

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
