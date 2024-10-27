<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    function forgotPass()
    {
        return view("clients.accounts.forgot-password");
    }
}
