<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AttendantWebinarThanks extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $attendant;
    public $webinar;
    public function __construct($attendant, $webinar)
    {
        $this->attendant = $attendant;
        $this->webinar = $webinar;
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
                    ->subject('Terima kasih telah mengikuti ' . $this->webinar['title'])
                    ->greeting('Hello, ' . $this->attendant['name'])
                    ->line('Nantikan event - event seru lainnya dari Exova lagi yaa')
                    ->line('Kuy sekalian Xplore Exova biar saling kenal siapa tau jodoh')
                    ->action('Xplore Exova', url('/dashboard'))
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
