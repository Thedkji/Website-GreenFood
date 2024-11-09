<?php

namespace App\Http\Controllers\clients;


use App\Models\User;
use App\Mail\VerifyAccount;
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
use Darryldecode\Cart\Facades\CartFacade as CartSession;

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

        // Xác định xem đầu vào là email, số điện thoại, hay tên đăng nhập
        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $loginInput;
        } elseif (preg_match('/^\d+$/', $loginInput)) {
            $credentials['phone'] = $loginInput;
        } else {
            $credentials['user_name'] = $loginInput;
        }

        $remember = $req->has('remember');

        // Kiểm tra xem tài khoản có tồn tại và có xác minh chưa
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Kiểm tra xem tài khoản đã được xác minh hay chưa
            if ($user->email_verified_at === null) {
                // Nếu chưa xác minh, yêu cầu người dùng xác minh email
                Auth::logout(); // Đăng xuất người dùng
                return redirect()->back()->withErrors(['email' => 'Tài khoản chưa được xác minh. Vui lòng kiểm tra email để xác minh tài khoản.']);
            }

            // Nếu tài khoản đã được xác minh, chuyển hướng đến trang dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công.');
        } else {
            // Kiểm tra xem người dùng có tồn tại không
            $userExists = User::where(function ($query) use ($loginInput) {
                $query->where('user_name', $loginInput)
                    ->orWhere('email', $loginInput)
                    ->orWhere('phone', $loginInput);
            })->exists();

            if ($userExists) {
                return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng!']);
            } else {
                return redirect()->back()->withErrors(['user_name' => 'Tên đăng nhập, email hoặc số điện thoại không đúng!']);
            }
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

            // Gửi email xác nhận tài khoản
            Mail::to($user->email)->send(new VerifyAccount($user));
            // dd('error');
            return redirect()->route('client.showSuccess')->with(['success' => 'Chúng tôi đã gửi xác nhận về email !']);
        } else {
            // Thông báo nếu email đã tồn tại
            return redirect()->route('client.showSuccess')->withErrors([
                'email' => 'Email đã tồn tại, vui lòng chọn email khác.'
            ]);
        }
    }

    public function verify($email)
    {
        $user = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at' => now()]);
        return redirect()->route('client.login')->with(['success' => 'Xác nhận tài khoản thành công!']);
    }

    public function logout()
    {
        Auth::logout();
        CartSession::clear();
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

        PasswordResetTokens::where('email', $req->email)->delete();

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
