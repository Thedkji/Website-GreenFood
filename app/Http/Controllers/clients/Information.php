<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\PassRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use App\Models\VariantGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Information extends Controller
{

    public function index()
    {
        $user = auth()->user();
        // Lọc đơn hàng theo các trạng thái 0, 1, 2, 5
        $orders = Order::whereIn('status', [0, 1, 2])->with('user')->get();
        $oders = Order::whereIn('status', [3, 4, 5, 6])->with('user')->get();

        return view('clients.information.information', compact('user', 'orders', 'oders'));
    }


    public function editPass($id)
    {
        $user = User::findOrFail($id);
        return view('clients.information.pass', compact('user'));
    }

    public function updatePass(PassRequest $request, $id)
    {
        $user = $request->validated();
        $user = User::findOrFail($id);
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu cũ không chính xác']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('clients.information.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:10',
            'address' => 'nullable|max:255',
        ]);
        // dd($request->all());
        // Cập nhật thông tin người dùng
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        // Chuyển hướng với thông báo thành công
        // return redirect()->route('clients.information.index')->with('success', 'Thông tin đã được cập nhật!');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status == 0) {
            $order->status = 5;
            $order->save();
            return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công!');
        }

        return redirect()->back()->with('error', 'Không thể hủy đơn hàng này!');
    }


    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $orderDetails = OrderDetail::with('order')->where('order_id', $id)->get();

        return view('clients.information.order-detail', compact('order', 'orderDetails'));
    }

    public function store(Request $request)
    {

        $product_sku = OrderDetail::where('order_id', $request->order_id)->pluck('product_sku')->toArray();

        // Lấy sản phẩm từ bảng Product (sử dụng `id`)
        $productsFromProductTable = Product::whereIn('sku', $product_sku)
            ->get()
            ->map(function ($item) {
                $item->product_id = $item->id; // Thêm cột `product_id` cho đồng nhất
                return $item;
            });

        // Lấy sản phẩm từ bảng variant_groups (sử dụng `product_id`)
        $productsFromVariantGroups = VariantGroup::whereIn('sku', $product_sku)->get();

        // Hợp nhất kết quả
        $allProducts = $productsFromProductTable->concat($productsFromVariantGroups)
            ->unique('product_id') // Loại bỏ trùng lặp theo `product_id`
            ->pluck('product_id');

        foreach ($allProducts as $pro) {
            $commentsData = [];
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension(); // Thay đổi này để sử dụng getClientOriginalExtension()
                $commentsData['img'] = $img->storeAs('comments', $filename);
            }

            $commentsData['product_id'] = $pro;
            $commentsData['user_id'] = Auth::id();
            $commentsData['content'] = $request->comment;

            $comments = Comment::create($commentsData);

            Rate::create([
                'comment_id' => $comments->id,
                'star' => $request->star,
            ]);
        }




        return redirect()->back()->with('success', 'Đánh giá của bạn đã được lưu!');
    }
}
