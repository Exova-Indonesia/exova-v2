<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\MessageNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $user = User::where('id', $event->message['to_id'])->first();
        $target = User::where('id', $event->message['from_id'])->first();
        $user->notify(new MessageNotification($target, $event->message));

        Http::withToken(env('FCM_SERVER_KEY'))->post(env('FCM_SEND_URL'), [
            "notification" => [
                "title" => "Pesan masuk dari " . $target->name,
                "body" => $event->message['messages'],
                "icon" => asset('icons/exova.png'),
                "click_action" => url('chats')
            ],
            "to" => $user->device_token
        ]);
    }
}
