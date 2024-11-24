<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use SerializesModels;

    public $name;
    public $email;
    public $userMessage;

    // Constructor để nhận dữ liệu từ controller
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->userMessage = $data['userMessage'];
    }

    public function build()
    {
        return $this->view('clients.contacts.sendContact')
            ->from(config('mail.from.address'), config('mail.from.name')) // Sử dụng địa chỉ email cấu hình
            ->replyTo($this->email, $this->name) // Đặt email người gửi làm reply-to
            ->subject('Người liên hệ');
    }
}
