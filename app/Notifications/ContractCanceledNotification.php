<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContractCanceledNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $contract;
    public $request;
    public function __construct($user, $contract, $request)
    {
        $this->contract = $contract;
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('Yahh! ' . 'Rp' . number_format($this->contract['deal_price'], 0, ',', '.') . '-mu melayang nih :(')
                    ->greeting('Hello Exovers!')
                    ->line('Salah satu kontrak baru saja dibatalkan, untuk melihat detail kontrak bisa klik tombol di bawah')
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
            'title' => 'Yahh! ' . 'Rp' . number_format($this->contract['deal_price'], 0, ',', '.') . '-mu melayang nih :(',
            'description' => '',
            'action_url' => url('contracts/' . $this->contract['uuid']),
        ];
    }
}
