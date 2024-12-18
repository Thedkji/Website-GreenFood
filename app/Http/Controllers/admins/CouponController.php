<?php

namespace App\Http\Controllers\admins;

use App\Http\Requests\admins\CouponRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $coupons = Coupon::with(['categories', 'products'])
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->paginate(7);
        } else {
            $coupons = Coupon::with(['categories', 'products'])
                ->orderBy('id', 'desc') 
                ->paginate(7);
        }
    
        return view('admins.coupons.list-coupon', compact('coupons'));
    }
    

    public function addCoupon()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $products = Product::all();
        return view('admins.coupons.add-coupon', compact('categories', 'products'));
    }

    public function store(CouponRequest $request)
    {
        // Kiểm tra nếu mã giảm giá đã tồn tại
        $existingCoupon = Coupon::where('name', $request->name)->first();
        if ($existingCoupon) {
            return back()->withErrors(['name' => 'Mã giảm giá đã tồn tại trên hệ thống.'])->withInput();
        }
    
        $coupon = Coupon::create([
            'name' => $request->name,
            'discount_type' => $request->discount_type,
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
    
        $categories_id = array_merge($request->category ?? [], $request->child_category ?? []);
        $coupon->categories()->attach($categories_id);
        $coupon->products()->attach($request->coupon_product);
    
        return back()->with('success', 'Thêm mới mã giảm giá thành công.');
    }
    



    public function editCoupon(string $id)
    {
        $coupon = Coupon::with(['categories', 'products'])->findOrFail($id);
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $products = Product::all();
        return view('admins.coupons.edit-coupon', compact('coupon', 'categories', 'products'));
    }

    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->fill([
            'name' => $request->name,
            'discount_type' => $request->discount_type,
            'coupon_amount' => $request->coupon_amount,
            'minimum_spend' => $request->minimum_spend,
            'maximum_spend' => $request->maximum_spend,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'expiration_date' => $request->expiration_date,
            'type' => $request->type,
            'status' => $request->status,
            'description' => $request->description,
        ])->save();

        if ($request->has('category')) {
            $coupon->categories()->sync($request->category);
        } else {
            $coupon->categories()->detach();
        }
        if ($request->has('child_category')) {
            // Lấy danh sách id của các danh mục con
            $childCategoryIds = Category::whereIn('id', $request->child_category)
                ->whereNotNull('parent_id') // Đảm bảo chỉ lấy danh mục con
                ->pluck('id')
                ->toArray();

            $coupon->categories()->syncWithoutDetaching($childCategoryIds); // Đồng bộ danh mục con mà không xóa các danh mục cha
        }
        if ($request->has('coupon_product')) {
            $coupon->products()->sync($request->coupon_product);
        } else {
            $coupon->products()->detach();
        }

        return back()->with('success', 'Cập nhật mã giảm giá thành công.');
    }


    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->categories()->detach();
        foreach ($coupon->categories as $category) {
            if ($category->children()->count() > 0) {
                $category->children()->detach();
            }
        }
        $coupon->products()->detach();
        $coupon->delete();
        return redirect()->route('admin.coupons.showCoupon')->with('success', 'Xóa mã giảm giá thành công!');
    }


    public function show(string $id)
    {
        $coupon = Coupon::with(['categories.children', 'products'])->findOrFail($id);
        return view('admins.coupons.detail-coupon', compact('coupon'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids'); // Lấy danh sách ID từ request

        if (!is_array($ids) || empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Không có lựa chọn nào được chọn.'
            ], 400);
        }

        // Xóa các bình luận dựa trên danh sách ID
        Coupon::whereIn('id', $ids)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa các mã giảm giá được chọn thành công.'
        ]);
    }
}
