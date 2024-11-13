<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusOrderNotification extends Notification
{
    use Queueable;
    private $product;
    /**
     * Create a new notification instance.
     */
    public function __construct($product)
    {
        //
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Cảnh báo tồn kho thấp')
            ->line("Số lượng hiện tại là " . ($this->product->status === 0 ? $this->product->quantity : $this->product->variantGroups->first()->quantity) . ".")
            ->action('Xem sản phẩm', url("/products/{$this->product->id}"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
