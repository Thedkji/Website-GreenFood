<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TrashController extends Controller
{
    public function index()
    {
        $users = User::onlyTrashed()->paginate(5);
        $products = Product::onlyTrashed()->paginate(5);
        $variants = Variant::onlyTrashed()->paginate(5);
        $orders = Order::onlyTrashed()->paginate(5);
        $categories = Category::onlyTrashed()->paginate(5);
        $comments = Comment::onlyTrashed()->paginate(5);
        $suppliers = Supplier::onlyTrashed()->paginate(5);
        return view('admins.trashs.list-trash', compact('users', 'products', 'variants', 'orders', 'categories', 'comments', 'suppliers'));
    }


    public function restore($id){
        try {
            $user = User::withTrashed()->findOrFail($id);

            $user->restore();

            DB::commit();
            return redirect()->back()->with('success', 'Tài khoản đã được khôi phục thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục tài khoản: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        // DB::beginTransaction();

        try {
            // Lấy thông tin người dùng cần xóa
            $user = User::withTrashed()->findOrFail($id);

            // Xóa ảnh đại diện nếu có
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Xóa người dùng vĩnh viễn khỏi cơ sở dữ liệu
            $user->forceDelete();

            DB::commit();
            return redirect()->back()->with('success', 'Tài khoản đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa tài khoản: ' . $e->getMessage());
        }
    }
}
