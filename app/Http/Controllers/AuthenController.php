<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\authens\LoginRequest;
use App\Http\Requests\authens\RegisterRequest;

class AuthenController extends Controller
{
    public function login()
    {

        return view('authens.login');
    }

    public function postLogin(LoginRequest $req)
    {
        try {
            $credentials = ['password' => $req->password];
            $loginInput = $req->user_name;

            // Kiểm tra đầu vào là tên đăng nhập, email, hay số điện thoại
            if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
                $credentials['email'] = $loginInput;
            } elseif (preg_match('/^\d+$/', $loginInput)) {
                $credentials['phone'] = $loginInput;
            } else {
                $credentials['user_name'] = $loginInput;
            }

            $remember = $req->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công.');
            } else {
                return redirect()->back()->withErrors(['errorsMessage' => 'Tên đăng nhập, email hoặc số điện thoại hoặc mật khẩu không đúng!']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errorsMessage' => 'Đã xảy ra lỗi trong quá trình đăng nhập.']);
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
        return redirect()->route('authens.login')->with(['Đăng xuất thành công']);
    }
}
