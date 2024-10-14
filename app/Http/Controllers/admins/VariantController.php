<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\VariantRequest;
use App\Models\Variant;
use App\Models\VariantDetail;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    //Variant cha
    public function index()
    {
        $variants = Variant::paginate(5);
        return view('admins.variants.list-variant', compact('variants'));
    }

    public function create()
    {
        return view('admins.variants.add-variant');
    }
    public function store(VariantRequest $request)
    {
        $data = $request->validated();
        $variant = Variant::create($data);
        if ($variant) {
            return redirect()->route('admin.variants.variants.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới thất bại');
        };
    }
    public function show($id)
    {
        $variant = Variant::findOrFail($id);
        return view('admins.variants.edit-variant', compact('variant'));
    }
    public function update($id, VariantRequest $request)
    {
        $data = $request->validated();
        $variant = Variant::findOrFail($id);
        $variant->update($data);
        return redirect()->route('admin.variants.variants.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
    // Variant con
    public function addChildVariant()
    {
        return view('admins.variants.add-variant-child');
    }

    public function listChildVariant()
    {
        $variant_details = VariantDetail::with('variant')->paginate(5);
        return view('admins.variants.list-variant-child', compact('variant_details'));
    }
    public function editChildVariant($id)
    {
        $variant_detail = VariantDetail::with('variant')->findOrFail($id);
        $variants = Variant::all();
        return view('admins.variants.edit-variant-child', compact('variant_detail', 'variants'));
    }
}
