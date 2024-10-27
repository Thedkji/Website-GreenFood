<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function bmi(){
        return view('clients.tools.bmi');
    }

    public function bmr(){
        return view('clients.tools.bmr');
    }
}
