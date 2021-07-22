<?php

namespace App\Console\Commands;

use App\Models\OrderRequest;
use Illuminate\Console\Command;
use App\Notifications\ContractWillEndReminder;

class ContractWillEnded extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contract:willend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification for contracts that will ended';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $order = OrderRequest::whereBetween('due_at', [now(), now()->addDays(2)])->get();
        foreach ($order as $key => $value) {
            if(! empty($value->contract)) {
                $value->contract['seller']->notify(new ContractWillEndReminder($value->contract));
            }
        }
    }
}
