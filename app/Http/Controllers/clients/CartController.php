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
            $uniqueId = $productId . '-' . $sku;
            $existingItem = CartSession::get($uniqueId);
            if ($existingItem) {
                // Nếu đã tồn tại, cập nhật số lượng
                CartSession::update($uniqueId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => $quantity,
                    ],
                ]);
            } else {
                // Nếu chưa tồn tại, thêm sản phẩm vào giỏ
                CartSession::add([
                    'id' => $uniqueId,
                    'name' => $request->name,
                    'price' => $request->input('price'),
                    'quantity' => $quantity,
                    'attributes' => [
                        'added_order' => CartSession::getContent()->count() + 1,
                        'product_id' => $productId,
                        'sku' => $sku,
                        'img' => $request->img,
                        'status' => $request->status,
                    ],
                ]);
            }
        }
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    public function deleteCart(Request $request)
    {
        $items = $request->selectBox;
        $decodedItems = collect($items)->map(function ($item) {
            return json_decode($item);  // Giải mã JSON
        });
        $item_id = $decodedItems->pluck('id');
        if ($item_id) {
            foreach ($item_id as $id) {
                auth()->check() ? Cart::where('user_id', auth()->id())->where('id', $id)->delete() : CartSession::remove($id);
            }
        }

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $item_id = $request->item_id;
        $userId = auth()->check() ? auth()->id() : null;
        if ($quantity === 0) {
            if ($userId) {
                Cart::where('user_id', $userId)->where('id', $item_id)->delete();
            } else {
                CartSession::remove($item_id);
            }
        } else {
            $userId ? Cart::where('user_id', $userId)->where('id', $item_id)->update(['quantity' => $quantity]) : CartSession::update($item_id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity,
                ],
            ]);
        }
        return redirect()->back()->with('success', 'Cập nhật số lượng thành công');
    }


    public function removeCart($id)
    {
        if (auth()->check()) {
            $userId = auth()->id();
            Cart::where('user_id', $userId)->where('id', $id)->delete();
        } else {
            CartSession::remove($id);
        }

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
