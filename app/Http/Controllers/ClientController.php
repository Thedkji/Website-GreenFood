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
        return view('client.pages.shop');
    }

    public function shopDetail()
    {
        return view('client.pages.shop-detail');
    }
    public function cart()
    {
        return view('client.pages.cart');
    }
    public function chackout()
    {
        return view('client.pages.chackout');
    }
    public function errPage()
    {
        return view('client.pages.404page');
    }
    public function contact()
    {
        return view('client.pages.contact');
    }
}
