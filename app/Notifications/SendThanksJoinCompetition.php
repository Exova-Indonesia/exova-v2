<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendThanksJoinCompetition extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $compe;
    public function __construct($user, $compe)
    {
        $this->user = $user;
        $this->compe = $compe;
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
                    ->subject('Terima Kasih Telah Mengikuti ' . $this->compe['title'])
                    ->greeting('Hello ' . $this->user['user']['name'] . ',')
                    ->line('Terima kasih kami ucapkan karena sudah ikut berpartisipasi dalam event Exova kali ini!')
                    ->line('Klik link berikut untuk melihat karya yang kamu ikut sertakan')
                    ->action('Lihat Detail', url('event/competition'))
                    ->line('Pengumuman lebih lanjut silakan pantau terus Instagram resmi Exova di @exova.id')
                    ->line('Nantikan event seru Exova lainnya nanti yaa :)')
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
