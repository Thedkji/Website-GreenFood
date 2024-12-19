<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('clients.contacts.contact');
    }

    public function sendContact(Request $request)
    {
        // Validate form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ],
    [
        'name' => 'Tên không được để trống',
        'email' => 'Email không được để trống',
        'email.email' => 'Email không đúng định dạng',
        'message' => 'Nội dung không được để trống'
    ]);

        try {
            // Lấy dữ liệu từ form
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'userMessage' => $request->input('message'),
            ];
            // Gửi email qua queue với dữ liệu người gửi
            Mail::to('greenfood8386@gmail.com')->queue(new ContactMessage($data));
            // Đảm bảo gửi qua queue
            // Mail::to($contact->email)->queue(new MailCheckOut($contact));

            return back()->with('success', 'Gửi thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gửi lỗi vui lòng gửi lại' . $e->getMessage());
        }
    }
}
