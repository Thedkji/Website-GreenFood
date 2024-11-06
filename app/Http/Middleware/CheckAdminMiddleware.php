<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == '0'){
                return $next($request);
            }else{
                return redirect()->route('client.home');
            }
        }else{}
        return redirect()->route('client.login')->with(['messageError'=>'Bạn phải đăng nhập trước']);
    }
}
