<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function showError404()
    {
        return view("clients.layouts.components.errors.error-404");
    }

    public function showError500()
    {
        return view("clients.layouts.components.errors.error-500");
    }
}
