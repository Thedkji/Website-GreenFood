<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index()
    {
        return view('client.pages.home');
    }
    public function shop()
    {
        return view('client.pages.shopping.shop');
    }

    public function shopDetail()
    {
        return view('client.pages.shopping.shop-detail');
    }
    public function cart()
    {
        return view('client.pages.shopping.cart');
    }
    public function chackout()
    {
        return view('client.pages.shopping.chackout');
    }
    public function errPage()
    {
        return view('client.pages.contact.404page');
    }
    public function contact()
    {
        return view('client.pages.contact.contact');
    }
    public function register()
    {
        return view('client.pages.user.register');
    }
    public function login()
    {
        return view('client.pages.user.login');
    }
}
