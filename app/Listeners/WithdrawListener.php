<?php

namespace App\Listeners;

use App\Models\Withdraw;
use App\Events\WithDrawEvent;
use App\Notifications\WithDrawSuccess;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendRequestWithDraw;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class WithdrawListener implements ShouldQueue
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
     * @param  WithDrawEvent  $event
     * @return void
     */
    public function handle(WithDrawEvent $event)
    {
        $withdraw = Withdraw::where('id', $event->withdraw->id)->first();
        if($withdraw->status == Withdraw::IS_PENDING) {
            Notification::route('mail', 'exovaindonesia@gmail.com')->notify(new SendRequestWithDraw($withdraw));
        } else if($withdraw->status == Withdraw::IS_SUCCESS) {
            $withdraw->user->notify(new WithDrawSuccess($withdraw));
        }
    }
}
