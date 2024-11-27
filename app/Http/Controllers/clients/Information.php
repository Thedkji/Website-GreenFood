<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\PassRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Information extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('clients.information.information', compact('user'));
    }

    public function editPass()
    {
        $user = auth()->user();
        return view('clients.information.pass', compact('user'));
    }

    public function updatePass(PassRequest $request)
{
    $user = $request->validated();


    // Lấy user hiện tại
    $user = Auth::user();

    // Cập nhật mật khẩu mới
    $user->password = Hash::make($request->password);
    $user->save();

    // Redirect với thông báo thành công
return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
}


public function update(Request $request)
{
    // Kiểm tra dữ liệu form gửi lên
    dd($request->all());

    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required|max:10',
        'address' => 'nullable|max:255',
    ]);

    $user = auth()->user();
    $user->update([ // Thay vì fill và save, dùng update trực tiếp
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
    ]);

    return redirect()->route('client.information.index')->with('success', 'Thông tin đã được cập nhật!');
}

}
