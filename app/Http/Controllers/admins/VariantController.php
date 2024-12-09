<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\UpdateVariantRequest;
use App\Http\Requests\admins\VariantRequest;
use App\Models\Category;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request

        $search = $request->input('search');
        $variants = Variant::where('parent_id', '=', Null)->with('children')->paginate(8);

        // Kiểm tra nếu có từ khóa tìm kiếm thì thực hiện truy vấn tìm kiếm
        if ($search) {
            $variants = Variant::where('parent_id', '=', Null)
                ->with('children')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->paginate(8);
        }
        // dd($variants);
        return view('admins.variants.list-variant', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $variants = Variant::where('parent_id', '=', null)->get();

        return view('admins.variants.add-variant', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariantRequest $request)
    {
        $data = [
            'name' => $request->name,
            'parent_id' => Null,
        ];

        if ($request->selectVariant == 0) {
            Variant::create($data);
        } else {
            $data['parent_id'] = $request->parent_id;

            Variant::create($data);
        }

        return back()->with('success', 'Thêm biến thể thành công');
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
    public function edit(Variant $variant)
    {
        $childrenName = $variant->children;

        return view('admins.variants.edit-variant', compact('variant', 'childrenName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariantRequest $request, Variant $variant)
    {
        // Cập nhật tên của biến thể gốc
        $variant->update(['name' => $request->name]);

        // Lưu trữ ID của các biến thể con đã tồn tại
        $existingChildIds = $variant->children()->pluck('id')->toArray();

        if ($request->parent_id) {
            foreach ($request->parent_id as $id => $name) {
                // Nếu ID không phải là số, tức là thêm mới
                if (!is_numeric($id)) {
                    if (empty($name)) {
                        return redirect()->route('admin.variants.edit', $variant->id)->with('error', 'Giá trị biến thể không được để trống');
                    } else {
                        // Thêm mới biến thể con
                        Variant::create([
                            'name' => $name,
                            'parent_id' => $variant->id, // Đặt parent_id là ID của biến thể chính
                        ]);
                    }
                } else {
                    // Nếu ID là số, tức là cập nhật biến thể con đã tồn tại
                    $childVariant = Variant::find($id);
                    if ($childVariant) {
                        // Cập nhật tên biến thể con
                        $childVariant->update(['name' => $name]);
                        // Xóa ID này khỏi danh sách ID đã tồn tại
                        $existingChildIds = array_diff($existingChildIds, [$id]);
                    }
                }
            }
        }

        // Nếu có các biến thể con bị xóa, thực hiện xóa
        if (!empty($existingChildIds)) {
            Variant::destroy($existingChildIds);
        }

        return redirect()->route('admin.variants.edit', $variant->id)->with('success', 'Cập nhật thành công!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variant $variant, Request $request)
    {
        if ($request->has('delete-children') && $request->query('delete-children') == 'true') {
            $variant->delete();
        } else {
            // Lấy tất cả các biến thể con có parent_id bằng với id của biến thể hiện tại
            $children = Variant::where('parent_id', $variant->id)->get();

            // Nếu có các biến thể con, xóa chúng trước
            if (!$children->isEmpty()) {
                foreach ($children as $child) {
                    $child->delete();
                }
            }

            // Xóa biến thể hiện tại
            $variant->delete();
        }

        return back()->with('success', 'Xóa biến thể thành công');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (is_array($ids) && count($ids) > 0) {
            try {
                DB::transaction(function () use ($ids) {
                    // Lấy ID của các biến thể con
                    $childIds = Variant::whereIn('parent_id', $ids)->pluck('id')->toArray();
                    // Xóa các biến thể cha và con
                    Variant::whereIn('id', array_merge($ids, $childIds))->delete();
                });

                return response()->json(['success' => 'Xóa biến thể thành công']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Có lỗi xảy ra khi xóa biến thể: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Không có biến thể nào được chọn'], 400);
    }
}
