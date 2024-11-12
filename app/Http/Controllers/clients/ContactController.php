<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        $email = 'greenfood8386@gmail.com';
        // Mail::to('$email')->send(new ContactEmail());
        return view('clients.contacts.contact');
    }
}
