<?php

namespace App\Http\Controllers\clients;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function introduce()
    {
        return view('clients.introduces.introduce');
    }


}
