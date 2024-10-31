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

        if ($request->parent_id) {
            foreach ($request->parent_id as $id => $name) {
                // Kiểm tra nếu ID là 'new' (được tạo từ input mới)
                if ($id === 'new') {
                    if ($name == '') {
                        return redirect()->route('admin.categories.edit', $category->id)->with('error', 'Bạn cần nhập giá trị danh mục');
                    } else {
                        // Nếu ID là 'new', nghĩa là người dùng muốn thêm mới
                        Category::create([
                            'name' => $name,
                            'parent_id' => $category->id, // Đặt parent_id là ID của danh mục chính
                        ]);
                    }
                } else {
                    // Nếu ID không rỗng, tìm danh mục con theo ID
                    $childCategory = Category::find($id);

                    // Nếu tìm thấy danh mục con, cập nhật `name` cho danh mục đó
                    if ($childCategory) {
                        $childCategory->update(['name' => $name]);
                    }
                }
            }
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
}
