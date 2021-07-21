<?php

namespace App\Listeners;

use App\Models\Refund;
use App\Events\RefundSent;
use App\Notifications\SendRefundRequest;
use App\Notifications\SendRefundSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class RefundListener implements ShouldQueue
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
     * @param  RefundSent  $event
     * @return void
     */
    public function handle(RefundSent $event)
    {
        if($event->refund->status == Refund::IS_PENDING) {
            // $event->refund->contract->customer->notify(new SendRefundRequest($event->refund));
            Notification::route('mail', 'exovaindonesia@gmail.com')->notify(new SendRefundRequest($event->refund));
        } else if($event->refund->status == Refund::IS_SUCCESS) {
            $event->refund->contract->customer->notify(new SendRefundSuccess($event->refund));
        }
    }
}
