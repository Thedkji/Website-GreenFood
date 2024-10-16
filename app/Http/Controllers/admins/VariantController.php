<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\VariantDetailRequest;
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
    public function edit($id)
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
        $variants = Variant::all();
        return view('admins.variants.add-variant-child', compact('variants'));
    }
    public function createChildVariant(VariantDetailRequest $request)
    {
        $data = $request->validated();
        $variant = VariantDetail::create($data);
        if ($variant) {
            return redirect()->back()->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới thất bại');
        };
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
    public function updateChildVariant($id, VariantDetailRequest $request)
    {
        $data = $request->validated();
        $variant_detail = VariantDetail::findOrFail($id);
        $variant_detail->update($data);
        return redirect()->back()->with('success', 'Thay đổi thành công');
    }

    public function deleteChildVariant($id)
    {
        $variant_detail = VariantDetail::findOrFail($id);
        $variant_detail->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
    public function add_test()
    {
        return view('admins.variants.addTest');
    }
    public function create_test(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'tag' => 'required|string|max:100',
        ]);
        if ($validatedData) {
            //     session()->flash('success', 'Thêm mới thành công');
            //     $allSessionData = session()->all();
            //     dd($allSessionData);
            return redirect()->back()->with('success', 'OK');
        } else {
            return redirect()->back()->with('error', 'Fail');
            //     session()->flash('error', 'Thêm mới thất bại');
            //     $allSessionData = session()->all();
            //     dd($allSessionData);
        }
    }
}
