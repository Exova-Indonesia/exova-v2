<?php

namespace App\Providers;

use App\Events\RefundSent;
use App\Events\MessageSent;
use App\Events\ContractEvent;
use App\Events\WithDrawEvent;
use App\Listeners\RefundListener;
use App\Listeners\MessageListener;
use App\Listeners\ContractListener;
use App\Listeners\WithdrawListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MessageSent::class => [
            MessageListener::class,
        ],
        ContractEvent::class => [
            ContractListener::class,
        ],
        WithDrawEvent::class => [
            WithdrawListener::class,
        ],
        RefundSent::class => [
            RefundListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
