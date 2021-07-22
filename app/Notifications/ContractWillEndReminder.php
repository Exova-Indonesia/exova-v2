<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContractWillEndReminder extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $contract;
    public function __construct($contract)
    {
        $this->contract = $contract;
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
                    ->subject('Kontrakmu dengan ' . $this->contract['customer']['name'] . ' akan berakhir')
                    ->greeting('Hello ' . $this->contract['seller']['name'] . ',')
                    ->line('Kontrak kamu akan segera berakhir, cepat ambil tindakan agar pointmu tidak terpotong')
                    ->action('Lihat Kontrak', url('contracts/' . $this->contract['uuid']))
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
