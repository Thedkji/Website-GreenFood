<?php

namespace App\Http\Controllers\admins;

use App\Http\Requests\admins\CouponRequest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Lấy từ khóa tìm kiếm từ request
    $search = $request->input('search');

    if ($search) {
        $coupons = Coupon::with(['categories', 'products', 'users']) 
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%') 
            ->paginate(7); 
    } else {
        $coupons = Coupon::with(['categories', 'products', 'users'])->paginate(7);
    }

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
    public function store(CouponRequest $request)
    {
        $coupon = $request->validated();
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
    public function update(CouponRequest $request, $id)
    {



        // Tìm mã giảm giá theo ID
        $coupon = Coupon::findOrFail($id);
        // Cập nhật các trường dữ liệu
        $coupon->update($request->only([
            'name',
            'coupon_amount',
            'minimum_spend',
            'maximum_spend',
            'quantity',
            'start_date',
            'expiration_date',
            'type',
            'status',
            'description',
        ]));

        // Cập nhật mối quan hệ
        $coupon->categories()->sync($request->coupon_category);
        $coupon->products()->sync($request->coupon_product);
        $coupon->users()->sync($request->coupon_user);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.coupons.showCoupon')->with('success', 'Cập nhật mã giảm giá thành công.');
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::with(['categories', 'products', 'users'])->findOrFail($id);
        return view('admins.coupons.detail-coupon', compact('coupon'));
    }
}
