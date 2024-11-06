<?php

namespace App\Http\Controllers\clients;


use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Models\PasswordResetTokens;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\authens\LoginRequest;
use App\Http\Requests\authens\RegisterRequest;
use App\Http\Requests\authens\ForGotPasswordRequest;

class AccountController extends Controller
{
    function register()
    {
        return view("clients.accounts.register");
    }

    function login()
    {
        return view("clients.accounts.login");
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
                return redirect()->back()->withErrors(['error' => 'Tên đăng nhập, email hoặc số điện thoại hoặc mật khẩu không đúng!']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi trong quá trình đăng nhập.']);
        }
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
        return redirect()->route('client.login')->with(['Đăng xuất thành công']);
    }


    public function forgotPass()
    {
        return view("clients.accounts.forgot-password");
    }
    public function postForgotPassword(ForGotPasswordRequest $req)
    {
        $user = User::where('email', $req->email)->first();

        $token = Str::random(64);
        $tokenData = [
            'email' => $req->email,
            'token' => $token
        ];


        if (PasswordResetTokens::create($tokenData)) {
            Mail::to($req->email)->send(new ForgotPassword($user, $token));
            return redirect()->back()->with(['success' => 'Chúng tôi đã gửi link reset mật khẩu đến email của bạn!']);
        }
        return redirect()->back()->with(['error' => 'Email khóng tồn tại vui lòng chọn email khác!']);
        // Mail::to($req->email)->send(new ForgotPassword($user));
        // if($user){
        //     $user->update(['password' => bcrypt($req->password)]);
        //     return redirect()->route('clients.login');
        // }
        // dd($tokenData);
    }


    public function resetPassword($token)
    {

        $tokenData = PasswordResetTokens::checkToken($token);
        // dd($tokenData);
        return view('clients.accounts.reset-password');
    }
    public function postResetPassword($token)
    {
        request()->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $tokenData = PasswordResetTokens::checkToken($token);
        $user = $tokenData->user;

        $data = [
            'password' => bcrypt(request(('password')))
        ];

        $check = $user->update($data);
        if ($check) {
            return redirect()->route('client.login')->with(['success' => 'Bạn đã đổi mật khẩu thành công!']);
        }
        return redirect()->back()->with(['error' => 'Bạn đã đổi mật khẩu không thành công. Vui lòng chọn mật khẩu khác!']);
    }
}
