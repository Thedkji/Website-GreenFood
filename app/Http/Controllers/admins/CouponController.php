<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::with(['categories', 'products', 'users'])->paginate(5);
        return view('admins.coupons.list-coupon', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addCoupon()
    {
        $categories = Category::all();
        $products = Product::all();
        $users = User::all();
        return view('admins.coupons.add-coupon', compact('categories', 'products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coupon_amount' => 'required|numeric',
            'minimum_spend' => 'required|numeric',
            'maximum_spend' => 'required|numeric',
            'quantity' => 'required|integer',
            'start_date' => 'required|date',
            'expiration_date' => 'required|date',
            'type' => 'required|in:0,1',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'coupon_category' => 'required|exists:categories,id',
            'coupon_product' => 'required|exists:products,id',
            'coupon_user' => 'required|exists:users,id',
        ]);

        $coupon = Coupon::create([
            'name' => $request->name,
            'coupon_amount' => $request->coupon_amount,
            'minimum_spend' => $request->minimum_spend,
            'maximum_spend' => $request->maximum_spend,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'expiration_date' => $request->expiration_date,
            'type' => $request->type,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        $coupon->categories()->attach($request->coupon_category);
        $coupon->products()->attach($request->coupon_product);
        $coupon->users()->attach($request->coupon_user);

        return redirect()->route('admin.coupons.showCoupon')->with('success', 'Thêm mã giảm giá thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCoupon(string $id)
    {
        $coupon = Coupon::with(['categories', 'products', 'users'])->findOrFail($id);
        $categories = Category::all();
        $products = Product::all();
        $users = User::all();
        return view('admins.coupons.edit-coupon', compact('coupon', 'categories', 'products', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'coupon_amount' => 'required|numeric',
            'minimum_spend' => 'required|numeric',
            'maximum_spend' => 'required|numeric',
            'quantity' => 'required|integer',
            'start_date' => 'required|date',
            'expiration_date' => 'required|date',
            'type' => 'required|in:0,1',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'coupon_category' => 'required|exists:categories,id',
            'coupon_product' => 'required|exists:products,id',
            'coupon_user' => 'required|exists:users,id',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->update([
            'name' => $request->name,
            'coupon_amount' => $request->coupon_amount,
            'minimum_spend' => $request->minimum_spend,
            'maximum_spend' => $request->maximum_spend,
            'quantity' => $request->quantity,
            'start_date' => Carbon::parse($request->start_date), // Cập nhật đúng tại đây
            'expiration_date' => Carbon::parse($request->expiration_date), // Cập nhật đúng tại đây
            'type' => $request->type,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        $coupon->categories()->sync([$request->coupon_category]);
        $coupon->products()->sync([$request->coupon_product]);
        $coupon->users()->sync([$request->coupon_user]);

        return redirect()->route('admin.coupons.showCoupon')->with('success', 'Cập nhật mã giảm giá thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->categories()->detach();
        $coupon->products()->detach();
        $coupon->users()->detach();
        $coupon->delete();

        return redirect()->route('admin.coupons.showCoupon')->with('success', 'Xóa mã giảm giá thành công!');
    }
}
