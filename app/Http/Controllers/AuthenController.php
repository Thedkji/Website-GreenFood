<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\authens\LoginRequest;
use App\Http\Requests\authens\RegisterRequest;
use Darryldecode\Cart\Facades\CartFacade as CartSession;

class AuthenController extends Controller
{
    public function login()
    {

        return view('authens.login');
    }
    public function postLogin(LoginRequest $req)
    {

        try {
            $credentials = $req->only('email', 'password');
            $remember = $req->has('remember');

            if (Auth::attempt($credentials, $remember, [
                'email' => $req->email,
                'password' => $req->password
            ])) {
                CartSession::clear();
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'errorsMessage' => 'Email hoặc Mật Khẩu không đúng !!!'
            ]);
        }
    }


    public function register()
    {
        return view('authens.Register');
    }
    public function postRegister(RegisterRequest $req)
    {
        // Kiểm tra xem email đã tồn tại chưa
        $check = User::where('email', $req->email)->exists();

        if (!$check) {
            // Tạo đối tượng User mới và lưu dữ liệu
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt($req->password); // Mã hóa mật khẩu
            $user->phone = $req->phone;
            $user->user_name = $req->user_name;


            $user->save(); // Lưu đối tượng User vào cơ sở dữ liệu

            return redirect()->back()->with([
                'message' => 'Đăng ký thành công!'
            ]);
        } else {
            // Thông báo nếu email đã tồn tại
            return redirect()->back()->withErrors([
                'email' => 'Email đã tồn tại, vui lòng chọn email khác.'
            ]);
        }
    }








    public function logout()
    {
        Auth::logout();
        CartSession::clear();
        return redirect()->route('authens.login')->with(['Đăng xuất thành công']);
    }
}
