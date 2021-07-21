<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendRefundRequest extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $refund;
    public function __construct($refund)
    {
        $this->refund = $refund;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Permintaan refund dari akun ' . $this->refund->contract['customer']['name'])
                    ->greeting('Hello!')
                    ->line('Nama Pemilik : ' . $this->refund['name'])
                    ->line('Bank : ' . $this->refund['channel'])
                    ->line('Kode Bank : ' . $this->refund['code'])
                    ->line('Nomor Rekening : ' . $this->refund['number'])
                    ->line('Jumlah : ' . 'Rp' . number_format($this->refund['amount'], 0, ',', '.'))
                    ->line('Semoga kita semua dalam keadaan sehat, bahagia, dan kaya raya');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
