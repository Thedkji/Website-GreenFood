<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showSuccess()
    {
        return view("clients.layouts.components.messages.emails.success-email");
    }

    public function showFailure()
    {
        return view("clients.layouts.components.messages.emails.failure-email");
    }
}
