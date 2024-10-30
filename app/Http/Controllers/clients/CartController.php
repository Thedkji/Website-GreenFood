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
        $price = $request->input('price');
        CartSession::add([
            'id' => $request->id_product,
            'name' => $request->name,
            'price' => $price,
            'quantity' => 1,
            'attributes' => [
                'added_order' => CartSession::getContent()->count() + 1,
            ],

        ]);
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
    }
    private function saveCartData($user_id)
    {
        $cartData = CartSession::getContent()->toArray();
        Cart::updateOrCreate([
            'user_id' => $user_id,
            'product_id' => $cartData['id'],
            'quantity' => $cartData['quantity']
        ]);
    }
    public function deleteCart()
    {
        CartSession::clear();
        return redirect()->route('client.home');
    }

    public function updateCart($id, Request $request)
    {
        // Kiểm tra xem người dùng đã nhập số lượng hợp lệ chưa
        $quantity = (int) $request->input('quantity');

        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Số lượng phải lớn hơn 0');
        }

        // Cập nhật số lượng sản phẩm trong giỏ hàng
        CartSession::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $quantity
            ],
        ]);

        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function removeCart($id)
    {
        $delete = CartSession::remove($id);
        if ($delete) {
            return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa sản phẩm thất bại');
        }
    }
}
