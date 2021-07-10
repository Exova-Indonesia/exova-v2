<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Contract;
use App\Models\OrderRequest;
use App\Events\ContractEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ContractCreatedNotification;
use App\Notifications\ContractStartedNotification;
use App\Notifications\ContractApprovedNotification;
use App\Notifications\ContractCanceledNotification;
use App\Notifications\ContractReturnedNotification;

class ContractListener
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
     * @param  ContractEvent  $event
     * @return void
     */
    public function handle(ContractEvent $event)
    {
        $customer = User::where('id', $event->contract->customer_id)->first();
        $seller = User::where('id', $event->contract->seller_id)->first();
        $requests = OrderRequest::where('id', $event->contract->request_id)->first();
        
        switch ($event->contract->status) {
            case Contract::IS_WAITING_PAYMENT:
                $seller->notify(new ContractCreatedNotification($customer, $event->contract, $requests));
                $customer->notify(new ContractCreatedNotification($seller, $event->contract, $requests));
                break;
            
            case Contract::IS_STARTED:
                $seller->notify(new ContractStartedNotification($customer, $event->contract, $requests));
                break;
            
            case Contract::IS_RETURNED:
                $seller->notify(new ContractReturnedNotification($customer, $event->contract, $requests));
                break;
            
            case Contract::IS_APPROVED:
                $seller->notify(new ContractApprovedNotification($customer, $event->contract, $requests));
                break;
            
            case Contract::IS_CANCELED:
                $seller->notify(new ContractCanceledNotification($customer, $event->contract, $requests));
                break;
            
            default:
                // 
                break;
        }
    }
}
