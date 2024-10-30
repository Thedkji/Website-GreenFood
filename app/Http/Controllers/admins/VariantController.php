<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\UpdateVariantRequest;
use App\Http\Requests\admins\VariantRequest;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $variants = Variant::where('parent_id', '=', Null)->with('children')->paginate(8);
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

        if ($request->parent_id) {
            // Lặp qua mỗi `parent_id` và `name` tương ứng để cập nhật các biến thể con
            foreach ($request->parent_id as $id => $name) {
                // Tìm biến thể con theo ID
                $childVariant = Variant::find($id);

                // Nếu tìm thấy biến thể con, cập nhật `name` cho biến thể đó
                if ($childVariant) {
                    $childVariant->update(['name' => $name]);
                }
            }
        }

        return redirect()->route('admin.variants.edit', $variant->id)->with('success', 'Cập nhật thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variant $variant)
    {
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

        return back()->with('success', 'Xóa biến thể thành công');
    }
}
