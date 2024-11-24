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
        // $variants = Variant::onlyTrashed()->paginate(5);
        $orders = Order::onlyTrashed()->paginate(5);
        // $categories = Category::onlyTrashed()->paginate(5);
        $comments = Comment::onlyTrashed()->paginate(5);
        $suppliers = Supplier::onlyTrashed()->paginate(5);
        return view('admins.trashs.list-trash', compact('users', 'products', 'orders', 'comments', 'suppliers'));
    }


    public function restoreUser($id)
    {
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
    public function restoreProduct($id)
    {
        try {
            $products = Product::withTrashed()->findOrFail($id);

            $products->restore();

            DB::commit();
            return redirect()->back()->with('success', 'Sản phẩm đã được khôi phục thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục sản phẩm: ' . $e->getMessage());
        }
    }
    public function restoreVariant($id)
    {
        try {
            $variants = Variant::withTrashed()->findOrFail($id);


            $variants->restore();

            DB::commit();
            return redirect()->back()->with('success', 'Biến thể đã được khôi phục thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục biến thể: ' . $e->getMessage());
        }
    }
    public function restoreOrder($id)
    {
        try {
            $orders = Order::withTrashed()->findOrFail($id);


            $orders->restore();

            DB::commit();
            return redirect()->back()->with('success', 'Đơn hàng đã được khôi phục thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục đơn hàng: ' . $e->getMessage());
        }
    }
    // public function restoreCategory($id)
    // {
    //     try {
    //         $categories = Category::withTrashed()->findOrFail($id);


    //         $categories->restore();

    //         DB::commit();
    //         return redirect()->back()->with('success', 'Danh mục đã được khôi phục thành công.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục danh mục: ' . $e->getMessage());
    //     }
    // }
    public function restoreComment($id)
    {
        try {
            $comments = Comment::withTrashed()->findOrFail($id);


            $comments->restore();

            DB::commit();
            return redirect()->back()->with('success', 'Bình luận đã được khôi phục thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục bình luận: ' . $e->getMessage());
        }
    }
    public function restoreSupplier($id)
    {
        try {
            $suppliers = Supplier::withTrashed()->findOrFail($id);

            $suppliers->restore();

            DB::commit();
            return redirect()->back()->with('success', 'Nhà cung cấp đã được khôi phục thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục nhà cung cấp: ' . $e->getMessage());
        }
    }



    public function destroyUser($id)
    {
        // DB::beginTransaction();

        try {
            // Lấy thông tin người dùng cần xóa
            $users = User::withTrashed()->findOrFail($id);


            // Xóa ảnh đại diện nếu có
            if ($users->avatar) {
                Storage::disk('public')->delete($users->avatar);
            }

            // Xóa người dùng vĩnh viễn khỏi cơ sở dữ liệu
            $users->forceDelete();

            DB::commit();
            return redirect()->back()->with('success', 'Tài khoản đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa tài khoản: ' . $e->getMessage());
        }
    }
    public function destroyProduct($id){
        try {
            // Lấy thông tin người dùng cần xóa
            $products = Product::withTrashed()->findOrFail($id);

            // Xóa ảnh đại diện nếu có
            if ($products->avatar) {
                Storage::disk('public')->delete($products->avatar);
            }

            // Xóa người dùng vĩnh viễn khỏi cơ sở dữ liệu
            $products->forceDelete();

            DB::commit();
            return redirect()->back()->with('success', 'Tài khoản đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa tài khoản: ' . $e->getMessage());
        }
    }
    public function destroyVariant($id)
    {
        try {

            $variants = Variant::withTrashed()->findOrFail($id);

            // if ($variants->img) {
            //     Storage::disk('public')->delete($variants->img);
            // }
            $variants->forceDelete();
            DB::commit();
            return redirect()->back()->with('success', 'Biến thể đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa biến thể: ' . $e->getMessage());
        }
    }
    public function destroyOrder($id)
    {
        try {
            $orders = Order::withTrashed()->findOrFail($id);
            // if ($orders->img) {
            //     Storage::disk('public')->delete($orders->img);
            // }
            $orders->forceDelete();
            DB::commit();
            return redirect()->back()->with('success', 'Đơn hàng đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa đơn hàng: ' . $e->getMessage());
        }
    }
    // public function destroyCategory($id)
    // {
    //     try {
    //         $categories = Category::withTrashed()->findOrFail($id);

    //         // if ($categories->img) {
    //         //     Storage::disk('public')->delete($categories->img);
    //         // }
    //         $categories->forceDelete();
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Danh mục đã được xóa vĩnh viễn thành công.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa danh mục: ' . $e->getMessage());
    //     }
    // }
    public function destroyComment($id)
    {
        try {
            $comments = Comment::withTrashed()->findOrFail($id);
            // if ($comments->img) {
            //     Storage::disk('public')->delete($comments->img);
            // }
            $comments->forceDelete();
            DB::commit();
            return redirect()->back()->with('success', 'Bình luận đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa bình luận: ' . $e->getMessage());
        }
    }
    public function destroySupplier($id)
    {
        try {
            $suppliers = Supplier::withTrashed()->findOrFail($id);

            // if ($suppliers->img) {
            //     Storage::disk('public')->delete($suppliers->img);
            // }
            $suppliers->forceDelete();
            DB::commit();
            return redirect()->back()->with('success', 'Nhà cung  cấp đã được xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa nhà cung cấp: ' . $e->getMessage());
        }
    }
}
