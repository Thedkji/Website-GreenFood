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
use Illuminate\Pagination\LengthAwarePaginator;

class TrashController extends Controller
{
    public function index(Request $request)
    {
        // Lấy giá trị bộ lọc (statusTrash) từ request
        $statusTrash = $request->get('statusTrash', 'allPro'); // Mặc định là 'Tất cả'

        // Lấy dữ liệu đã xóa từ các bảng
        $users = User::onlyTrashed()->get(['id', 'name', 'deleted_at']);
        $products = Product::onlyTrashed()->get(['id', 'name', 'deleted_at']);
        $orders = Order::onlyTrashed()->get(['id', 'user_id', 'deleted_at']);
        $comments = Comment::onlyTrashed()->get(['id', 'product_id', 'deleted_at']);
        $suppliers = Supplier::onlyTrashed()->get(['id', 'name', 'deleted_at']);

        // Gán thêm thông tin loại (type) để phân biệt trong bảng
        $users->map(function ($item) {
            $item->type = 'User';
            return $item;
        });
        $products->map(function ($item) {
            $item->type = 'Product';
            return $item;
        });
        $orders->map(function ($item) {
            $item->type = 'Order';
            return $item;
        });
        $comments->map(function ($item) {
            $item->type = 'Comment';
            return $item;
        });
        $suppliers->map(function ($item) {
            $item->type = 'Supplier';
            return $item;
        });

        // Kết hợp tất cả dữ liệu
        $allItems = $users->merge($products)
            ->merge($orders)
            ->merge($comments)
            ->merge($suppliers)
            ->sortByDesc('deleted_at'); // Sắp xếp theo thời gian xóa giảm dần

        // Nếu có bộ lọc, chỉ lấy các mục tương ứng với loại được chọn
        if ($statusTrash != 'allPro') {
            $allItems = $allItems->filter(function ($item) use ($statusTrash) {
                return $item->type == $statusTrash;
            });
        }

        // Tạo Paginator thủ công
        $currentPage = LengthAwarePaginator::resolveCurrentPage(); // Lấy trang hiện tại
        $perPage = 10; // Số mục trên mỗi trang
        $itemsForCurrentPage = $allItems->slice(($currentPage - 1) * $perPage, $perPage); // Lấy dữ liệu cho trang hiện tại

        $trashedItems = new LengthAwarePaginator(
            $itemsForCurrentPage, // Dữ liệu của trang hiện tại
            $allItems->count(),   // Tổng số mục
            $perPage,             // Số mục mỗi trang
            $currentPage,         // Trang hiện tại
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Đường dẫn phân trang
        );

        return view('admins.trashs.list-trash', compact('trashedItems', 'statusTrash'));
    }

    public function restore($type, $id)
    {
        try {
            switch ($type) {
                case 'User':
                    $item = User::withTrashed()->findOrFail($id);
                    $item->restore();
                    return redirect()->back()->with('success', 'Tài khoản đã được khôi phục thành công.');
                case 'Product':
                    $item = Product::withTrashed()->findOrFail($id);
                    $item->restore(); // Khôi phục sản phẩm

                    // Khôi phục depots (hasMany)
                    $item->depots()->withTrashed()->get()->each(function ($depot) {
                        $depot->restore();
                    });

                    // Khôi phục variantGroups (hasMany)
                    $item->variantGroups()->withTrashed()->get()->each(function ($variantGroup) {
                        $variantGroup->restore();
                    });

                    // Khôi phục galleries (hasMany)
                    $item->galleries()->withTrashed()->get()->each(function ($gallery) {
                        $gallery->restore();
                    });

                    // Khôi phục comments (hasMany)
                    $item->comments()->withTrashed()->get()->each(function ($comment) {
                        $comment->restore();
                    });

                    // Xử lý khôi phục các categories (belongsToMany)
                    $item->categories->each(function ($category) {
                        if (method_exists($category, 'restore')) {
                            $category->restore();
                        }
                    });

                    // Nếu cần, xử lý tương tự cho các quan hệ khác như coupons()

                    return redirect()->back()->with('success', 'Sản phẩm và các dữ liệu liên quan đã được khôi phục thành công.');


                case 'Order':
                    $item = Order::withTrashed()->findOrFail($id);
                    $item->restore();
                    return redirect()->back()->with('success', 'Đơn hàng đã được khôi phục thành công.');
                case 'Comment':
                    $item = Comment::withTrashed()->findOrFail($id);
                    $item->restore();
                    return redirect()->back()->with('success', 'Bình luận đã được khôi phục thành công.');
                case 'Supplier':
                    $item = Supplier::withTrashed()->findOrFail($id);
                    $item->restore();
                    return redirect()->back()->with('success', 'Nhà cung cấp đã được khôi phục thành công.');
                default:
                    return redirect()->back()->with('error', 'Không thể khôi phục mục này.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi khôi phục: ' . $e->getMessage());
        }
    }




    public function destroy($type, $id)
    {
        try {
            // Lấy tên model đầy đủ (ví dụ: App\Models\User)
            $modelClass = "App\\Models\\$type";

            // Kiểm tra xem class có tồn tại không
            if (!class_exists($modelClass)) {
                return redirect()->back()->with('error', 'Loại dữ liệu không hợp lệ.');
            }

            // Tìm bản ghi theo ID
            $item = $modelClass::withTrashed()->findOrFail($id);

            // Xóa hình ảnh liên quan nếu có
            // Nếu mô hình có phương thức để lấy đường dẫn ảnh
            if (method_exists($item, 'getImagePath')) {
                $imagePath = $item->getImagePath(); // Giả sử mỗi model có phương thức getImagePath để lấy đường dẫn ảnh
                if ($imagePath && Storage::exists($imagePath)) {
                    Storage::delete($imagePath); // Xóa ảnh khỏi storage
                }
            } else {
                // Xử lý xóa ảnh cho những trường hợp khác nếu cần, ví dụ: User, Product
                if ($item instanceof User && $item->avatar) {
                    Storage::disk('public')->delete($item->avatar);
                } elseif ($item instanceof Product && $item->img) {
                    Storage::disk('public')->delete($item->img);
                }
                // Thêm các điều kiện khác nếu có các mô hình khác có thuộc tính hình ảnh
            }

            // Xóa vĩnh viễn bản ghi
            $item->forceDelete();

            return redirect()->back()->with('success', 'Đã xóa vĩnh viễn thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
