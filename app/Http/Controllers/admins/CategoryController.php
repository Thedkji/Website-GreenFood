<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\CategoryRequest;
use App\Http\Requests\admins\UpdateCategoryRequest;
use App\Http\Requests\admins\UpdateVariantRequest;
use App\Http\Requests\admins\VariantRequest;
use App\Models\Category;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request

        $search = $request->input('search');
        $categories = Category::where('parent_id', '=', Null)->with('children')->paginate(8);

        // Kiểm tra nếu có từ khóa tìm kiếm thì thực hiện truy vấn tìm kiếm
        if ($search) {
            $categories = Category::where('parent_id', '=', Null)
                ->with('children')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->paginate(8);
        }
        // dd($categories);
        return view('admins.categories.list-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', null)->get();

        return view('admins.categories.add-category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = [
            'name' => $request->name,
            'parent_id' => Null,
        ];

        if ($request->selectCategory == 0) {
            Category::create($data);
        } else {
            $data['parent_id'] = $request->parent_id;

            Category::create($data);
        }

        return back()->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $childrenName = $category->children;

        return view('admins.categories.edit-category', compact('category', 'childrenName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Cập nhật tên của danh mục gốc
        $category->update(['name' => $request->name]);

        // Lưu trữ ID của các danh mục con đã tồn tại
        $existingChildIds = $category->children()->pluck('id')->toArray();

        if ($request->parent_id) {
            foreach ($request->parent_id as $id => $name) {
                // Nếu ID không phải là số, tức là thêm mới
                if (!is_numeric($id)) {
                    if (empty($name)) {
                        return redirect()->route('admin.categories.edit', $category->id)->with('error', 'Danh muc con không được để trống');
                    } else {
                        // Thêm mới danh mục con
                        Category::create([
                            'name' => $name,
                            'parent_id' => $category->id, // Đặt parent_id là ID của danh mục chính
                        ]);
                    }
                } else {
                    // Nếu ID là số, tức là cập nhật danh mục con đã tồn tại
                    $childCategory = Category::find($id);
                    if ($childCategory) {
                        // Cập nhật tên danh mục con
                        $childCategory->update(['name' => $name]);
                        // Xóa ID này khỏi danh sách ID đã tồn tại
                        $existingChildIds = array_diff($existingChildIds, [$id]);
                    }
                }
            }
        }

        // Nếu có các danh mục con bị xóa, thực hiện xóa
        if (!empty($existingChildIds)) {
            Category::destroy($existingChildIds);
        }

        return redirect()->route('admin.categories.edit', $category->id)->with('success', 'Cập nhật thành công!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        if ($request->has('delete-children') && $request->query('delete-children') == 'true') {
            $category->delete();
        } else {
            // Lấy tất cả các danh mục con có parent_id bằng với id của danh mục hiện tại
            $children = Category::where('parent_id', $category->id)->get();

            // Nếu có các danh mục con, xóa chúng trước
            if (!$children->isEmpty()) {
                foreach ($children as $child) {
                    $child->delete();
                }
            }

            // Xóa danh mục hiện tại
            $category->delete();
        }

        return back()->with('success', 'Xóa danh mục thành công');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (is_array($ids) && count($ids) > 0) {
            try {
                DB::transaction(function () use ($ids) {
                    // Lấy ID của các danh mục con
                    $childIds = Category::whereIn('parent_id', $ids)->pluck('id')->toArray();
                    // Xóa các danh mục cha và con
                    Category::whereIn('id', array_merge($ids, $childIds))->delete();
                });

                return response()->json(['success' => 'Xóa danh mục thành công']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Có lỗi xảy ra khi xóa danh mục: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Không có danh mục nào được chọn'], 400);
    }
}
