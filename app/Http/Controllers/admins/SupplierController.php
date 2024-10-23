<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\SupplierRequest;
use App\Http\Requests\admins\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderByDesc('id')->paginate(8);
        return view('admins.suppliers.list-supplier', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.suppliers.add-supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $suppliers = Supplier::create($request->all());
        return redirect()->route('admin.suppliers.create')->with('success', 'Thêm nhà cung cấp thành công!');
    }

    /**,
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {

        return view('admins.suppliers.edit-supplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request, Supplier $supplier)
    {

        $supplier->update($request->all());
        return redirect()->route('admin.suppliers.edit', $supplier->id)->with('success', 'Sửa nhà cung cấp thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Xóa nhà cung cấp thành công!');
    }
}
