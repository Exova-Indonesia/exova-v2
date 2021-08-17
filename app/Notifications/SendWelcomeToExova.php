<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendWelcomeToExova extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
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
                    ->subject('Selamat Datang dan Selamat Bergabung Menjadi Keluarga Besar Exova Indonesia')
                    ->greeting('Hello ' . $this->user['name'])
                    ->line('Terima kasih kami ucapkan karena sudah ikut bergabung bersama kami di Exova')
                    ->line('Exova adalah platform jual - beli jasa di bidang dokumentasi. Khusus di Exova yaitu bidang Traditional & Budaya seperti. Prewedding, Wedding, Upacara Keagamaan, Upacara Adat, Event Budaya, dll')
                    ->line('Disini kamu bisa beli ataupun jual jasa dokumentasi dengan cepat mudah dan aman!')
                    ->line('Mungkin segitu dulu perkenalannya yaa :) Happy Xploring!')
                    ->action('Xplore Exova', url('dashboard'))
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
