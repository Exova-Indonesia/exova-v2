<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithDrawSuccess extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $withdraw;
    public function __construct($withdraw)
    {
        $this->withdraw = $withdraw;
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
                    ->subject('Permintaan penarikan sukses')
                    ->greeting('Hello!')
                    ->line('Permintaan penarikanmu telah berhasil kami penuhi, Silakan cek saldo kamu')
                    ->line('Berikut detail penarikan kamu')
                    ->line('Nama Pemilik : ' . $this->withdraw['bank']['name'])
                    ->line('Bank : ' . $this->withdraw['bank']['channel'])
                    ->line('Nomor Rekening : **** ' . substr($this->withdraw['bank']['number'], -4))
                    ->line('Jumlah : ' . 'Rp' . number_format($this->withdraw['amount'], 0, ',', '.'))
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
